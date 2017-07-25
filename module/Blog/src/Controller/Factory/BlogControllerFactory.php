<?php
namespace Blog\Controller\Factory;

use Blog\Model\PostTable;
use Interop\Container\ContainerInterface;
use Blog\Controller\BlogController;
use Blog\Form\PostForm;

class BlogControllerFactory
{
	public function __invoke(ContainerInterface $container){
		$postTable = $container->get(PostTable::class);
		$postForm = $container->get(PostForm::class);
		return new BlogController($postTable, $postForm);
	}
}