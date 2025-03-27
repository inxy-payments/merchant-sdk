<?php

namespace Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\RefundsFactory;

class RefundsFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testRefundCreate()
    {
        $refund = RefundsFactory::create($this->payload);

        $this->assertSame('refund_OZxelV2Bg5EoAQ0', $refund->id);
        $this->assertSame(ObjectName::Refund, $refund->object);
        $this->assertSame('0x0b7544c1bd3e820db34c04b657a01c3c5a8a867882a62ec56889872fba277388', $refund->txHash);
        $this->assertSame('0xBd1E914a178Db7d54b8e0F2636D849e56Fc3d199', $refund->recipientAddress);
        $this->assertSame(1665695049, $refund->completedAt);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/entities/refund.json';
    }
}
