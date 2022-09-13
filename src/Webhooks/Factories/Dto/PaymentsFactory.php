<?php

namespace INXY\Payments\Merchant\Webhooks\Factories\Dto;

use InvalidArgumentException;
use INXY\Payments\Merchant\Webhooks\Dto\Payment;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use stdClass;

class PaymentsFactory
{
    /**
     * @param stdClass $payment
     * @return Payment
     */
    public static function create(stdClass $payment)
    {
        if (!property_exists($payment, 'object') || $payment->object !== ObjectName::Payment) {
            throw new InvalidArgumentException('Payment param must be object with name payment');
        }

        $paymentDto = new Payment();

        $paymentDto->id               = $payment->id;
        $paymentDto->object           = $payment->object;
        $paymentDto->status           = $payment->status;
        $paymentDto->currencyCode     = $payment->currency_code;
        $paymentDto->amount           = $payment->amount;
        $paymentDto->fiatAmount       = $payment->fiat_amount;
        $paymentDto->fiatCurrencyCode = $payment->fiat_currency_code;
        $paymentDto->createdDate      = $payment->created_date;

        return $paymentDto;
    }
}
