<?php

namespace INXY\Payments\Merchant\Http\Requests;

use INXY\Payments\Merchant\Http\Requests\Dto\Customer;

class SessionRequest extends Request
{
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
     * @param float  $fiatAmount
     * @param string $orderName
     */
    public function __construct(float $fiatAmount, string $orderName)
    {
        $this->fiatAmount = $fiatAmount;
        $this->orderName  = $orderName;
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
        $this->cryptocurrencies = $cryptocurrencies;
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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fiat_amount'      => $this->fiatAmount,
            'order_name'       => $this->orderName,
            'order_id'         => $this->orderId,
            'cryptocurrencies' => $this->cryptocurrencies,
            'postback_url'     => $this->postbackUrl,
            'success_url'      => $this->successUrl,
            'cancel_url'       => $this->cancelUrl,
            'customer'         => $this->customer ? $this->customer->toArray() : null,
        ];
    }
}
