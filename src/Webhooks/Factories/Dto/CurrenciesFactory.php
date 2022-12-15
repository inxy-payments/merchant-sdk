<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Currency;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class CurrenciesFactory
{
    /**
     * @param stdClass $currency
     * @return Currency
     */
    public static function create(stdClass $currency)
    {
        if (!property_exists($currency, 'object') || $currency->object !== ObjectName::Currency) {
            throw new InvalidArgumentException('Currency param must be object with name currency');
        }

        $currencyDto = new Currency();

        $currencyDto->id         = $currency->id;
        $currencyDto->object     = $currency->object;
        $currencyDto->code       = $currency->code;
        $currencyDto->blockchain = $currency->blockchain;
        $currencyDto->coinType   = $currency->coin_type;

        return $currencyDto;
    }
}
