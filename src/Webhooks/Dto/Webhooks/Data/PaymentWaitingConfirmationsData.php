<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;

class PaymentWaitingConfirmationsData
{
    /**
     * @var Session
     */
    public $session;
    /**
     * @var Payment
     */
    public $payment;
    /**
     * @var PaymentIntent
     */
    public $paymentIntent;
}
