<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentWaitingConfirmationsData;

class PaymentWaitingConfirmationsWebhook extends Webhook
{
    /**
     * @var PaymentWaitingConfirmationsData
     */
    public $data;
}
