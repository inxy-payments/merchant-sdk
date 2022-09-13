<?php

namespace INXY\Payments\Merchant\Webhooks\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentInitData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentWaitingConfirmationsData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentInitWebhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentWaitingConfirmationsWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use stdClass;

class PaymentsWaitingConfirmationsWebhookFactory
{
    /**
     * @param stdClass $webhook
     * @return PaymentWaitingConfirmationsWebhook
     */
    public static function create(stdClass $webhook)
    {
        if (!property_exists($webhook, 'object') || $webhook->object !== ObjectName::Webhook) {
            throw new InvalidArgumentException('Webhook param must be object with name webhook');
        }

        if (!property_exists($webhook, 'name') || $webhook->name !== EventName::PaymentsWaitingConfirmations) {
            throw new InvalidArgumentException('Undefined webhook name');
        }

        $webhookData = new PaymentWaitingConfirmationsData();

        $webhookData->payment       = PaymentsFactory::create($webhook->data->payment);
        $webhookData->session       = SessionsFactory::create($webhook->data->session);
        $webhookData->paymentIntent = PaymentIntentsFactory::create($webhook->data->payment_intent);

        $webhookDto = new PaymentWaitingConfirmationsWebhook($webhook->id, $webhook->object, $webhook->name);

        $webhookDto->data = $webhookData;

        return $webhookDto;
    }
}
