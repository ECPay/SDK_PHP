<?php
namespace Ecpay\Sdk\Response;

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
        $decoded = json_decode($response, true);

        return $decoded;
    }
}
