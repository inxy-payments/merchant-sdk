<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Customer;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class CustomersFactory
{
    /**
     * @param stdClass $customer
     * @return Customer
     */
    public static function create(stdClass $customer)
    {
        if (!property_exists($customer, 'object') || $customer->object !== ObjectName::Customer) {
            throw new InvalidArgumentException('Customer param must be object with name customer');
        }

        $customerDto = new Customer();

        $customerDto->id        = $customer->id;
        $customerDto->object    = $customer->object;
        $customerDto->email     = $customer->email;
        $customerDto->firstName = $customer->first_name;
        $customerDto->lastName  = $customer->last_name;

        return $customerDto;
    }
}
