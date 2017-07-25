<?php
namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;

class CommentTable
{
	private $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchAll($post_id)
	{
		return $this->tableGateway->select([
				'post_id' => $post_id
		]);
	}
	
	public function save(Comment $comment)
	{
		$data = $comment->getArrayCopy();
		$this->tableGateway->insert($data);
		return;
		
	}
}