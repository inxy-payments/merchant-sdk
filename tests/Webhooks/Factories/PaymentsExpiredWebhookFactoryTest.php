<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentExpiredData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentExpiredWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsExpiredWebhookFactory;

class PaymentsExpiredWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsExpiredWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentExpiredWebhook::class, $webhook);
        $this->assertSame('wh_nBpLZ5Nr35Y9P6o', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsExpired, $webhook->name);
        $this->assertInstanceOf(PaymentExpiredData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertNull($webhook->data->payment);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.expired.json';
    }
}
