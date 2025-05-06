<?php

namespace INXY\Payments\Merchant\Tests\Webhooks\Factories\Dto;

use INXY\Payments\Merchant\Http\Responses\Factories\SessionStatusResponseFactory;
use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\PaymentIntent;
use INXY\Payments\Merchant\Webhooks\Dto\Session;

class SessionStatusResponseFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testSessionStatusResponseCreate(): void
    {
        $sessionStatusResponse = SessionStatusResponseFactory::create($this->payload);

        $this->assertInstanceOf(Session::class, $sessionStatusResponse->getSession());
        $this->assertInstanceOf(PaymentIntent::class, $sessionStatusResponse->getPaymentIntent());
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/responses/session.status.json';
    }
}
