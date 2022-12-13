<?php

namespace INXY\Payments\Merchant\Tests\Http\Requests;

use INXY\Payments\Merchant\Enums\CurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\Dto\Subscription;
use INXY\Payments\Merchant\Http\Requests\Enums\SubscriptionIntervalName;
use PHPUnit\Framework\TestCase;
use INXY\Payments\Merchant\Enums\Blockchain;
use INXY\Payments\Merchant\Enums\CoinType;
use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\MultiCurrencySessionRequest;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;

class MultiCurrencySessionRequestSubscriptionTest extends TestCase
{
    private static $sessionRequestExample = [
        'fiat_currency'          => 'EUR',
        'fiat_amount'            => 1.0,
        'order_name'             => 'Test Subscription',
        'order_id'               => 'test_subscription',
        'cryptocurrencies'       => [
            [
                'code'       => CurrencyCode::USDT,
                'blockchain' => Blockchain::Ethereum,
                'coin_type'  => CoinType::ERC20
            ],
            [
                'code'       => CurrencyCode::USDT,
                'blockchain' => Blockchain::BinanceSmartChain,
                'coin_type'  => CoinType::BEP20
            ]
        ],
        'default_cryptocurrency' => [
            'code'       => CurrencyCode::USDT,
            'blockchain' => Blockchain::Ethereum,
            'coin_type'  => CoinType::ERC20
        ],
        'postback_url'           => 'https://example.com/postback',
        'success_url'            => 'https://example.com/success',
        'cancel_url'             => 'https://example.com/cancel',
        'customer'               => [
            'email'      => 'testexample@mail.com',
            'first_name' => 'John',
            'last_name'  => 'Doe'
        ],
        'subscription'           => [
            'name'           => 'Test premium plan',
            'interval'       => 'month',
            'interval_count' => 1
        ]
    ];

    /**
     * @return void
     */
    public function testSubscriptionRequestCreate()
    {
        $orderAmountInUSD      = 1.0;
        $orderName             = 'Test Subscription';
        $customer              = new Customer('testexample@mail.com', 'John', 'Doe');
        $sessionRequest        = new MultiCurrencySessionRequest($orderAmountInUSD, $orderName, FiatCurrencyCode::EUR);
        $subscription          = new Subscription('Test premium plan', SubscriptionIntervalName::Month, 1);
        $defaultCryptocurrency = new Cryptocurrency(CurrencyCode::USDT, Blockchain::Ethereum, CoinType::ERC20);
        $cryptocurrencies      = [];

        $cryptocurrencies[] = new Cryptocurrency(CurrencyCode::USDT, Blockchain::Ethereum, CoinType::ERC20);
        $cryptocurrencies[] = new Cryptocurrency(CurrencyCode::USDT, Blockchain::BinanceSmartChain, CoinType::BEP20);

        $sessionRequest->setOrderId('test_subscription');
        $sessionRequest->setCryptocurrencies($cryptocurrencies);
        $sessionRequest->setDefaultCryptocurrency($defaultCryptocurrency);
        $sessionRequest->setPostbackUrl('https://example.com/postback');
        $sessionRequest->setCancelUrl('https://example.com/cancel');
        $sessionRequest->setSuccessUrl('https://example.com/success');
        $sessionRequest->setCustomer($customer);
        $sessionRequest->setSubscription($subscription);

        $this->assertSame($sessionRequest->toArray(), self::$sessionRequestExample);
    }
}
