<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;

class PaymentIllegalWebhook extends Webhook
{
    /**
     * @var PaymentIllegalData
     */
    public $data;
}
