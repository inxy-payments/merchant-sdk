<?php

namespace INXY\Payments\Merchant\Webhooks\Enum;

class EventName
{
    public const PaymentsInit                 = 'payments.init';
    public const PaymentsExpired              = 'payments.expired';
    public const PaymentsCanceled             = 'payments.canceled';
    public const PaymentsWaitingConfirmations = 'payments.waiting_confirmations';
    public const PaymentsReceived             = 'payments.received';
    public const PaymentsFailed               = 'payments.failed';
    public const PaymentsRejected             = 'payments.rejected';
    public const PaymentsPendingReview        = 'payments.pending_review';
    public const PaymentsSeized               = 'payments.seized';
    public const PaymentsReturned             = 'payments.returned';
}
