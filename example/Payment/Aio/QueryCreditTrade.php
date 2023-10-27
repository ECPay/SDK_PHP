<?php

use Ecpay\Sdk\Factories\Factory;

require __DIR__ . '/../../../vendor/autoload.php';

$factory = new Factory([
    'hashKey' => '5294y06JbISpM5x9',
    'hashIv' => 'v77hoKGq4kWxNNIS',
]);
$postService = $factory->create('PostWithCmvJsonResponseService');

$parameters = [
    'MerchantID' => '2000132',
    'CreditRefundId' => 11304112,
    'CreditAmount' => 8685,
    'CreditCheckCode' => 91845555,
];
$url = 'https://payment-stage.ecPay.com.tw/CreditDetail/QueryTrade/V2';

$response = $postService->post($parameters, $url);
var_dump($response);
