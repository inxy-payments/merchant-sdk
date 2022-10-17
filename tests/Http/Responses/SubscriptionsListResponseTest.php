<?php

namespace INXY\Payments\Merchant\Tests\Http\Responses;

use INXY\Payments\Merchant\Http\Dto\Pagination;
use INXY\Payments\Merchant\Http\Responses\SubscriptionsListResponse;
use INXY\Payments\Merchant\Tests\FactoryTest;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;

class SubscriptionsListResponseTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testResponseCreate()
    {
        $response = SubscriptionsListResponse::createFromResponse($this->payload);

        $this->assertInstanceOf(SubscriptionsListResponse::class, $response);
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(Subscription::class, $response->getList()[0]);
        $this->assertCount(8, $response->getList());
        $this->assertSame(8, $response->getPagination()->totalItems);
    }

    /**
     * @return string
     */
    protected function payloadFilePath()
    {
        return 'tests/data/responses/subscriptions.list.json';
    }
}
