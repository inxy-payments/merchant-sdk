<?php

namespace Webhooks\Factories;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentSeizedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentSeizedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Enum\PaymentIntentStatus;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsSeizedWebhookFactory;

class PaymentsSeizedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsSeizedWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentSeizedWebhook::class, $webhook);
        $this->assertSame('wh_mKq34DEk15Jy0aX', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsSeized, $webhook->name);
        $this->assertSame(PaymentIntentStatus::Compliance, $webhook->data->paymentIntent->status);
        $this->assertSame('compliance', $webhook->data->payment->status);
        $this->assertSame('seized', $webhook->data->payment->subStatus);
        $this->assertInstanceOf(PaymentSeizedData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertInstanceOf(Payment::class, $webhook->data->payment);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.seized.json';
    }
}

