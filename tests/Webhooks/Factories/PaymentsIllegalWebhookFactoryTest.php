<?php

namespace Webhooks\Factories;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentIllegalData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentIllegalWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Enum\PaymentIntentStatus;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsIllegalWebhookFactory;

class PaymentsIllegalWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsIllegalWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentIllegalWebhook::class, $webhook);
        $this->assertSame('wh_mKq34DEk15Jy0aX', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsIllegal, $webhook->name);
        $this->assertSame(PaymentIntentStatus::Illegal, $webhook->data->paymentIntent->status);
        $this->assertInstanceOf(PaymentIllegalData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertInstanceOf(Payment::class, $webhook->data->payment);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.illegal.json';
    }
}
