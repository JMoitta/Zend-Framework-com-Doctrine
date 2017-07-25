<?php
namespace Blog\Model\Factory;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Blog\Model\Post;
use Zend\Db\TableGateway\TableGateway;

class PostTableGatewayFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$dbAdaper = $container->get(AdapterInterface::class);
		$resultSetPrototype = new ResultSet();
		$resultSetPrototype->setArrayObjectPrototype(new Post());
		
		return new TableGateway('post', $dbAdaper, null, $resultSetPrototype);
	}
}