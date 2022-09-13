<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class SessionsFactory
{
    /**
     * @param stdClass $session
     * @return Session
     */
    public static function create(stdClass $session)
    {
        if (!property_exists($session, 'object') || $session->object !== ObjectName::Session) {
            throw new InvalidArgumentException('Session param must be object with name session');
        }

        $sessionDto = new Session();

        $sessionDto->id               = $session->id;
        $sessionDto->object           = $session->object;
        $sessionDto->status           = $session->status;
        $sessionDto->fiatAmount       = $session->fiat_amount;
        $sessionDto->fiatCurrencyCode = $session->fiat_currency_code;
        $sessionDto->orderId          = $session->order_id;
        $sessionDto->orderName        = $session->order_name;
        $sessionDto->createdDate      = $session->created_date;

        $customer = CustomersFactory::create($session->customer);

        $sessionDto->customer = $customer;

        return $sessionDto;
    }
}
