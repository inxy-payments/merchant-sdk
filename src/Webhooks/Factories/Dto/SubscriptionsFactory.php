<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class SubscriptionsFactory
{
    /**
     * @param stdClass $subscription
     * @return Subscription
     */
    public static function create(stdClass $subscription): Subscription
    {
        if (!property_exists($subscription, 'object') || $subscription->object !== ObjectName::Subscription) {
            throw new InvalidArgumentException('Subscription param must be object with name subscription');
        }

        $subscriptionDto = new Subscription();

        $subscriptionDto->id               = $subscription->id;
        $subscriptionDto->object           = $subscription->object;
        $subscriptionDto->name             = $subscription->name;
        $subscriptionDto->status           = $subscription->status;
        $subscriptionDto->currencyCode     = $subscription->currency_code;
        $subscriptionDto->fiatAmount       = $subscription->fiat_amount;
        $subscriptionDto->fiatCurrencyCode = $subscription->fiat_currency_code;
        $subscriptionDto->interval         = $subscription->interval;
        $subscriptionDto->intervalCount    = $subscription->interval_count;
        $subscriptionDto->nextPaymentDate  = $subscription->next_payment_date;
        $subscriptionDto->createdDate      = $subscription->created_date;
        $subscriptionDto->deletedDate      = $subscription->deleted_date;

        $currency = CurrenciesFactory::create($subscription->currency);

        $subscriptionDto->currency = $currency;

        return $subscriptionDto;
    }
}
