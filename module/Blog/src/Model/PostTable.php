<?php
namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;

class PostTable
{
	private $tableGateway;
	private $commentTable;
	
	public function __construct(TableGateway $tableGateway, CommentTable $commentTable)
	{
		$this->tableGateway = $tableGateway;
		$this->commentTable = $commentTable;
	}
	
	public function fetchAll()
	{
		return $this->tableGateway->select();
	}
	
	public function save(Post $post)
	{
		$data = $post->getArrayCopy();
		
		$id = (int) $post->id;
		if($id <= 0){
			$post->id = null;
			$this->tableGateway->insert($data);
			return;
		}
		
		if(!$this->find($id)){
			
		}
		$this->tableGateway->update($data, ['id' => $id]);
	}
	public function find($id)
	{
		/** @var Post $row*/
		$id = (int) $id;
		$rowset = $this->tableGateway->select(['id' => $id]);
		$row = $rowset->current();
		
		if(!$row){
			throw new \RuntimeException(sprintf(
				'Could not retrive the row %d', $id
			));
		}
		$rownsComment = $this->commentTable->fetchAll($row->id);
		$row->comments = iterator_to_array($rownsComment);
		return $row;
	}
	public function delete($id)
	{
		$this->tableGateway->delete(['id' => (int)$id]);
	}
}