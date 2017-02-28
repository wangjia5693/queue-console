<?php
return [

	'debug' => true,

	'url' => 'http://localhost',

	'timezone' => 'UTC',

	'locale' => 'en',

	'fallback_locale' => 'en',

	'key' =>  'SomeRandomString',

	'cipher' => MCRYPT_RIJNDAEL_128,

	'log' => 'daily',

	'providers' => [
		'Illuminate\Bus\BusServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
	],

	'aliases' => [

	],
];
