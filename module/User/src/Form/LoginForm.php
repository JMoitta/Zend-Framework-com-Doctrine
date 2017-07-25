<?php

namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class LoginForm extends Form
{
	public function __construct()
	{
		parent::__construct("login");
		
		$this->add([
			'name' => 'username',
			'type' => Element\Text::class,
			'options' => [
				'label' => 'Usuário'
			]
		]);
		
		$this->add([
			'name' => 'password',
			'type' => Element\Password::class,
			'options' => [
				'label' => 'Senha'
			]
		]);
		
		$this->add([
			'name' => 'submit',
			'type' => Element\Submit::class,
			'attributes' => [
				'value' => 'Entrar',
				'id' => 'submitbutton'
			]
		]);
	}
}