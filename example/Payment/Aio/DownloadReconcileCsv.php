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
    'DateType' => '2',
    'BeginDate' => '2015-02-12',
    'EndDate' => '2015-02-12',
    'MediaFormated' => '0',
];
$action = 'https://vendor-stage.ecpay.com.tw/PaymentMedia/TradeNoAio';

echo $autoSubmitFormService->generate($input, $action);
