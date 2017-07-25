<?php
namespace Blog\Model\Factory;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Blog\Model\Comment;

class CommentTableGatewayFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$dbAdaper = $container->get(AdapterInterface::class);
		$resultSetPrototype = new ResultSet();
		$resultSetPrototype->setArrayObjectPrototype(new Comment());
		
		return new TableGateway('comments', $dbAdaper, null, $resultSetPrototype);
	}
}