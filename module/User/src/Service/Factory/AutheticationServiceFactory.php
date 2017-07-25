<?php

namespace User\Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\Storage\Session;
use Zend\Authentication\AuthenticationService;

class AutheticationServiceFactory
{
	public function __invoke(ContainerInterface $container)
	{
		//-- Pegar o Adapter do banco de dados
		/** @var AdapterInterface $dbAdapter*/
		$dbAdapter = $container->get(AdapterInterface::class);
		//-- Configurar um adaptador para adminstrar a autenticação do usuário
		$passwordCallbackVerify = function ($passwordInDatabase, $passwordSent) {
			return password_verify($passwordSent, $passwordInDatabase);
		};
		$authAdapter = new CallbackCheckAdapter(
			$dbAdapter, 'users', 'username', 'password', $passwordCallbackVerify
		);
		
		//-- Criar uma sessão para guardarmos o usuário
		$storage = new Session();
		
		//-- Criar o serviço de AthenticationServices
		return new AuthenticationService($storage, $authAdapter);
	}
}