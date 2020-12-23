<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;
use Ecpay\Sdk\Response\VerifiedArrayResponse;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $factory = new Factory;
    $hashKey = '5294y06JbISpM5x9';
    $hashIv = 'v77hoKGq4kWxNNIS';
    $checkoutResponse = $factory->createWithHash(VerifiedArrayResponse::class, $hashKey, $hashIv);

    $_POST = [
        'MerchantID' => '2000132',
        'MerchantTradeNo' => 'WPLL4E341E122DB44D62',
        'PaymentDate' => '2019/05/09 00:01:21',
        'PaymentType' => 'Credit_CreditCard',
        'PaymentTypeChargeFee' => '1',
        'RtnCode' => '1',
        'RtnMsg' => '交易成功',
        'SimulatePaid' => '0',
        'TradeAmt' => '500',
        'TradeDate' => '2019/05/09 00:00:18',
        'TradeNo' => '1905090000188278',
        'CheckMacValue' => '59B085BAEC4269DC1182D48DEF106B431055D95622EB285DECD400337144C698',
    ];
    
    var_dump($checkoutResponse->get($_POST));
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
