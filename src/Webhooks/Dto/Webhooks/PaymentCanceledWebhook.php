<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentCanceledData;

class PaymentCanceledWebhook extends Webhook
{
    /**
     * @var PaymentCanceledData
     */
    public $data;
}
