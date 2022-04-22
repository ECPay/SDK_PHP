<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;

require __DIR__ . '/../../vendor/autoload.php';

$factory = new Factory([
    'hashKey' => '5294y06JbISpM5x9',
    'hashIv' => 'v77hoKGq4kWxNNIS',
]);
$autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

$input = [
    'MerchantID' => '2000132',
    'MerchantTradeNo' => 'Test' . time(),
    'MerchantTradeDate' => date('Y/m/d H:i:s'),
    'PaymentType' => 'aio',
    'TotalAmount' => 100,
    'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
    'ItemName' => '範例商品一批 100 TWD x 1',
    'ChoosePayment' => 'CVS',
    'EncryptType' => 1,

    // CVS 專用參數
    'StoreExpireDate' => 4320,
    'Desc_1' => '範例交易描述 1',
    'Desc_2' => '範例交易描述 2',
    'Desc_3' => '範例交易描述 3',
    'Desc_4' => '範例交易描述 4',

    // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
    'ReturnURL' => 'https://www.ecpay.com.tw/example/receive',
    'PaymentInfoURL' => 'https://www.ecpay.com.tw/example/payment-info',
];
$action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

echo $autoSubmitFormService->generate($input, $action);
