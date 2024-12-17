<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Payment
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
    public $status;
    /**
     * @var string
     */
    public $subStatus;
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
    public $amount;
    /**
     * @var float
     */
    public $fiatAmount;
    /**
     * @var string
     */
    public $fiatCurrencyCode;
    /**
     * @var int
     */
    public $createdDate;
    /**
     * @var int|null
     */
    public $confirmedDate;
}
