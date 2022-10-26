<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;

class SessionsFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testSessionCreate()
    {
        $session = SessionsFactory::create($this->payload);

        $this->assertSame('ses_kb4ZV2wPV5YGvJ6', $session->id);
        $this->assertSame(ObjectName::Session, $session->object);
        $this->assertSame('active', $session->status);
        $this->assertSame('onetime', $session->paymentType);
        $this->assertSame('test_order', $session->orderId);
        $this->assertSame('Test order', $session->orderName);
        $this->assertSame(1.5, $session->fiatAmount);
        $this->assertSame('USD', $session->fiatCurrencyCode);
        $this->assertSame(1665645203, $session->createdDate);
        $this->assertSame('john.doe@example.com', $session->customer->email);
        $this->assertSame('John', $session->customer->firstName);
        $this->assertSame('Doe', $session->customer->lastName);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/entities/session.json';
    }
}
