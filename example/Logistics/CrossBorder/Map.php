<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory;
    $hashKey = '5294y06JbISpM5x9';
    $hashIv = 'v77hoKGq4kWxNNIS';
    $postService = $factory->createWithHash('AutoSubmitFormWithAesService', $hashKey, $hashIv);

    $input = [
        'MerchantID' => '2000132',
        'MerchantTradeNo' => 'Test' . time(),
        'LogisticsType' => 'CB',
        'LogisticsSubType' => 'UNIMARTCBCVS',
        'Destination' => 'SG',
        'ServerReplyURL' => 'https://logistics-stage.ecpay.com.tw/MockMerchant/NoticsTestRtn',
    ];
    $action = 'https://logistics-stage.ecpay.com.tw/CrossBorder/Map';

    echo $postService->generate($input, $action);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
