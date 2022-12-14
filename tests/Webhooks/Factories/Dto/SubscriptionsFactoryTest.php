<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SubscriptionsFactory;

class SubscriptionsFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testSessionCreate(): void
    {
        $subscription = SubscriptionsFactory::create($this->payload);

        $this->assertSame('sub_yJGnv5794DNqlex', $subscription->id);
        $this->assertSame(ObjectName::Subscription, $subscription->object);
        $this->assertSame('Premium', $subscription->name);
        $this->assertSame('active', $subscription->status);
        $this->assertSame('month', $subscription->interval);
        $this->assertSame(1, $subscription->intervalCount);
        $this->assertSame(1.5, $subscription->fiatAmount);
        $this->assertSame('USD', $subscription->fiatCurrencyCode);
        $this->assertSame('USDC', $subscription->currencyCode);
        $this->assertSame('USDC', $subscription->currency->code);
        $this->assertSame('ethereum', $subscription->currency->blockchain);
        $this->assertSame('erc20', $subscription->currency->coinType);
        $this->assertSame(1668297600, $subscription->nextPaymentDate);
        $this->assertSame(1665645392, $subscription->createdDate);
        $this->assertNull($subscription->deletedDate);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/entities/subscription.json';
    }
}
