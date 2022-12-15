<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Subscription
{
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $object;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $status;
    /**
     * @var string
     */
    public $currencyCode;
    /**
     * @var Currency
     */
    public $currency;
    /**
     * @var float
     */
    public $fiatAmount;
    /**
     * @var string
     */
    public $fiatCurrencyCode;
    /**
     * @var string
     */
    public $interval;
    /**
     * @var int
     */
    public $intervalCount;
    /**
     * @var int
     */
    public $nextPaymentDate;
    /**
     * @var int
     */
    public $createdDate;
    /**
     * @var int|null
     */
    public $deletedDate;
}
