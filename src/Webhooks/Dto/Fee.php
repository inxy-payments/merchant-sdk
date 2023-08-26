<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Fee
{
    public string   $object;
    public float    $amount;
    public Currency $currency;
    public float    $fiatAmount;
    public string   $fiatCurrencyCode;
}