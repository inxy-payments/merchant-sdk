<?php

namespace INXY\Payments\Merchant\Webhooks\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentRejectedData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentIllegalData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentIllegalWebhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentRejectedWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use stdClass;

class PaymentsIllegalWebhookFactory
{
    /**
     * @param stdClass $webhook
     *
     * @return PaymentIllegalWebhook
     */
    public static function create(stdClass $webhook)
    {
        if (!property_exists($webhook, 'object') || $webhook->object !== ObjectName::Webhook) {
            throw new InvalidArgumentException('Webhook param must be object with name webhook');
        }

        if (!property_exists($webhook, 'name') || $webhook->name !== EventName::PaymentsIllegal) {
            throw new InvalidArgumentException('Undefined webhook name');
        }

        $webhookData = new PaymentIllegalData();

        $webhookData->session       = SessionsFactory::create($webhook->data->session);
        $webhookData->paymentIntent = PaymentIntentsFactory::create($webhook->data->payment_intent);
        $webhookData->payment       = PaymentsFactory::create($webhook->data->payment);

        $webhookDto = new PaymentIllegalWebhook($webhook->id, $webhook->object, $webhook->name);

        $webhookDto->data = $webhookData;

        return $webhookDto;
    }
}
