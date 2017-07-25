<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Form\LoginForm;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\AuthenticationServiceInterface;

class AuthController extends AbstractActionController
{
	private $authService;
	private $form;
	
	public function __construct(AuthenticationServiceInterface $authService)
	{
		$this->authService = $authService;
		$this->form = new LoginForm();
	}
	
	public function loginAction()
	{
		if($this->authService->hasIdentity()){
			return $this->redirect()->toRoute('admin-blog/post');
		}
		$form = $this->form;
		$messageError = null;
		if($this->getRequest()->isPost()){
			//-- Verificar o login do usuário
			$data = $this->getRequest()->getPost();
			$form->setData($data);
			if($form->isValid()){
				$formData = $form->getData();
				/** @var CallbackCheckAdapter $authAdapter*/
				$authAdapter = $this->authService->getAdapter();
				$authAdapter->setIdentity($formData['username']);
				$authAdapter->setCredential($formData['password']);
				$result = $this->authService->authenticate();
				if($result->isValid()){
					return $this->redirect()->toRoute('admin-blog/post');//("Deus/Jesus: dei me forças e confiança para vencer");
				} else {
					$messageError = "Login Inválido!";
				}
			}
		}
		return new ViewModel([
			'form' => $form,
			'messageError' => $messageError,
		]);
	}
	
	public function logoutAction()
	{
		$this->authService->clearIdentity();
		return $this->redirect()->toRoute('login');
	}
}