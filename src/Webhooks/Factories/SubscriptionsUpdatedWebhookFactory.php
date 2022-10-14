<?php

namespace INXY\Payments\Merchant\Webhooks\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionUpdatedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\SubscriptionUpdatedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SubscriptionsFactory;
use stdClass;

class SubscriptionsUpdatedWebhookFactory
{
    /**
     * @param stdClass $webhook
     * @return SubscriptionUpdatedWebhook
     */
    public static function create(stdClass $webhook): SubscriptionUpdatedWebhook
    {
        if (!property_exists($webhook, 'object') || $webhook->object !== ObjectName::Webhook) {
            throw new InvalidArgumentException('Webhook param must be object with name webhook');
        }

        if (!property_exists($webhook, 'name') || $webhook->name !== EventName::SubscriptionsUpdated) {
            throw new InvalidArgumentException('Undefined webhook name');
        }

        $webhookData = new SubscriptionUpdatedData();

        $webhookData->session       = SessionsFactory::create($webhook->data->session);
        $webhookData->paymentIntent = PaymentIntentsFactory::create($webhook->data->payment_intent);
        $webhookData->subscription  = SubscriptionsFactory::create($webhook->data->subscription);

        $webhookDto = new SubscriptionUpdatedWebhook($webhook->id, $webhook->object, $webhook->name);

        $webhookDto->data = $webhookData;

        return $webhookDto;
    }
}
