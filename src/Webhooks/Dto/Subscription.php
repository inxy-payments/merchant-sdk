<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Subscription
{
    public string $id;
    public string $object;
    public string $name;
    public string $status;
    public string $currencyCode;
    public float  $fiatAmount;
    public string $fiatCurrencyCode;
    public string $interval;
    public int    $intervalCount;
    public int    $nextPaymentDate;
    public int    $createdDate;
    public ?int   $deletedDate = null;
}
