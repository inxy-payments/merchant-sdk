<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Refund
{
    public string $id;
    public string $object;
    public string $txHash;
    public string $recipientAddress;
    public ?int   $completedAt = null;
}
