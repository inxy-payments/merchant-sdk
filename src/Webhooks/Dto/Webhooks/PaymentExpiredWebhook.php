<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentExpiredData;

class PaymentExpiredWebhook extends Webhook
{
    /**
     * @var PaymentExpiredData
     */
    public $data;
}
