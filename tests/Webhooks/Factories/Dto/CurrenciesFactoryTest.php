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
        $customer = CurrenciesFactory::create($this->payload);

        $this->assertSame('currency_OZxelV2Bg5EoAQ0', $customer->id);
        $this->assertSame(ObjectName::Currency, $customer->object);
        $this->assertSame('USDT', $customer->code);
        $this->assertSame('ethereum', $customer->blockchain);
        $this->assertSame('erc20', $customer->coinType);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/entities/currency.json';
    }
}
