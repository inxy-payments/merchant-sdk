<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentInitData;

class PaymentInitWebhook extends Webhook
{
    /**
     * @var PaymentInitData
     */
    public $data;
}
