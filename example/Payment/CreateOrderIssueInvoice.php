<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $factory = new Factory([
        'hashKey' => '5294y06JbISpM5x9',
        'hashIv' => 'v77hoKGq4kWxNNIS',
    ]);
    $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

    $serialNo = time();
    $input = [
        'MerchantID' => '2000132',
        'MerchantTradeNo' => 'Test' . $serialNo,
        'MerchantTradeDate' => date('Y/m/d H:i:s'),
        'PaymentType' => 'aio',
        'TotalAmount' => 100,
        'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
        'ItemName' => '範例商品1 100 TWD x 1#範例商品2 30 TWD x 3',
        'ReturnURL' => 'https://www.ecpay.com.tw/example/receive',
        'ChoosePayment' => 'Credit',
        'EncryptType' => 1,

        'InvoiceMark' => 'Y',
        'RelateNumber' => 'ETest' . $serialNo,
        'CustomerPhone' => '0911222333',
        'TaxType' => 1,
        'CarruerType' => 1,
        'Print' => 0,
        'InvoiceItemName' => UrlService::ecpayUrlEncode('範例商品1|範例商品2'),
        'InvoiceItemCount' => '1|3',
        'InvoiceItemWord' => UrlService::ecpayUrlEncode('顆|盒'),
        'InvoiceItemPrice' => '100|30',
        'DelayDay' => 0,
        'InvType' => '07',
    ];
    $action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';
    
    echo $autoSubmitFormService->generate($input, $action);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
