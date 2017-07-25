<?php
namespace Blog\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class CommentForm extends Form
{
	public function __construct(){
		parent::__construct('comment');
		
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
						'value' => 'Enviar',
						'id' => 'submitbutton'
				]
		]);
	}
}
