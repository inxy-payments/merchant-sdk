<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\CurrenciesFactory;

class CurrenciesFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testCurrencyCreate()
    {
        $currency = CurrenciesFactory::create($this->payload);

        $this->assertSame('cur_OZxelV2Bg5EoAQ0', $currency->id);
        $this->assertSame(ObjectName::Currency, $currency->object);
        $this->assertSame('USDT', $currency->code);
        $this->assertSame('ethereum', $currency->blockchain);
        $this->assertSame('erc20', $currency->coinType);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/entities/currency.json';
    }
}
