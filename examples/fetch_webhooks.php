<?php

require_once('vendor/autoload.php');

use INXY\Payments\Merchant\Webhooks\Factories\PaymentsReturnedWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsFailedWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsPendingReviewWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsInitWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsRejectedWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsSeizedWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Validator;
use INXY\Payments\Merchant\Webhooks\Enum\EventName;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsWaitingConfirmationsWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsReceivedWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsCanceledWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Factories\PaymentsExpiredWebhookFactory;
use INXY\Payments\Merchant\Webhooks\Enum\PaymentIntentStatus;

function handleWebhooks($request) {
    $secretKey  = 'Your secret key here';
    $validator  = new Validator($secretKey);
    $signedHash = $request->headers['X-INXY-Payments-Signature'];

    $payload = $request->getBody()->getContents(); // fetch json from your request

    if (!$validator->isValid($payload, $signedHash)) {
        throw new BadRequestException('No valid webhook');
    }

    $data = json_decode($payload, false);

    switch ($data->name) {
        case EventName::PaymentsInit:
            handlePaymentsInitWebhook($data);
            break;
        case EventName::PaymentsWaitingConfirmations:
            handlePaymentsWaitingConfirmationsWebhook($data);
            break;
        case EventName::PaymentsReceived:
            handlePaymentsReceivedWebhook($data);
            break;
        case EventName::PaymentsCanceled:
            handlePaymentsCanceledWebhook($data);
            break;
        case EventName::PaymentsExpired:
            handlePaymentsExpiredWebhook($data);
            break;
        case EventName::PaymentsFailed:
            handlePaymentsFailedWebhook($data);
            break;
        case EventName::PaymentsRejected:
            handlePaymentsRejectedWebhook($data);
            break;
        case EventName::PaymentsPendingReview:
            handlePaymentsPendingReviewWebhook($data);
            break;
        case EventName::PaymentsSeized:
            handlePaymentsSeizedWebhook($data);
            break;
        case EventName::PaymentsReturned:
            handlePaymentsReturnedWebhook($data);
            break;
        default:
            throw new InvalidArgumentException('Undefined webhook name');
    }
}

function handlePaymentsInitWebhook(stdClass $webhookData) {
    $webhook = PaymentsInitWebhookFactory::create($webhookData);

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::WaitingPayment) {
        /** Waiting first payment */
    }

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::WaitingPaymentPart) {
        /** Waiting part payment after partially paid */
    }


    /** Your code here */
}

function handlePaymentsWaitingConfirmationsWebhook(stdClass $webhookData) {
    $webhook = PaymentsWaitingConfirmationsWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsReceivedWebhook(stdClass $webhookData) {
    $webhook = PaymentsReceivedWebhookFactory::create($webhookData);

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::Paid) {
        /** Success payment code */
    }

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::PartiallyPaid) {
        /** Partially paid actions */
    }

    /** Your code here */
}

function handlePaymentsCanceledWebhook(stdClass $webhookData) {
    $webhook = PaymentsCanceledWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsExpiredWebhook(stdClass $webhookData) {
    $webhook = PaymentsExpiredWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsFailedWebhook(stdClass $webhookData) {
    $webhook = PaymentsFailedWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsRejectedWebhook(stdClass $webhookData) {
    $webhook = PaymentsRejectedWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsPendingReviewWebhook(stdClass $webhookData) {
    $webhook = PaymentsPendingReviewWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsReturnedWebhook(stdClass $webhookData) {
    $webhook = PaymentsReturnedWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsSeizedWebhook(stdClass $webhookData) {
    $webhook = PaymentsSeizedWebhookFactory::create($webhookData);

    /** Your code here */
}
