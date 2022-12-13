<?php

namespace INXY\Payments\Merchant\Http\Api\Enums;

class Route
{
    /**
     * @deprecated
     */
    public const SessionsCreate              = '/sessions';
    public const MultiCurrencySessionsCreate = '/sessions/multi-currency';
    public const SubscriptionsList           = '/subscriptions';
    public const SubscriptionsShow           = '/subscriptions/{id}';
    public const SubscriptionsDelete         = '/subscriptions/{id}';
}
