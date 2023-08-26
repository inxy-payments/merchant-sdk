<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Customer;
use INXY\Payments\Merchant\Webhooks\Dto\Fee;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class FeesFactory
{
    /**
     * @param stdClass $fee
     *
     * @return Fee
     */
    public static function create(stdClass $fee)
    {
        if (!property_exists($fee, 'object') || $fee->object !== ObjectName::Fee) {
            throw new InvalidArgumentException('Fee param must be object with name fee');
        }

        $feeDto = new Fee();

        $feeDto->object    = $fee->object;
        $feeDto->amount     = $fee->amount;
        $feeDto->currency = CurrenciesFactory::create($fee->currency);
        $feeDto->fiatAmount  = $fee->fiat_amount;
        $feeDto->fiatCurrencyCode  = $fee->fiat_currency_code;

        return $feeDto;
    }

}