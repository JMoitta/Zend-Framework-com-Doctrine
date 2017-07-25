<?php
namespace User;

use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use User\Controller\AuthController;
use Zend\Authentication\AuthenticationServiceInterface;
use User\Service\Factory\AutheticationServiceFactory;
use User\Controller\Factory\AuthControllerFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{
	public function onBootstrap(MvcEvent $e)
	{
		$eventManager = $e->getApplication()->getEventManager();
		$container = $e->getApplication()->getServiceManager();
		$eventManager->attach(MvcEvent::EVENT_DISPATCH,
			function (MvcEvent $e) use ($container){
				/** @var AuthenticationServiceInterface $authService*/
				$match = $e->getRouteMatch();
				$authService = $container->get(AuthenticationServiceInterface::class);
				$routeName = $match->getMatchedRouteName();
				if($authService->hasIdentity()){
					return;
				} else if (strpos($routeName, 'admin') !== false){
					$match->setParam('controller', AuthController::class);
					$match->setParam('action', 'login');
				}
				
		},100);
	}
	public function getConfig()
	{
		return include __DIR__ . "/../config/module.config.php";
	}
	
	public function getControllerConfig()
	{
		return [
			'factories' => [
				AuthController::class => AuthControllerFactory::class
			]
		];
	}
	
	public function getServiceConfig()
	{
		return [
			'aliases' => [
				AuthenticationService::class => AuthenticationServiceInterface::class
			],
			'factories' => [
				AuthenticationServiceInterface::class => AutheticationServiceFactory::class
			]
		];
	}
	
}