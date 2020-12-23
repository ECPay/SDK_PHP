<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $factory = new Factory;
    $hashKey = '5294y06JbISpM5x9';
    $hashIv = 'v77hoKGq4kWxNNIS';
    $autoSubmitFormService = $factory->createWithHash('AutoSubmitFormWithCmvService', $hashKey, $hashIv);

    $input = [
        'MerchantID' => '2000132',
        'PayDateType' => 'close',
        'StartDate' => '2015-02-12',
        'EndDate' => '2015-02-12',
    ];
    $action = 'https://payment-stage.ecpay.com.tw/CreditDetail/FundingReconDetail';
    
    echo $autoSubmitFormService->generate($input, $action);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
