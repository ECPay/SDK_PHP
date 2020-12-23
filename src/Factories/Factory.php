<?php
namespace Ecpay\Sdk\Factories;

use Ecpay\Sdk\Request\Request;
use Ecpay\Sdk\Request\AesRequest;
use Ecpay\Sdk\Services\AesService;
use Ecpay\Sdk\Services\CurlService;
use Ecpay\Sdk\Services\HtmlService;
use Ecpay\Sdk\Services\PostService;
use Ecpay\Sdk\Response\JsonResponse;
use Ecpay\Sdk\Exceptions\RtnException;
use Ecpay\Sdk\Response\AesJsonResponse;
use Ecpay\Sdk\Abstracts\AbstractFactory;
use Ecpay\Sdk\Response\EncodedStrResponse;
use Ecpay\Sdk\Request\CheckMacValueRequest;
use Ecpay\Sdk\Services\CheckMacValueService;
use Ecpay\Sdk\Services\AutoSubmitFormService;
use Ecpay\Sdk\Abstracts\AbstractVerifiedResponse;
use Ecpay\Sdk\Abstracts\AbstractDecryptedResponse;
use Ecpay\Sdk\Response\VerifiedEncodedStrResponse;

class Factory extends AbstractFactory
{
    /**
     * 類別工廠
     *
     * @param  string $class
     * @return mixed
     *
     * @throws RtnException
     */
    public function create($class)
    {
        $instance = new $class();

        return $instance;
    }

    /**
     * 含 Hash 資訊類別工廠
     *
     * @param  string $class
     * @param  string $key
     * @param  string $iv
     * @return mixed
     *
     * @throws RtnException
     */
    public function createWithHash($class, $key, $iv)
    {
        $instance = null;
        
        switch (true) {
            /**
             * CheckMacValue 應用
             */
            case $this->isClassOrAlias($class, CheckMacValueRequest::class):
            case $this->isClassOrAlias($class, AbstractVerifiedResponse::class):
                $checkMacValueService = $this->createWithHash(CheckMacValueService::class, $key, $iv);
                $instance = new $class($checkMacValueService);
                break;

            case $this->isClassOrAlias($class, 'PostWithCmvVerifiedEncodedStrResponseService'):
                $checkMacValueRequest = $this->createWithHash(CheckMacValueRequest::class, $key, $iv);
                $curlService = $this->create(CurlService::class);
                $response = $this->createWithHash(VerifiedEncodedStrResponse::class, $key, $iv);
                $instance = new PostService($checkMacValueRequest, $curlService, $response);
                break;
            case $this->isClassOrAlias($class, 'PostWithCmvEncodedStrResponseService'):
                $checkMacValueRequest = $this->createWithHash(CheckMacValueRequest::class, $key, $iv);
                $curlService = $this->create(CurlService::class);
                $response = $this->create(EncodedStrResponse::class);
                $instance = new PostService($checkMacValueRequest, $curlService, $response);
                break;
            case $this->isClassOrAlias($class, 'PostWithCmvJsonResponseService'):
                $checkMacValueRequest = $this->createWithHash(CheckMacValueRequest::class, $key, $iv);
                $curlService = $this->create(CurlService::class);
                $response = $this->create(JsonResponse::class);
                $instance = new PostService($checkMacValueRequest, $curlService, $response);
                break;
            case $this->isClassOrAlias($class, 'AutoSubmitFormWithCmvService'):
                $checkMacValueRequest = $this->createWithHash(CheckMacValueRequest::class, $key, $iv);
                $htmlService = $this->create(HtmlService::class);
                $instance = new AutoSubmitFormService($checkMacValueRequest, $htmlService);
                break;

                /**
                 * AES 應用
                 */
            case $this->isClassOrAlias($class, AesRequest::class):
            case $this->isClassOrAlias($class, AbstractDecryptedResponse::class):
                $aesService = $this->createWithHash(AesService::class, $key, $iv);
                $instance = new $class($aesService);
                break;

            case $this->isClassOrAlias($class, 'PostWithAesJsonResponseService'):
                $aesRequest = $this->createWithHash(AesRequest::class, $key, $iv);
                $curlService = $this->create(CurlService::class);
                $response = $this->createWithHash(AesJsonResponse::class, $key, $iv);
                $instance = new PostService($aesRequest, $curlService, $response);
                break;
            case $this->isClassOrAlias($class, 'AutoSubmitFormWithAesService'):
                $request = $this->create(Request::class);
                $htmlService = $this->create(HtmlService::class);
                $instance = new AutoSubmitFormService($request, $htmlService);
                break;

            default:
                $instance = new $class($key, $iv);
        }

        return $instance;
    }
}
