<?php

namespace INXY\Payments\Merchant\Webhooks\Enum;

class ObjectName
{
    const Customer      = 'customer';
    const Session       = 'session';
    const PaymentIntent = 'payment_intent';
    const Payment       = 'payment';
    const Webhook       = 'webhook';
    const Currency      = 'currency';
    const Fee           = 'fee';
}
