<?php

use Ecpay\Sdk\Factories\Factory;

require __DIR__ . '/../../../vendor/autoload.php';

$factory = new Factory([
    'hashKey' => '5294y06JbISpM5x9',
    'hashIv' => 'v77hoKGq4kWxNNIS',
]);
$postService = $factory->create('PostWithCmvEncodedStrResponseService');

$input = [
    'MerchantID' => '2000132',
    'MerchantTradeNo' => '5fa271cc74e51',
    'TradeNo' => '2011041718071855',
    'Action' => 'C',
    'TotalAmount' => 8685,
];
$url = 'https://payment-stage.ecpay.com.tw/CreditDetail/DoAction';

$response = $postService->post($input, $url);
var_dump($response);
