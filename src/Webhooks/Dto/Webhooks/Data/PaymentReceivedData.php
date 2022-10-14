<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;

class PaymentReceivedData
{
    public Payment       $payment;
    public Session       $session;
    public PaymentIntent $paymentIntent;
    public ?Subscription $subscription = null;
}
