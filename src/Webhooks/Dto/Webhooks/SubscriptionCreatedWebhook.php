<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\SubscriptionCreatedData;

class SubscriptionCreatedWebhook extends Webhook
{
    public SubscriptionCreatedData $data;
}
