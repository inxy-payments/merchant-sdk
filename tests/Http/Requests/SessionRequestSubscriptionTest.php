<?php

namespace INXY\Payments\Merchant\Tests\Http\Requests;

use PHPUnit\Framework\TestCase;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Enums\CurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Subscription;
use INXY\Payments\Merchant\Http\Requests\Enums\SubscriptionIntervalName;

/**
 * @deprecated
 */
class SessionRequestSubscriptionTest extends TestCase
{
    private static array $sessionRequestExample = [
        'fiat_amount'      => 1.0,
        'order_name'       => 'Test Subscription',
        'order_id'         => 'test_subscription',
        'cryptocurrencies' => [
            CurrencyCode::USDT,
            CurrencyCode::BTC
        ],
        'postback_url'     => 'https://example.com/postback',
        'success_url'      => 'https://example.com/success',
        'cancel_url'       => 'https://example.com/cancel',
        'customer'         => [
            'email'      => 'testexample@mail.com',
            'first_name' => 'John',
            'last_name'  => 'Doe'
        ],
        'subscription'     => [
            'name'           => 'Test premium plan',
            'interval'       => 'month',
            'interval_count' => 1
        ]
    ];

    /**
     * @return void
     */
    public function testSubscriptionRequestCreate(): void
    {
        $orderAmountInUSD = 1.0;
        $orderName        = 'Test Subscription';
        $customer         = new Customer('testexample@mail.com', 'John', 'Doe');
        $sessionRequest   = new SessionRequest($orderAmountInUSD, $orderName);
        $subscription     = new Subscription('Test premium plan', SubscriptionIntervalName::Month, 1);

        $sessionRequest->setOrderId('test_subscription');
        $sessionRequest->setCryptocurrencies([CurrencyCode::USDT, CurrencyCode::BTC]);
        $sessionRequest->setPostbackUrl('https://example.com/postback');
        $sessionRequest->setCancelUrl('https://example.com/cancel');
        $sessionRequest->setSuccessUrl('https://example.com/success');
        $sessionRequest->setCustomer($customer);
        $sessionRequest->setSubscription($subscription);

        $this->assertSame($sessionRequest->toArray(), self::$sessionRequestExample);
    }
}
