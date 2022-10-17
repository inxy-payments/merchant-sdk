<?php

namespace INXY\Payments\Merchant\Http\Api\Enums;

class Route
{
    public const SessionsCreate      = '/sessions';
    public const SubscriptionsList   = '/subscriptions';
    public const SubscriptionsShow   = '/subscriptions/{id}';
    public const SubscriptionsDelete = '/subscriptions/{id}';
}
