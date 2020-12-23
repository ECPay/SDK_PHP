<?php
namespace Ecpay\Sdk\Services;

use Ecpay\Sdk\Exceptions\RtnException;
use Ecpay\Sdk\Interfaces\Services\HttpClientInterface;

class CurlService implements HttpClientInterface
{
    /**
     * 執行
     *
     * @param  mixed  $request
     * @param  string $url
     * @return mixed
     *
     * @throws RtnException
     */
    public function run($request, $url)
    {
        $ch = curl_init();
        if ($ch === false) {
            throw new RtnException(107);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

        $rs = curl_exec($ch);
        if ($rs === false) {
            throw new RtnException(108);
        }
        curl_close($ch);

        return $rs;
    }
}
