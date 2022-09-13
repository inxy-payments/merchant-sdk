<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data;

use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;

class PaymentCanceledData
{
    /**
     * @var Session
     */
    public $session;
    /**
     * @var PaymentIntent
     */
    public $paymentIntent;
}
