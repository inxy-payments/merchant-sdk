<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;

class PaymentRejectedData
{
    public Session       $session;
    public PaymentIntent $paymentIntent;
    public Payment       $payment;
}
