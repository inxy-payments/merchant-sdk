<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;


class Session
{
    public string    $id;
    public string    $object;
    public string    $status;
    public float     $fiatAmount;
    public string    $fiatCurrencyCode;
    public string    $orderName;
    public int       $createdDate;
    public ?string   $orderId = null;
    public ?Customer $customer;
}
