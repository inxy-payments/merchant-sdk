<?php

use PHPUnit\Framework\TestCase;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Enums\CurrencyCode;

class SessionRequestOrderTest extends TestCase
{
    private static $sessionRequestExample = [
        'fiat_amount'      => 1.0,
        'order_name'       => 'Test Order',
        'order_id'         => 'test_order',
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
        'subscription'     => null
    ];

    /**
     * @return void
     */
    public function testOrderRequestCreate()
    {
        $orderAmountInUSD = 1.0;
        $orderName        = 'Test Order';
        $customer         = new Customer('testexample@mail.com', 'John', 'Doe');
        $sessionRequest   = new SessionRequest($orderAmountInUSD, $orderName);

        $sessionRequest->setOrderId('test_order');
        $sessionRequest->setCryptocurrencies([CurrencyCode::USDT, CurrencyCode::BTC]);
        $sessionRequest->setPostbackUrl('https://example.com/postback');
        $sessionRequest->setCancelUrl('https://example.com/cancel');
        $sessionRequest->setSuccessUrl('https://example.com/success');
        $sessionRequest->setCustomer($customer);

        $this->assertSame($sessionRequest->toArray(), self::$sessionRequestExample);
    }
}
