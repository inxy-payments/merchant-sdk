<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\Webhooks\Factories\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentCanceledData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentCanceledWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsCanceledWebhookFactory;

class PaymentsCanceledWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsCanceledWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentCanceledWebhook::class, $webhook);
        $this->assertSame('wh_xXmV329qz2NYQMl', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsCanceled, $webhook->name);
        $this->assertInstanceOf(PaymentCanceledData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.canceled.json';
    }
}
