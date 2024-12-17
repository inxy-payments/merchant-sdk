<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;

class PaymentReturnedData
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
     * @var Payment
     */
    public $payment;
}
