<?php

namespace Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\FeesFactory;

class FeeFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testPaymentIntentCreate()
    {
        $fees = FeesFactory::create($this->payload);

        $this->assertSame(ObjectName::Fee, $fees->object);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/entities/fees.json';
    }
}