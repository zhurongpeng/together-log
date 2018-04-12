<?php

require 'vendor/autoload.php';

$log = new Monolog\Logger('testname');
$log->pushHandler(new Monolog\Handler\StreamHandler('/home/zhurongpeng/workspace/test/logs/test.log', Monolog\Logger::WARNING));

$log->addWarning('测试');
