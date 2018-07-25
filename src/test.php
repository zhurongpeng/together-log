<?php

require 'vendor/autoload.php';

// $log = new Monolog\Logger('testname');
// $log->pushHandler(new Monolog\Handler\StreamHandler('/home/zhurongpeng/workspace/test/logs/test.log', Monolog\Logger::WARNING));
//
// $log->info(json_encode(['test', '测试']));

use Together\Log;

$log = new Log();

$log->debug('test', 'message:测试错误 参数:' . json_encode(['username' => 'Seldaek']));
