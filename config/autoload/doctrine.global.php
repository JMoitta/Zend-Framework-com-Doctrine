<?php

use Doctrine\DBAL\Driver\PDOMySql\Driver;

return [
	'doctrine' => [
		'connection' => [
			// default connection name
			'orm_default' => [
				'driverClass' => Driver::class,
				'params' => [
					'hots' => 'localhost',
					'port' => '3306',
					'driverOptions' => [
							\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
					]
				]
			]
		]
	]
];