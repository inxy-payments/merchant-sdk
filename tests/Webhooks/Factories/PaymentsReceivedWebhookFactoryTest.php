<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentReceivedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentReceivedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsReceivedWebhookFactory;

class PaymentsReceivedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsReceivedWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentReceivedWebhook::class, $webhook);
        $this->assertSame('wh_mKq34DEk15Jy0aX', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsReceived, $webhook->name);
        $this->assertInstanceOf(PaymentReceivedData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertInstanceOf(Payment::class, $webhook->data->payment);
        $this->assertInstanceOf(Subscription::class, $webhook->data->subscription);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.received.json';
    }
}
