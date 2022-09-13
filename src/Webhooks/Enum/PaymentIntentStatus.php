<?php

namespace INXY\Payments\Merchant\Webhooks\Enum;

class PaymentIntentStatus
{
    const WaitingPayment      = 'waiting_payment';
    const WaitingPaymentPart  = 'waiting_payment_part';
    const WaitingConfirmation = 'waiting_confirmation';
    const PartiallyPaid       = 'partially_paid';
    const Paid                = 'paid';
    const Canceled            = 'canceled';
    const Expired             = 'expired';
}
