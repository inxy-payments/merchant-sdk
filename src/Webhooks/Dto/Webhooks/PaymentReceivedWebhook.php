<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentReceivedData;

class PaymentReceivedWebhook extends Webhook
{
    public PaymentReceivedData $data;
}
