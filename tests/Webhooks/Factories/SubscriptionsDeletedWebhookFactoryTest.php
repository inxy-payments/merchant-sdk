<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionDeletedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\SubscriptionDeletedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\SubscriptionsDeletedWebhookFactory;

class SubscriptionsDeletedWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = SubscriptionsDeletedWebhookFactory::create($this->payload);

        $this->assertInstanceOf(SubscriptionDeletedWebhook::class, $webhook);
        $this->assertSame('wh_l1pPJ2gwl24xK0E', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::SubscriptionsDeleted, $webhook->name);
        $this->assertInstanceOf(SubscriptionDeletedData::class, $webhook->data);
        $this->assertInstanceOf(Subscription::class, $webhook->data->subscription);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/subscriptions.deleted.json';
    }
}
