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
    private $fiatCurrency;
    /**
     * @var float
     */
    private $amount;
    /**
     * @var string
     */
    private $orderName;
    /**
     * @var Cryptocurrency
     */
    private $defaultCryptocurrency;
    /**
     * @var string|null
     */
    private $orderId = null;
    /**
     * @var string|null
     */
    private $postbackUrl = null;
    /**
     * @var string|null
     */
    private $successUrl = null;
    /**
     * @var string|null
     */
    private $cancelUrl = null;
    /**
     * @var Customer|null
     */
    private $customer = null;

    /**
     * @var int|null
     */
    private $lifeTimeMinutes;

    /**
     * @var float|null
     */
    private $amountDeviationPercentage;

    /**
     * @param float          $amount
     * @param string         $orderName
     * @param Cryptocurrency $defaultCryptocurrency
     * @param string         $fiatCurrency
     */
    public function __construct($amount, $orderName, Cryptocurrency $defaultCryptocurrency, $fiatCurrency = FiatCurrencyCode::USD)
    {
        $this->amount                = $amount;
        $this->orderName             = $orderName;
        $this->defaultCryptocurrency = $defaultCryptocurrency;
        $this->fiatCurrency          = $fiatCurrency;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
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
     * @param int $lifeTimeMinutes
     */
    public function setLifeTimeMinutes($lifeTimeMinutes)
    {
        $this->lifeTimeMinutes = $lifeTimeMinutes;
    }

    /**
     * @param float $amountDeviationPercentage
     */
    public function setAmountDeviationPercentage($amountDeviationPercentage)
    {
        $this->amountDeviationPercentage = $amountDeviationPercentage;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'fiat_currency'               => $this->fiatCurrency,
            'amount'                      => $this->amount,
            'order_name'                  => $this->orderName,
            'order_id'                    => $this->orderId,
            'default_cryptocurrency'      => $this->defaultCryptocurrency->toArray(),
            'postback_url'                => $this->postbackUrl,
            'success_url'                 => $this->successUrl,
            'cancel_url'                  => $this->cancelUrl,
            'customer'                    => $this->customer ? $this->customer->toArray() : null,
            'life_time_minutes'           => $this->lifeTimeMinutes,
            'amount_deviation_percentage' => $this->amountDeviationPercentage,
        ];
    }
}
