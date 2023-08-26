<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Fee
{
    /**
     * @var string
     */
    public $object;
    /**
     * @var float
     */
    public $amount;
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
}