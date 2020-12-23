<?php
namespace Ecpay\Sdk\TestCase;

use Ecpay\Sdk\Traits\StageInfo;
use PHPUnit\Framework\TestCase;
use Ecpay\Sdk\Factories\Factory;

class SingleServiceTestCase extends TestCase
{
    use StageInfo;
    
    /**
     * Factory
     *
     * @var Factory
     */
    protected $factory;

    /**
     * Service
     *
     * @var Service
     */
    protected $service;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->factory = new Factory;
        $this->service = $this->getService();
    }

    /**
     * 取得測試 Service
     *
     * @return mixed
     */
    protected function getService()
    {
        return null;
    }
}
