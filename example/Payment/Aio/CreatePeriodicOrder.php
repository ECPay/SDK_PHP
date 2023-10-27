<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;

require __DIR__ . '/../../../vendor/autoload.php';

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
    'ReturnURL' => 'https://www.ecpay.com.tw/example/receive',
    'ChoosePayment' => 'Credit',
    'EncryptType' => 1,

    // 定期定額專用參數
    'PeriodAmount' => 100,
    'PeriodType' => 'M',
    'Frequency' => 1,
    'ExecTimes' => 6,

    // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
    'PeriodReturnURL' => 'https://www.ecpay.com.tw/example/receive',
];
$action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

echo $autoSubmitFormService->generate($input, $action);
