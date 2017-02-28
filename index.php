<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 13:50
 */
require __DIR__.'/vendor/autoload.php';
use Illuminate\Queue\Capsule\Manager as Queue;
$queue = new Queue();
$queue->addConnection([
    'driver' => 'beanstalkd',
    'host' => '192.168.101.147',
    'queue' => 'default',
],'beanstalkd');
$queue->setAsGlobal();

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as DB;

$__CFG['ndb']['username'] = 'b2b';
$__CFG['ndb']['host'] = '192.168.101.10';//'mysql_ms_dev';
$__CFG['ndb']['password'] = 'b2b1234';
$__CFG['ndb']['charset'] = 'utf8';
$__CFG['ndb']['collation'] = 'utf8_unicode_ci';
$__CFG['ndb']['driver'] = 'mysql';
$__CFG['ndb']['database'] = 'b2b';
$__CFG['ndb']['port'] = '3306';

$capsule = new DB;
$capsule->addConnection($__CFG['ndb']);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();


$a = Jobs\Test::find(1);

//include_once __DIR__."/jobs/SendEmail.php";
//$emailJob = new \Jobs\SendEmail(array('name'=>'wj','email'=>'wangjia5693'));
$emailJob = new \Jobs\SendEmail($a);

// As an instance...
//$queue->push('SendEmail', array('message' => $message));

// If setAsGlobal has been called...

$a = Queue::push($emailJob,'default','beanstalkd');//当job是一个对象的时候，第二个参数是没有效果的，可通过job的构造函数传入
var_dump($a);