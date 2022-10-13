<?php

namespace INXY\Payments\Merchant\Webhooks\Enum;

class EventName
{
    const PaymentsInit                 = 'payments.init';
    const PaymentsExpired              = 'payments.expired';
    const PaymentsCanceled             = 'payments.canceled';
    const PaymentsWaitingConfirmations = 'payments.waiting_confirmations';
    const PaymentsReceived             = 'payments.received';
    const SubscriptionsCreated         = 'subscriptions.created';
    const SubscriptionsUpdated         = 'subscriptions.updated';
    const SubscriptionsDeleted         = 'subscriptions.deleted';
}
