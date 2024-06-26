<?php

namespace INXY\Payments\Merchant\Webhooks\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentFailedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentFailedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use stdClass;

class PaymentsFailedWebhookFactory
{
    /**
     * @param stdClass $webhook
     * @return PaymentFailedWebhook
     */
    public static function create(stdClass $webhook): PaymentFailedWebhook
    {
        if (!property_exists($webhook, 'object') || $webhook->object !== ObjectName::Webhook) {
            throw new InvalidArgumentException('Webhook param must be object with name webhook');
        }

        if (!property_exists($webhook, 'name') || $webhook->name !== EventName::PaymentsFailed) {
            throw new InvalidArgumentException('Undefined webhook name');
        }

        $webhookData = new PaymentFailedData();

        $webhookData->session       = SessionsFactory::create($webhook->data->session);
        $webhookData->paymentIntent = PaymentIntentsFactory::create($webhook->data->payment_intent);

        $webhookDto = new PaymentFailedWebhook($webhook->id, $webhook->object, $webhook->name);

        $webhookDto->data = $webhookData;

        return $webhookDto;
    }
}
