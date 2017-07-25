<?php
namespace Blog\Form\Factory;

use Interop\Container\ContainerInterface;
use Blog\InputFilter\PostInputFilter;
use Blog\Form\PostForm;

class PostFormFactory
{
	public function __invoke(ContainerInterface $container){
		$inputFliter = new PostInputFilter();
		$form = new PostForm();
		$form->setInputFilter($inputFliter);
		return $form;
	}
}