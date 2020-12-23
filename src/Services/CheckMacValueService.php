<?php
namespace Ecpay\Sdk\Services;

use Exception;
use Ecpay\Sdk\Traits\HashInfo;
use Ecpay\Sdk\Services\UrlService;
use Ecpay\Sdk\Services\ArrayService;
use Ecpay\Sdk\Exceptions\RtnException;

class CheckMacValueService
{
    use HashInfo;

    public function __construct($key, $iv)
    {
        $this->setHashKey($key);
        $this->setHashIv($iv);
    }

    /**
     * 附加檢查碼
     *
     * @param  array   $source
     * @param  boolean $isSort
     * @return array
     */
    public function append($source, $isSort = true)
    {
        $source[$this->getFieldName()] = $this->generate($source);
        if ($isSort) {
            $source = $this->sort($source);
        }

        return $source;
    }

    /**
     * 檢查碼參數過濾
     *
     * @param  array $source
     * @return array
     */
    public function filter($source)
    {
        if (isset($source[$this->getFieldName()])) {
            unset($source[$this->getFieldName()]);
        }

        return $source;
    }

    /**
     * 產生檢查碼
     *
     * @param  array $source
     * @return string
     *
     * @throws RtnException
     */
    public function generate($source)
    {
        try {
            $filtered = $this->filter($source);
            $sorted = $this->sort($filtered);
            $combined = $this->toEncodeSourceString($sorted);
            $encoded = UrlService::ecpayUrlEncode($combined);
            $hash = $this->generateHash($encoded);
            $checkMacValue = strtoupper($hash);
        } catch (Exception $e) {
            throw new RtnException(102);
        }

        return $checkMacValue;
    }

    /**
     * 產生雜湊值
     *
     * @param  string $source
     * @return string
     */
    public function generateHash($source)
    {
        return hash('sha256', $source);
    }

    /**
     * 取得壓碼欄位名稱
     *
     * @return string
     */
    public function getFieldName()
    {
        return 'CheckMacValue';
    }
    
    /**
     * 排序
     *
     * @param  array $source
     * @return array
     */
    public function sort($source)
    {
        return ArrayService::naturalSort($source);
    }

    /**
     * 轉換為編碼來源字串
     *
     * @param  array $source
     * @return string
     */
    public function toEncodeSourceString($source)
    {
        $combined = 'HashKey=' . $this->getHashKey();
        foreach ($source as $name => $value) {
            $combined .= '&' . $name . '=' . $value;
        }
        $combined .= '&HashIV=' . $this->getHashIv();

        return $combined;
    }

    /**
     * 檢核檢查碼
     *
     * @param  array $source
     * @return boolean
     */
    public function verify($source)
    {
        $checkMacValue = $this->generate($source);

        return ($checkMacValue === $source[$this->getFieldName()]);
    }
}
