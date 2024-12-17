<?php

namespace INXY\Payments\Merchant\Webhooks\Dto\Webhooks;

use INXY\Payments\Merchant\Webhooks\Dto\Webhook;
use INXY\Payments\Merchant\Webhooks\Dto\Webhooks\Data\PaymentPendingReviewData;

class PaymentPendingReviewWebhook extends Webhook
{
    /**
     * @var PaymentPendingReviewData
     */
    public $data;
}