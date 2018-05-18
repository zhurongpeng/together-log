<?php

require __DIR__ . '/vendor/autoload.php';

use Zrp\PLog;

$log = new PLog('api_test');

$params = [
    "id"=> 38,
    "panelId"=> 9,
    "type"=> 0,
    "productId"=> 150635087972564,
    "sortOrder"=> 3,
    "fullUrl"=> "https://www.smartisan.com/pr/#/video/changhuxi-jinghuaqi",
    "picUrl"=> "https://resource.smartisan.com/resource/c245ada282824a4a15e68bec80502ad4.jpg",
    "picUrl2"=> null,
    "picUrl3"=> null,
    "created"=> 1524066718000,
    "updated"=> 1524197011000,
    "salePrice"=> 1,
    "productName"=> "支付测试商品 IPhone X 全面屏 全面绽放",
    "subTitle"=> "此仅为支付测试商品 拍下不会发货",
    "productImageBig"=> "https://resource.smartisan.com/resource/c245ada282824a4a15e68bec80502ad4.jpg"
];

$log->info('test', 'params:'. json_encode($params));
