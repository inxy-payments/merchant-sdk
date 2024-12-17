<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentSeizedData;

class PaymentSeizedWebhook extends Webhook
{
    /**
     * @var PaymentSeizedData
     */
    public $data;
}
