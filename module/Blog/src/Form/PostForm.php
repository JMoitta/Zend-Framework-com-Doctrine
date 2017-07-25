<?php
namespace Blog\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class PostForm extends Form
{
	public function __construct(){
		parent::__construct('post');
		
		$this->add([
			'name' => 'id',
			'type' => Element\Textarea::class
		]);
		
		$this->add([
			'name' => 'title',
			'type' => Element\Text::class,
			'options' => [
				'label' => 'Title'
			]
		]);
		
		$this->add([
				'name' => 'content',
				'type' => Element\Textarea::class,
				'options' => [
					'label' => 'Content'
				]
		]);
		
		$this->add([
				'name' => 'submit',
				'type' => Element\Submit::class,
				'attributes' => [
						'value' => 'Go',
						'id' => 'submitbutton'
				]
		]);
	}
}
