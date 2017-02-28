<?php

return [

	'default' => 'array',

	'stores' => [

		'apc' => [
			'driver' => 'apc'
		],

		'array' => [
			'driver' => 'array'
		],

		'database' => [
			'driver' => 'database',
			'table'  => 'cache',
			'connection' => null,
		],

		'file' => [
			'driver' => 'file',
			'path'   => '/cache',
		],

		'memcached' => [
			'driver'  => 'memcached',
			'servers' => [
				[
					'host' => '127.0.0.1', 'port' => 11211, 'weight' => 100
				],
			],
		],

		'redis' => [
			'driver' => 'redis',
			'connection' => 'default',
		],

	],

	'prefix' => 'lar',

];
