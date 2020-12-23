<?php
namespace Ecpay\Sdk\TestCase;

use Ecpay\Sdk\Traits\StageInfo;
use PHPUnit\Framework\TestCase;
use Ecpay\Sdk\Factories\Factory;

class MultipleServiceTestCase extends TestCase
{
    use StageInfo;
    
    /**
     * Factory
     *
     * @var Factory
     */
    protected $factory;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->factory = new Factory;
    }

    /**
     * 建立類別
     *
     * @param  string $class
     * @return mixed
     */
    protected function create($class)
    {
        return $this->factory->createWithHash(
            $class,
            $this->stageOtpHashKey,
            $this->stageOtpHashIv
        );
    }
}
