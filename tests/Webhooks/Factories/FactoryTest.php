<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories;

use PHPUnit\Framework\TestCase;
use stdClass;

abstract class FactoryTest extends TestCase
{
    /**
     * @var stdClass
     */
    protected $payload;

    /**
     * @return void
     */
    public function setUp()
    {
        $payload       = file_get_contents($this->payloadFilePath());
        $this->payload = json_decode($payload, false);
    }

    /**
     * @return string
     */
    abstract protected function payloadFilePath();
}
