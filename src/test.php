<?php

require 'vendor/autoload.php';

// $log = new Monolog\Logger('testname');
// $log->pushHandler(new Monolog\Handler\StreamHandler('/home/zhurongpeng/workspace/test/logs/test.log', Monolog\Logger::WARNING));
//
// $log->info(json_encode(['test', '测试']));

use Zrp\PLog;

$log = new PLog('test');

$log->info('test', 'ceshi');
