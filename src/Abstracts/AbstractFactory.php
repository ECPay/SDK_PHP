<?php
namespace Ecpay\Sdk\Abstracts;

use ReflectionClass;

abstract class AbstractFactory
{
    /**
     * 類別工廠
     *
     * @param  string $class
     * @return mixed
     *
     * @throws RtnException
     */
    abstract public function create($class);

    /**
     * 是否為某類別或別名
     *
     * @param  string $class
     * @param  string $target
     * @return boolean
     */
    protected function isClassOrAlias($class, $target)
    {
        $result = false;
        if ($class === $target) {
            $result = true;
        } else {
            if (class_exists($class) && class_exists($target)) {
                $reflection = new ReflectionClass($class);
                if ($reflection->isSubclassOf($target)) {
                    $result = true;
                }
            }
        }

        return $result;
    }
}
