<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentRejectedData;

class PaymentRejectedWebhook extends Webhook
{
    public PaymentRejectedData $data;
}
