<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Refund;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class RefundsFactory
{
    /**
     * @param stdClass $refund
     *
     * @return Refund
     */
    public static function create(stdClass $refund)
    {
        if (!property_exists($refund, 'object') || $refund->object !== ObjectName::Refund) {
            throw new InvalidArgumentException('Refund param must be object with name refund');
        }

        $refundDto = new Refund();

        $refundDto->id               = $refund->id;
        $refundDto->object           = $refund->object;
        $refundDto->txHash           = $refund->tx_hash;
        $refundDto->recipientAddress = $refund->recipient_address;
        $refundDto->completedAt      = $refund->completed_at;

        return $refundDto;
    }
}
