<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionUpdatedData;

class SubscriptionUpdatedWebhook extends Webhook
{
    /**
     * @var SubscriptionUpdatedData
     */
    public $data;
}
