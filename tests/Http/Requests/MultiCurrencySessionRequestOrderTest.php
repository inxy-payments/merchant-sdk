<?php

namespace INXY\Payments\Merchant\Tests\Http\Requests;

use InvalidArgumentException;
use INXY\Payments\Merchant\Enums\CurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use PHPUnit\Framework\TestCase;
use INXY\Payments\Merchant\Enums\Blockchain;
use INXY\Payments\Merchant\Enums\CoinType;
use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\MultiCurrencySessionRequest;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;

class MultiCurrencySessionRequestOrderTest extends TestCase
{
    private static array $sessionRequestExample = [
        'fiat_currency'          => 'EUR',
        'fiat_amount'            => 1.0,
        'order_name'             => 'Test Order',
        'order_id'               => 'test_order',
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
        ]
    ];

    /**
     * @return void
     */
    public function testOrderRequestCreate(): void
    {
        $orderAmountInFiat     = 1.0;
        $orderName             = 'Test Order';
        $customer              = new Customer('testexample@mail.com', 'John', 'Doe');
        $sessionRequest        = new MultiCurrencySessionRequest($orderAmountInFiat, $orderName, FiatCurrencyCode::EUR);
        $defaultCryptocurrency = new Cryptocurrency(CurrencyCode::USDT, Blockchain::Ethereum, CoinType::ERC20);
        $cryptocurrencies      = [];

        $cryptocurrencies[] = new Cryptocurrency(CurrencyCode::USDT, Blockchain::Ethereum, CoinType::ERC20);
        $cryptocurrencies[] = new Cryptocurrency(CurrencyCode::USDT, Blockchain::BinanceSmartChain, CoinType::BEP20);

        $sessionRequest->setDefaultCryptocurrency($defaultCryptocurrency);
        $sessionRequest->setCryptocurrencies($cryptocurrencies);
        $sessionRequest->setOrderId('test_order');
        $sessionRequest->setPostbackUrl('https://example.com/postback');
        $sessionRequest->setCancelUrl('https://example.com/cancel');
        $sessionRequest->setSuccessUrl('https://example.com/success');
        $sessionRequest->setCustomer($customer);

        $this->assertSame($sessionRequest->toArray(), self::$sessionRequestExample);

        $this->expectException(InvalidArgumentException::class);

        $sessionRequest->setCryptocurrencies([CurrencyCode::USDT]);
    }
}
