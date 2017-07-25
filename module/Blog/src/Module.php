<?php

namespace Blog;


use Zend\ModuleManager\Feature\ConfigProviderInterface;

use Blog\Controller\BlogController;

use Blog\Controller\Factory\BlogControllerFactory;

use Blog\Model;

use Blog\Model\Factory\PostTableGatewayFactory;
use Blog\Model\Factory\PostTableFactory;
use Blog\Model\Factory\CommentTableFactory;
use Blog\Model\Factory\CommentTableGatewayFactory;

use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Blog\Form\Factory\PostFormFactory;
use Blog\Controller\PostController;
use Blog\Controller\Factory\PostControllerFactory;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{
	public function getConfig()
	{
		return include __DIR__ . "/../config/module.config.php";
	}
	
	public function getServiceConfig()
	{
		return [
			'factories' => [
				Model\PostTable::class => PostTableFactory::class,
				Model\PostTableGateway::class => PostTableGatewayFactory::class,
				Form\PostForm::class => PostFormFactory::class,
				Model\CommentTable::class => CommentTableFactory::class,
				Model\CommentTableGateway::class => CommentTableGatewayFactory::class,
			]	
		];
	}
	
	public function getControllerConfig()
	{
		return [
			'factories' => [
				BlogController::class => BlogControllerFactory::class,
				PostController::class => PostControllerFactory::class
			]
		];
	}
	
}