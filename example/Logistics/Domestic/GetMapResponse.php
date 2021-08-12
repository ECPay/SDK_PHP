<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Response\ArrayResponse;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory();
    $response = $factory->create(ArrayResponse::class);

    var_dump($response->get($_POST));
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
