<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentIllegalData;

class PaymentIllegalWebhook extends Webhook
{
    public PaymentIllegalData $data;
}
