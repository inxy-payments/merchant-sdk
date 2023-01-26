<?php

namespace INXY\Payments\Merchant\Http\Requests;

use InvalidArgumentException;
use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\Dto\Subscription;

class MultiCurrencySessionRequest extends Request
{
    /**
     * @var string
     */
    private $fiatCurrency;
    /**
     * @var float
     */
    private $fiatAmount;
    /**
     * @var string
     */
    private $orderName;
    /**
     * @var string|null
     */
    private $orderId;
    /**
     * @var array|null
     */
    private $cryptocurrencies;
    /**
     * @var Cryptocurrency|null
     */
    private $defaultCryptocurrency;
    /**
     * @var string|null
     */
    private $postbackUrl;
    /**
     * @var string|null
     */
    private $successUrl;
    /**
     * @var string|null
     */
    private $cancelUrl;
    /**
     * @var Customer|null
     */
    private $customer;
    /**
     * @var Subscription|null
     */
    private $subscription;

    /**
     * @param float  $fiatAmount
     * @param string $orderName
     */
    public function __construct($fiatAmount, $orderName, $fiatCurrency = FiatCurrencyCode::USD)
    {
        $this->fiatAmount       = $fiatAmount;
        $this->orderName        = $orderName;
        $this->fiatCurrency     = $fiatCurrency;
        $this->cryptocurrencies = [];
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @param array $cryptocurrencies
     */
    public function setCryptocurrencies(array $cryptocurrencies)
    {
        foreach ($cryptocurrencies as $cryptocurrency) {
            if (!($cryptocurrency instanceof Cryptocurrency)) {
                throw new InvalidArgumentException('Cryptocurrency must be instance of ' . Cryptocurrency::class);
            }

            $this->cryptocurrencies[] = $cryptocurrency;
        }
    }

    /**
     * @param string $postbackUrl
     */
    public function setPostbackUrl($postbackUrl)
    {
        $this->postbackUrl = $postbackUrl;
    }

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @param string $cancelUrl
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @param Subscription $subscription
     * @return void
     */
    public function setSubscription(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @param Cryptocurrency|null $defaultCryptocurrency
     */
    public function setDefaultCryptocurrency(Cryptocurrency $defaultCryptocurrency)
    {
        $this->defaultCryptocurrency = $defaultCryptocurrency;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'fiat_currency'          => $this->fiatCurrency,
            'fiat_amount'            => $this->fiatAmount,
            'order_name'             => $this->orderName,
            'order_id'               => $this->orderId,
            'cryptocurrencies'       => array_map(function (Cryptocurrency $cryptocurrency) { return $cryptocurrency->toArray(); }, $this->cryptocurrencies),
            'default_cryptocurrency' => $this->defaultCryptocurrency ? $this->defaultCryptocurrency->toArray() : null,
            'postback_url'           => $this->postbackUrl,
            'success_url'            => $this->successUrl,
            'cancel_url'             => $this->cancelUrl,
            'customer'               => $this->customer ? $this->customer->toArray() : null,
            'subscription'           => $this->subscription ? $this->subscription->toArray() : null,
        ];
    }
}
