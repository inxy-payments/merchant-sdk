<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;


class Session
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
    public $orderId;
    /**
     * @var string
     */
    public $orderName;
    /**
     * @var Customer
     */
    public $customer;
    /**
     * @var int
     */
    public $createdDate;
}
