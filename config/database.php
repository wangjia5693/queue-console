<?php

return [
	'fetch' => PDO::FETCH_CLASS,
	'default' => 'mysql',
	'connections' => [
		'mysql' => [
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'b2b',
			'username'  => 'root',
			'password'  => 'wangjia5693',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			'strict'    => false,
		]
	],

	'migrations' => 'migrations',

	'redis' => [

		'cluster' => false,

		'default' => [
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		],

	],

];