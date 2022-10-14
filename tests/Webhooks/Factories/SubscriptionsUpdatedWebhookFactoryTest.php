<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionUpdatedData;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\SubscriptionsUpdatedWebhookFactory;

class SubscriptionsUpdatedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate(): void
    {
        $webhook = SubscriptionsUpdatedWebhookFactory::create($this->payload);

        $this->assertSame('wh_W6n07dQQedxqmpB', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::SubscriptionsUpdated, $webhook->name);
        $this->assertInstanceOf(SubscriptionUpdatedData::class, $webhook->data);
        $this->assertInstanceOf(Subscription::class, $webhook->data->subscription);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/webhooks/subscriptions.updated.json';
    }
}
