<?php
namespace Ecpay\Sdk\Response;

use Ecpay\Sdk\Services\Helper;
use Ecpay\Sdk\Abstracts\AbstractDecryptedResponse;

class AesJsonResponse extends AbstractDecryptedResponse
{
    /**
     * 轉陣列
     *
     * @param  mixed $response
     * @return array
     */
    public function toArray($response)
    {
        if (Helper::isJson($response)) {
            $decoded = json_decode($response, true);
        } else {
            $decoded = ['undefined'];
        }

        return $decoded;
    }
}
