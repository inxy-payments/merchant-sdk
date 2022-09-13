<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;

class PaymentExpiredData
{
    /**
     * @var Session
     */
    public $session;
    /**
     * @var Payment|null
     */
    public $payment;
    /**
     * @var PaymentIntent|null
     */
    public $paymentIntent;
}
