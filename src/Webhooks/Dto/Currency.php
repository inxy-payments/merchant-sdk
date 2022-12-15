<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Currency
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
    public $code;
    /**
     * @var string
     */
    public $blockchain;
    /**
     * @var string
     */
    public $coinType;
}
