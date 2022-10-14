<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentFailedData;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsFailedWebhookFactory;

class PaymentsFailedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate(): void
    {
        $webhook = PaymentsFailedWebhookFactory::create($this->payload);

        $this->assertSame('wh_xXmV329qz2NYQMl', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsFailed, $webhook->name);
        $this->assertInstanceOf(PaymentFailedData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertInstanceOf(Subscription::class, $webhook->data->subscription);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/webhooks/payments.failed.json';
    }
}
