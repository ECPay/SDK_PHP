<?php

namespace Ecpay\Sdk\Abstracts;

use Ecpay\Sdk\Services\AesService;
use Ecpay\Sdk\Services\ArrayService;
use Ecpay\Sdk\Exceptions\RtnException;
use Ecpay\Sdk\Interfaces\Response\ResponseInterface;

abstract class AbstractDecryptedResponse implements ResponseInterface
{
    /**
     * AesService
     *
     * @var AesService
     */
    protected $aesService;

    /**
     * 注入驗證 Service
     *
     * @param AesService $aesService
     */

    public function __construct(AesService $aesService)
    {
        $this->aesService = $aesService;
    }

    /**
     * 取得 Response
     *
     * @param  mixed $source
     * @return array
     *
     * @throws RtnException
     */
    public function get($source)
    {
        $parsed = $this->toArray($source);
        $decrypted = $this->aesService->decryptData($parsed);
        return ArrayService::naturalSort($decrypted);
    }
}
