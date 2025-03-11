<?php

namespace INXY\Payments\Merchant\Http\Responses;

use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;

class SessionStatusResponse
{
    private Session $session;
    private PaymentIntent $paymentIntent;

    /**
     * @param Session $session
     * @param PaymentIntent $paymentIntent
     */
    public function __construct(Session $session, PaymentIntent $paymentIntent)
    {
        $this->session = $session;
        $this->paymentIntent = $paymentIntent;
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    public function getPaymentIntent(): PaymentIntent
    {
        return $this->paymentIntent;
    }
}
