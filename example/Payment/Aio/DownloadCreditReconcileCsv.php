<?php

use Ecpay\Sdk\Factories\Factory;

require __DIR__ . '/../../../vendor/autoload.php';

$factory = new Factory([
    'hashKey' => '5294y06JbISpM5x9',
    'hashIv' => 'v77hoKGq4kWxNNIS',
]);
$autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

$input = [
    'MerchantID' => '2000132',
    'PayDateType' => 'close',
    'StartDate' => '2015-02-12',
    'EndDate' => '2015-02-12',
];
$action = 'https://payment-stage.ecpay.com.tw/CreditDetail/FundingReconDetail';

echo $autoSubmitFormService->generate($input, $action);
