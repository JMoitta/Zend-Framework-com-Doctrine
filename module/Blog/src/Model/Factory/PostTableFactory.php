<?php
namespace Blog\Model\Factory;



use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Blog\Model\PostTable;
use Blog\Model;

class PostTableFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tableGateway = $container->get(Model\PostTableGateway::class);
		$commentTable = $container->get(Model\CommentTable::class);
		return new PostTable($tableGateway, $commentTable);
	}
}