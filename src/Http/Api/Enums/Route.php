<?php

namespace INXY\Payments\Merchant\Http\Api\Enums;

class Route
{
    const SessionsCreate      = '/sessions';
    const SubscriptionsList   = '/subscriptions';
    const SubscriptionsShow   = '/subscriptions/{id}';
    const SubscriptionsDelete = '/subscriptions/{id}';
}
