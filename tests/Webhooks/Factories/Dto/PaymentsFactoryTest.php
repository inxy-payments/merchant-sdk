<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentsFactory;

class PaymentsFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testPaymentCreate(): void
    {
        $payment = PaymentsFactory::create($this->payload);

        $this->assertSame('pay_WNgOL28rEdX47wP', $payment->id);
        $this->assertSame(ObjectName::Payment, $payment->object);
        $this->assertSame('finished', $payment->status);
        $this->assertSame('finished', $payment->subStatus);
        $this->assertSame(1.5, $payment->fiatAmount);
        $this->assertSame('USD', $payment->fiatCurrencyCode);
        $this->assertSame(1.5, $payment->amount);
        $this->assertSame('USDC', $payment->currencyCode);
        $this->assertSame('USDC', $payment->currency->code);
        $this->assertSame('ethereum', $payment->currency->blockchain);
        $this->assertSame('erc20', $payment->currency->coinType);
        $this->assertSame(1665645393, $payment->createdDate);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/entities/payment.json';
    }
}

