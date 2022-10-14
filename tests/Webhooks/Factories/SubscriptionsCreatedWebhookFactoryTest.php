<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionCreatedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\SubscriptionCreatedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\SubscriptionsCreatedWebhookFactory;

class SubscriptionsCreatedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = SubscriptionsCreatedWebhookFactory::create($this->payload);

        $this->assertInstanceOf(SubscriptionCreatedWebhook::class, $webhook);
        $this->assertSame('wh_0JwYj2l7wDXeNn8', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::SubscriptionsCreated, $webhook->name);
        $this->assertInstanceOf(SubscriptionCreatedData::class, $webhook->data);
        $this->assertInstanceOf(Subscription::class, $webhook->data->subscription);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/subscriptions.created.json';
    }
}
