<?php

namespace INXY\Payments\Merchant\Http\Requests;

use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\Dto\Subscription;

class SessionRequest extends Request
{
    private float         $fiatAmount;
    private string        $orderName;
    private ?string       $orderId          = null;
    private ?array        $cryptocurrencies = null;
    private ?string       $postbackUrl      = null;
    private ?string       $successUrl       = null;
    private ?string       $cancelUrl        = null;
    private ?Customer     $customer         = null;
    private ?Subscription $subscription     = null;

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
     * @param Subscription $subscription
     * @return void
     */
    public function setSubscription(Subscription $subscription): void
    {
        $this->subscription = $subscription;
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
            'subscription'     => $this->subscription ? $this->subscription->toArray() : null,
        ];
    }
}
