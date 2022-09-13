<?php

namespace INXY\Payments\Merchant\Webhooks\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentExpiredData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentExpiredWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use stdClass;

class PaymentsExpiredWebhookFactory
{
    /**
     * @param stdClass $webhook
     * @return PaymentExpiredWebhook
     */
    public static function create(stdClass $webhook)
    {
        if (!property_exists($webhook, 'object') || $webhook->object !== ObjectName::Webhook) {
            throw new InvalidArgumentException('Webhook param must be object with name webhook');
        }

        if (!property_exists($webhook, 'name') || $webhook->name !== EventName::PaymentsExpired) {
            throw new InvalidArgumentException('Undefined webhook name');
        }

        $webhookData = new PaymentExpiredData();

        $webhookData->session       = SessionsFactory::create($webhook->data->session);
        $webhookData->paymentIntent = $webhook->data->paymentIntent ? PaymentIntentsFactory::create($webhook->data->payment_intent) : null;
        $webhookData->payment       = $webhook->data->payment ? PaymentsFactory::create($webhook->data->payment) : null;

        $webhookDto = new PaymentExpiredWebhook($webhook->id, $webhook->object, $webhook->name);

        $webhookDto->data = $webhookData;

        return $webhookDto;
    }
}
