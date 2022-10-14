<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentInitData;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsInitWebhookFactory;

class PaymentsInitWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate(): void
    {
        $webhook = PaymentsInitWebhookFactory::create($this->payload);

        $this->assertSame('wh_nBpLZ5Nr35Y9P6o', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsInit, $webhook->name);
        $this->assertInstanceOf(PaymentInitData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/webhooks/payments.init.json';
    }
}
