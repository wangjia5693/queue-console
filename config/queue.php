<?php

return [

	'default' =>  'beanstalkd',

	'connections' => [

		'sync' => [
			'driver' => 'sync',
		],
		'beanstalkd' => [
			'driver' => 'beanstalkd',
			'host'   => '192.168.101.147',
			'queue'  => 'beanstalkd',
			'ttr'    => 60,
		],
		'redis' => [
			'driver' => 'redis',
			'queue'  => 'default',
			'expire' => 60,
		],

	],

	'failed' => [
		'database' => 'b2b', 'table' => 'failed_jobs',
	],

];
