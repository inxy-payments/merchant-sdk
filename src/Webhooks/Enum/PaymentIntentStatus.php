<?php

namespace INXY\Payments\Merchant\Webhooks\Enum;

class PaymentIntentStatus
{
    public const WaitingPayment      = 'waiting_payment';
    public const WaitingPaymentPart  = 'waiting_payment_part';
    public const WaitingConfirmation = 'waiting_confirmation';
    public const PartiallyPaid       = 'partially_paid';
    public const Paid                = 'paid';
    public const Canceled            = 'canceled';
    public const Expired             = 'expired';
}
