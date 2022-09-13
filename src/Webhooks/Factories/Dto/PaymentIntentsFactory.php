<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class PaymentIntentsFactory
{
    /**
     * @param stdClass $paymentIntent
     * @return PaymentIntent
     */
    public static function create(stdClass $paymentIntent)
    {
        if (!property_exists($paymentIntent, 'object') || $paymentIntent->object !== ObjectName::PaymentIntent) {
            throw new InvalidArgumentException('Payment intent param must be object with name payment_intent');
        }

        $paymentIntentDto = new PaymentIntent();

        $paymentIntentDto->id             = $paymentIntent->id;
        $paymentIntentDto->object         = $paymentIntent->object;
        $paymentIntentDto->status         = $paymentIntent->status;
        $paymentIntentDto->currencyCode   = $paymentIntent->currency_code;
        $paymentIntentDto->amount         = $paymentIntent->amount;
        $paymentIntentDto->fiatAmount     = $paymentIntent->fiat_amount;
        $paymentIntentDto->paidAmount     = $paymentIntent->paid_amount;
        $paymentIntentDto->paidFiatAmount = $paymentIntent->paid_fiat_amount;
        $paymentIntentDto->exchangeRate   = $paymentIntent->exchange_rate;
        $paymentIntentDto->createdDate    = $paymentIntent->created_date;
        $paymentIntentDto->payments       = [];

        $customer = CustomersFactory::create($paymentIntent->customer);

        $paymentIntentDto->customer = $customer;

        foreach ($paymentIntent->payments as $payment) {
            $paymentIntentDto->payments[] = PaymentsFactory::create($payment);
        }

        return $paymentIntentDto;
    }
}
