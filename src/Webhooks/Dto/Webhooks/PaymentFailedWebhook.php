<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentFailedData;

class PaymentFailedWebhook extends Webhook
{
    /**
     * @var PaymentFailedData
     */
    public $data;
}
