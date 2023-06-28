<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Payment
{
    public string   $id;
    public string   $object;
    public string   $status;
    public string   $currencyCode;
    public Currency $currency;
    public float    $amount;
    public float    $fiatAmount;
    public string   $fiatCurrencyCode;
    public int      $createdDate;
    public ?int     $confirmedDate = null;
}
