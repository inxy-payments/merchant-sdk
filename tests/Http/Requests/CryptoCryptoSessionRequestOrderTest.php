<?php

namespace INXY\Payments\Merchant\Tests\Http\Requests;

use INXY\Payments\Merchant\Enums\CurrencyCode;
use INXY\Payments\Merchant\Http\Requests\CryptoCryptoSessionRequest;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use PHPUnit\Framework\TestCase;
use INXY\Payments\Merchant\Enums\Blockchain;
use INXY\Payments\Merchant\Enums\CoinType;
use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;

class CryptoCryptoSessionRequestOrderTest extends TestCase
{
    private static array $sessionRequestExample = [
        'fiat_currency'          => 'EUR',
        'amount'                 => 1.0,
        'order_name'             => 'Test Order',
        'order_id'               => 'test_order',
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
        'life_time_minutes'     => 60,
    ];

    /**
     * @return void
     */
    public function testOrderRequestCreate(): void
    {
        $orderAmount           = 1.0;
        $orderName             = 'Test Order';
        $customer              = new Customer('testexample@mail.com', 'John', 'Doe');
        $defaultCryptocurrency = new Cryptocurrency(CurrencyCode::USDT, Blockchain::Ethereum, CoinType::ERC20);
        $sessionRequest        = new CryptoCryptoSessionRequest($orderAmount, $orderName,$defaultCryptocurrency, FiatCurrencyCode::EUR);

        $sessionRequest->setOrderId('test_order');
        $sessionRequest->setPostbackUrl('https://example.com/postback');
        $sessionRequest->setCancelUrl('https://example.com/cancel');
        $sessionRequest->setSuccessUrl('https://example.com/success');
        $sessionRequest->setCustomer($customer);
        $sessionRequest->setLifeTimeMinutes(60);

        $this->assertSame($sessionRequest->toArray(), self::$sessionRequestExample);
    }
}
