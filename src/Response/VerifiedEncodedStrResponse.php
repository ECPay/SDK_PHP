<?php

namespace Ecpay\Sdk\Response;

use Ecpay\Sdk\Abstracts\AbstractVerifiedResponse;

class VerifiedEncodedStrResponse extends AbstractVerifiedResponse
{
    /**
     * 轉陣列
     *
     * @param  mixed $response
     * @return array
     */
    public function toArray($response)
    {
        parse_str($response, $parsed);

        return $parsed;
    }
}
