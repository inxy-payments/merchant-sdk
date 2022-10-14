<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentsFactory;

class PaymentsFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testPaymentCreate()
    {
        $payment = PaymentsFactory::create($this->payload);

        $this->assertSame('pay_WNgOL28rEdX47wP', $payment->id);
        $this->assertSame(ObjectName::Payment, $payment->object);
        $this->assertSame('finished', $payment->status);
        $this->assertSame(1.5, $payment->fiatAmount);
        $this->assertSame('USD', $payment->fiatCurrencyCode);
        $this->assertSame(1.5, $payment->amount);
        $this->assertSame('USDC', $payment->currencyCode);
        $this->assertSame(1665645393, $payment->createdDate);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/entities/payment.json';
    }
}
