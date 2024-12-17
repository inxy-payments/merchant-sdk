<?php

namespace Webhooks\Factories;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentReturnedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentReturnedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Enum\PaymentIntentStatus;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsReturnedWebhookFactory;

class PaymentsReturnedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsReturnedWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentReturnedWebhook::class, $webhook);
        $this->assertSame('wh_mKq34DEk15Jy0aX', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsReturned, $webhook->name);
        $this->assertSame(PaymentIntentStatus::Compliance, $webhook->data->paymentIntent->status);
        $this->assertSame('compliance', $webhook->data->payment->status);
        $this->assertSame('returned', $webhook->data->payment->subStatus);
        $this->assertInstanceOf(PaymentReturnedData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertInstanceOf(Payment::class, $webhook->data->payment);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.returned.json';
    }
}
