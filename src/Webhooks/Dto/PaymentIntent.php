<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class PaymentIntent
{
    public string    $id;
    public string    $object;
    public string    $status;
    public string    $currencyCode;
    public Currency  $currency;
    public float     $amount;
    public float     $fiatAmount;
    public float     $paidAmount;
    public float     $paidFiatAmount;
    public float     $exchangeRate;
    public int       $createdDate;
    public Fee       $fees;
    public ?string   $issuedWallet;
    public ?Customer $customer = null;
    public array     $payments = [];
}
