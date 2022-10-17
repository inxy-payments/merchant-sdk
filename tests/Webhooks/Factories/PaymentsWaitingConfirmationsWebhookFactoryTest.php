<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentWaitingConfirmationsData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentWaitingConfirmationsWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsWaitingConfirmationsWebhookFactory;

class PaymentsWaitingConfirmationsWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsWaitingConfirmationsWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentWaitingConfirmationsWebhook::class, $webhook);
        $this->assertSame('wh_nBpLZ5Nr35Y9P6o', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsWaitingConfirmations, $webhook->name);
        $this->assertInstanceOf(PaymentWaitingConfirmationsData::class, $webhook->data);
        $this->assertInstanceOf(Payment::class, $webhook->data->payment);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/webhooks/payments.waiting_confirmations.json';
    }
}
