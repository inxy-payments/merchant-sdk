<?php

namespace INXY\Payments\Merchant\Webhooks\Enum;

class ObjectName
{
    public const Customer      = 'customer';
    public const Session       = 'session';
    public const PaymentIntent = 'payment_intent';
    public const Payment       = 'payment';
    public const Webhook       = 'webhook';
    public const Currency      = 'currency';
    public const Fee           = 'fee';
}
