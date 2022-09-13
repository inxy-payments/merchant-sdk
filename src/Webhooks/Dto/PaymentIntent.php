<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class PaymentIntent
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $object;
    /**
     * @var string
     */
    public $status;
    /**
     * @var string
     */
    public $currencyCode;
    /**
     * @var float
     */
    public $amount;
    /**
     * @var float
     */
    public $fiatAmount;
    /**
     * @var float
     */
    public $paidAmount;
    /**
     * @var float
     */
    public $paidFiatAmount;
    /**
     * @var float
     */
    public $exchangeRate;
    /**
     * @var int
     */
    public $createdDate;
    /**
     * @var Customer
     */
    public $customer;
    /**
     * @var array
     */
    public $payments;
}
