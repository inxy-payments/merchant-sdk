<?php

namespace INXY\Payments\Merchant\Webhooks\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentReturnedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentReturnedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\RefundsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use stdClass;

class PaymentsReturnedWebhookFactory
{
    /**
     * @param stdClass $webhook
     *
     * @return PaymentReturnedWebhook
     */
    public static function create(stdClass $webhook): PaymentReturnedWebhook
    {
        if (!property_exists($webhook, 'object') || $webhook->object !== ObjectName::Webhook) {
            throw new InvalidArgumentException('Webhook param must be object with name webhook');
        }

        if (!property_exists($webhook, 'name') || $webhook->name !== EventName::PaymentsReturned) {
            throw new InvalidArgumentException('Undefined webhook name');
        }

        $webhookData = new PaymentReturnedData();

        $webhookData->session       = SessionsFactory::create($webhook->data->session);
        $webhookData->paymentIntent = PaymentIntentsFactory::create($webhook->data->payment_intent);
        $webhookData->payment       = PaymentsFactory::create($webhook->data->payment);
        $webhookData->refund        = RefundsFactory::create($webhook->data->refund);

        $webhookDto = new PaymentReturnedWebhook($webhook->id, $webhook->object, $webhook->name);

        $webhookDto->data = $webhookData;

        return $webhookDto;
    }
}
