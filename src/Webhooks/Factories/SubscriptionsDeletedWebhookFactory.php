<?php

namespace INXY\Payments\Merchant\Webhooks\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionDeletedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\SubscriptionDeletedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SubscriptionsFactory;
use stdClass;

class SubscriptionsDeletedWebhookFactory
{
    /**
     * @param stdClass $webhook
     * @return SubscriptionDeletedWebhook
     */
    public static function create(stdClass $webhook)
    {
        if (!property_exists($webhook, 'object') || $webhook->object !== ObjectName::Webhook) {
            throw new InvalidArgumentException('Webhook param must be object with name webhook');
        }

        if (!property_exists($webhook, 'name') || $webhook->name !== EventName::SubscriptionsDeleted) {
            throw new InvalidArgumentException('Undefined webhook name');
        }

        $webhookData = new SubscriptionDeletedData();

        $webhookData->session      = SessionsFactory::create($webhook->data->session);
        $webhookData->subscription = SubscriptionsFactory::create($webhook->data->subscription);

        $webhookDto = new SubscriptionDeletedWebhook($webhook->id, $webhook->object, $webhook->name);

        $webhookDto->data = $webhookData;

        return $webhookDto;
    }
}
