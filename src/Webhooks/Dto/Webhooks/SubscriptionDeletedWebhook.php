<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionDeletedData;

class SubscriptionDeletedWebhook extends Webhook
{
    /**
     * @var SubscriptionDeletedData
     */
    public $data;
}
