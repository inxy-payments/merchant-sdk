<?php

namespace INXY\Payments\Merchant\Http\Api\Enums;

class Route
{
    /**
     * @deprecated
     */
    const SessionsCreate              = '/sessions';
    const MultiCurrencySessionsCreate = '/sessions/multi-currency';
    const SubscriptionsList           = '/subscriptions';
    const SubscriptionsShow           = '/subscriptions/{id}';
    const SubscriptionsDelete         = '/subscriptions/{id}';
}
