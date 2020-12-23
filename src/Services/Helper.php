<?php
namespace Ecpay\Sdk\Services;

class Helper
{
    /**
     * Dump 並結束
     *
     * @param  mixed  $content
     * @param  string $desc
     * @return void
     */
    public static function dd($content, $desc = '')
    {
        self::dump($content, $desc);
        exit;
    }
    
    /**
     * Dump
     *
     * @param  mixed  $content
     * @param  string $desc
     * @return void
     */
    public static function dump($content, $desc = '')
    {
        if (!empty($desc)) {
            echo $desc . PHP_EOL;
        }

        var_dump($content);
    }

    /**
     * 以可讀方式印出
     *
     * @param  mixed  $content
     * @param  string $desc
     * @return void
     */
    public static function printR($content, $desc = '')
    {
        if (!empty($desc)) {
            echo $desc . PHP_EOL;
        }

        echo print_r($content) . PHP_EOL;
    }
}
