<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;

class PaymentIntentsFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testPaymentIntentCreate()
    {
        $paymentIntent = PaymentIntentsFactory::create($this->payload);

        $this->assertSame('pi_MvrKl2JNA29nkGB', $paymentIntent->id);
        $this->assertSame(ObjectName::PaymentIntent, $paymentIntent->object);
        $this->assertSame('waiting_payment', $paymentIntent->status);
        $this->assertSame(1, $paymentIntent->exchangeRate);
        $this->assertSame(1.5, $paymentIntent->amount);
        $this->assertSame(0, $paymentIntent->paidAmount);
        $this->assertSame(1.5, $paymentIntent->fiatAmount);
        $this->assertSame(0, $paymentIntent->paidFiatAmount);
        $this->assertSame([], $paymentIntent->payments);
        $this->assertSame('USDC', $paymentIntent->currencyCode);
        $this->assertSame('USDC', $paymentIntent->currency->code);
        $this->assertSame('ethereum', $paymentIntent->currency->blockchain);
        $this->assertSame('erc20', $paymentIntent->currency->coinType);
        $this->assertSame(1665645215, $paymentIntent->createdDate);
        $this->assertSame('john.doe@example.com', $paymentIntent->customer->email);
        $this->assertSame('John', $paymentIntent->customer->firstName);
        $this->assertSame('Doe', $paymentIntent->customer->lastName);
        $this->assertSame('0x180F24036784e971a3460606E58d2056fa75f25F', $paymentIntent->issuedWallet);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/entities/payment_intent.json';
    }
}
