<?php

namespace INXY\Payments\Merchant\Http\Requests;

use InvalidArgumentException;
use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\Dto\Subscription;

class MultiCurrencySessionRequest extends Request
{
    private string          $fiatCurrency;
    private float           $fiatAmount;
    private string          $orderName;
    private ?string         $orderId               = null;
    private array           $cryptocurrencies      = [];
    private ?Cryptocurrency $defaultCryptocurrency = null;
    private ?string         $postbackUrl           = null;
    private ?string         $successUrl            = null;
    private ?string         $cancelUrl             = null;
    private ?Customer       $customer              = null;
    private ?Subscription   $subscription          = null;

    /**
     * @param float  $fiatAmount
     * @param string $orderName
     * @param string $fiatCurrency
     */
    public function __construct(float $fiatAmount, string $orderName, string $fiatCurrency = FiatCurrencyCode::USD)
    {
        $this->fiatAmount   = $fiatAmount;
        $this->orderName    = $orderName;
        $this->fiatCurrency = $fiatCurrency;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @param array $cryptocurrencies
     */
    public function setCryptocurrencies(array $cryptocurrencies): void
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
    public function setPostbackUrl(string $postbackUrl): void
    {
        $this->postbackUrl = $postbackUrl;
    }

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl(string $successUrl): void
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @param string $cancelUrl
     */
    public function setCancelUrl(string $cancelUrl): void
    {
        $this->cancelUrl = $cancelUrl;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @param Subscription $subscription
     * @return void
     */
    public function setSubscription(Subscription $subscription): void
    {
        $this->subscription = $subscription;
    }

    /**
     * @param Cryptocurrency $defaultCryptocurrency
     */
    public function setDefaultCryptocurrency(Cryptocurrency $defaultCryptocurrency): void
    {
        $this->defaultCryptocurrency = $defaultCryptocurrency;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fiat_currency'          => $this->fiatCurrency,
            'fiat_amount'            => $this->fiatAmount,
            'order_name'             => $this->orderName,
            'order_id'               => $this->orderId,
            'cryptocurrencies'       => array_map(fn(Cryptocurrency $cryptocurrency) => $cryptocurrency->toArray(),
                $this->cryptocurrencies),
            'default_cryptocurrency' => $this->defaultCryptocurrency ? $this->defaultCryptocurrency->toArray() : null,
            'postback_url'           => $this->postbackUrl,
            'success_url'            => $this->successUrl,
            'cancel_url'             => $this->cancelUrl,
            'customer'               => $this->customer ? $this->customer->toArray() : null,
            'subscription'           => $this->subscription ? $this->subscription->toArray() : null,
        ];
    }
}
