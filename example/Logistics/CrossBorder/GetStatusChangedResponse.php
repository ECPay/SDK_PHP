<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;
use Ecpay\Sdk\Request\AesRequest;
use Ecpay\Sdk\Response\AesJsonResponse;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory([
        'hashKey' => '5294y06JbISpM5x9',
        'hashIv' => 'v77hoKGq4kWxNNIS',
    ]);
    $jsonRequest = $factory->create(AesJsonResponse::class);
    $aesJsonResponse = $factory->create(AesRequest::class);

    $json = file_get_contents('php://input');
    
    $request = $jsonRequest->get($json);
    
    /**
     * 廠商端變更物流狀態(貨態)流程
     * Ex: 變更物流狀態 > ...
     * 以下為變更成功回應參考範例
     */
    $data = [
        'RtnCode' => 1,
        'RtnMsg' => 'OK',
    ];
    $output = [
        'MerchantID' => '2000132',
        'RqHeader' => [
            'Timestamp' => time(),
        ],
        'TransCode' => 1,
        'TransMsg' => '',
        'Data' => $data,
    ];
    echo $aesJsonResponse->get($output);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
