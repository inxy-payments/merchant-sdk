<?php

namespace INXY\Payments\Merchant\Http\Responses\Factories;

use InvalidArgumentException;
use INXY\Payments\Merchant\Http\Responses\SessionStatusResponse;
use INXY\Payments\Merchant\Webhooks\Enum\ObjectName;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\PaymentIntentsFactory;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SessionsFactory;
use stdClass;

class SessionStatusResponseFactory
{
    /**
     * @param stdClass $response
     * @return SessionStatusResponse
     */
    public static function create(stdClass $response): SessionStatusResponse
    {
        if (!property_exists($response, 'data')) {
            throw new InvalidArgumentException('Response body must contain an object with name data');
        }

        if (!property_exists($response->data, ObjectName::Session)) {
            throw new InvalidArgumentException('Response data must contain an object with name ' . ObjectName::Session);
        }

        if (!property_exists($response->data, ObjectName::PaymentIntent)) {
            throw new InvalidArgumentException('Response data must contain an object with name ' . ObjectName::PaymentIntent);
        }

        $session       = SessionsFactory::create($response->data->session);
        $paymentIntent = PaymentIntentsFactory::create($response->data->payment_intent);

        return new SessionStatusResponse($session, $paymentIntent);
    }
}
