<?php

namespace INXY\Payments\Merchant\Tests;

use JsonException;
use PHPUnit\Framework\TestCase;
use stdClass;

abstract class FactoryTest extends TestCase
{
    protected stdClass $payload;

    /**
     * @return void
     * @throws JsonException
     */
    public function setUp(): void
    {
        $payload       = file_get_contents($this->payloadFilePath());
        $this->payload = json_decode($payload, false, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return string
     */
    abstract protected function payloadFilePath(): string;
}
