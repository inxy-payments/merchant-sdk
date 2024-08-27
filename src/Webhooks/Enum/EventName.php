<?php

namespace INXY\Payments\Merchant\Webhooks\Enum;

class EventName
{
    const PaymentsInit                 = 'payments.init';
    const PaymentsExpired              = 'payments.expired';
    const PaymentsCanceled             = 'payments.canceled';
    const PaymentsWaitingConfirmations = 'payments.waiting_confirmations';
    const PaymentsReceived             = 'payments.received';
    const PaymentsFailed               = 'payments.failed';
    const PaymentsRejected             = 'payments.rejected';
    const PaymentsIllegal              = 'payments.illegal';
}
