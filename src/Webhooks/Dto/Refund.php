<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Refund
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
    public $txHash;
    /**
     * @var string
     */
    public $recipientAddress;
    /**
     * @var int|null
     */
    public $completedAt;
}
