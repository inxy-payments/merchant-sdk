<?php

namespace Webhooks\Factories;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentRejectedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentRejectedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsRejectedWebhookFactory;

class PaymentsRejectedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsRejectedWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentRejectedWebhook::class, $webhook);
        $this->assertSame('wh_mKq34DEk15Jy0aX', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsRejected, $webhook->name);
        $this->assertInstanceOf(PaymentRejectedData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertInstanceOf(Payment::class, $webhook->data->payment);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.rejected.json';
    }
}
