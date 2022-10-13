<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;

class SubscriptionDeletedData
{
    /**
     * @var Subscription
     */
    public $subscription;
    /**
     * @var Session
     */
    public $session;
}
