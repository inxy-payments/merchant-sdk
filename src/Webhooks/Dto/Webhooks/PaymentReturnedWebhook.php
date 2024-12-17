<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentReturnedData;

class PaymentReturnedWebhook extends Webhook
{
    public PaymentReturnedData $data;
}
