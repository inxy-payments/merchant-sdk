<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;

class PaymentFailedData
{
    public Session       $session;
    public PaymentIntent $paymentIntent;
    public ?Subscription $subscription = null;
}
