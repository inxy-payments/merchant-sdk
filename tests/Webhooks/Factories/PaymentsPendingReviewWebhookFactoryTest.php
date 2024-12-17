<?php

namespace Webhooks\Factories;

use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentPendingReviewData;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\PaymentPendingReviewWebhook;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Enum\PaymentIntentStatus;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsPendingReviewWebhookFactory;

class PaymentsPendingReviewWebhookFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testWebhookCreate()
    {
        $webhook = PaymentsPendingReviewWebhookFactory::create($this->payload);

        $this->assertInstanceOf(PaymentPendingReviewWebhook::class, $webhook);
        $this->assertSame('wh_mKq34DEk15Jy0aX', $webhook->id);
        $this->assertSame(ObjectName::Webhook, $webhook->object);
        $this->assertSame(EventName::PaymentsPendingReview, $webhook->name);
        $this->assertSame(PaymentIntentStatus::PendingReview, $webhook->data->paymentIntent->status);
        $this->assertInstanceOf(PaymentPendingReviewData::class, $webhook->data);
        $this->assertInstanceOf(Session::class, $webhook->data->session);
        $this->assertInstanceOf(PaymentIntent::class, $webhook->data->paymentIntent);
        $this->assertInstanceOf(Payment::class, $webhook->data->payment);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/webhooks/payments.pending_review.json';
    }
}
