<?php
namespace Blog\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\HtmlEntities;
use Zend\Validator\NotEmpty;

class PostInputFilter extends InputFilter
{
	public function __construct()
	{
		
		$this->add([
			'name' => 'id',
			'required' => true,
			'allow_empty' => true,
			'filters' => [
				['name' => StringTrim::class],
				['name' => StripTags::class],
				['name' => HtmlEntities::class]
			],
		]);
		
		$this->add([
			'name' => 'title',
			'required' => true,
			'filters' => [
				['name' => StringTrim::class],
				['name' => StripTags::class],
				['name' => HtmlEntities::class]
			],
			'validators' => [
				[
					'name' => NotEmpty::class,
					'options' => [
						'messages' => [
							NotEmpty::IS_EMPTY => 'O campo é requerido!',
							
						]
					]
				]
			]
		]);
		
		$this->add([
			'name' => 'content',
			'required' => true,
			'validators' => [
				[
					'name' => NotEmpty::class,
					'options' => [
						'messages' => [
							NotEmpty::IS_EMPTY => 'O campo é requerido!',
						]
					]
				]
			]
		]);
	}
}