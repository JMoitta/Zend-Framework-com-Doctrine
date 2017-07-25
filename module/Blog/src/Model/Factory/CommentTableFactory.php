<?php
namespace Blog\Model\Factory;



use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Blog\Model;
use Blog\Model\CommentTable;

class CommentTableFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tableGateway = $container->get(Model\CommentTableGateway::class);
		return new CommentTable($tableGateway);
	}
}