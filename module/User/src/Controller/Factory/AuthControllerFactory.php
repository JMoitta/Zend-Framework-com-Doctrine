<?php
namespace User\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationServiceInterface;
use User\Controller\AuthController;

class AuthControllerFactory
{
	public function __invoke(ContainerInterface $container){
		$authService = $container->get(AuthenticationServiceInterface::class);
// 		$loginForm = $container->get(LoginForm::class);
		return new AuthController($authService);
	}
}