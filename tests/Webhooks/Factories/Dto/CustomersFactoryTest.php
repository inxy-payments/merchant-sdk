<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\CustomersFactory;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;

class CustomersFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testCustomerCreate()
    {
        $customer = CustomersFactory::create($this->payload);

        $this->assertSame('cus_OZxelV2Bg5EoAQ0', $customer->id);
        $this->assertSame(ObjectName::Customer, $customer->object);
        $this->assertSame('john.doe@example.com', $customer->email);
        $this->assertSame('John', $customer->firstName);
        $this->assertSame('Doe', $customer->lastName);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/entities/customer.json';
    }
}
