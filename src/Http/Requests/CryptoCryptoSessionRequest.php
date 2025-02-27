<?php

namespace INXY\Payments\Merchant\Http\Requests;

use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;

class CryptoCryptoSessionRequest extends Request
{
    /**
     * @var string
     */
    private string $fiatCurrency;
    /**
     * @var float
     */
    private float $amount;
    /**
     * @var string
     */
    private string $orderName;
    /**
     * @var Cryptocurrency
     */
    private Cryptocurrency $defaultCryptocurrency;
    /**
     * @var string|null
     */
    private ?string $orderId = null;
    /**
     * @var string|null
     */
    private ?string $postbackUrl = null;
    /**
     * @var string|null
     */
    private ?string $successUrl = null;
    /**
     * @var string|null
     */
    private ?string $cancelUrl = null;
    /**
     * @var Customer|null
     */
    private ?Customer $customer = null;

    /**
     * @var int|null
     */
    private ?int $lifeTimeMinutes;

    /**
     * @param float          $amount
     * @param string         $orderName
     * @param Cryptocurrency $defaultCryptocurrency
     * @param string         $fiatCurrency
     */
    public function __construct(float $amount, string $orderName, Cryptocurrency $defaultCryptocurrency, string $fiatCurrency = FiatCurrencyCode::USD)
    {
        $this->amount                = $amount;
        $this->orderName             = $orderName;
        $this->defaultCryptocurrency = $defaultCryptocurrency;
        $this->fiatCurrency          = $fiatCurrency;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
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
     * @param int $lifeTimeMinutes
     */
    public function setLifeTimeMinutes(int $lifeTimeMinutes): void
    {
        $this->lifeTimeMinutes = $lifeTimeMinutes;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fiat_currency'          => $this->fiatCurrency,
            'amount'                 => $this->amount,
            'order_name'             => $this->orderName,
            'order_id'               => $this->orderId,
            'default_cryptocurrency' => $this->defaultCryptocurrency->toArray(),
            'postback_url'           => $this->postbackUrl,
            'success_url'            => $this->successUrl,
            'cancel_url'             => $this->cancelUrl,
            'customer'               => $this->customer ? $this->customer->toArray() : null,
            'life_time_minutes'      => $this->lifeTimeMinutes,
        ];
    }
}
