<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;

class PaymentFailedData
{
    /**
     * @var Session
     */
    public $session;
    /**
     * @var PaymentIntent
     */
    public $paymentIntent;
    /**
     * @var Subscription|null
     */
    public $subscription;
}
