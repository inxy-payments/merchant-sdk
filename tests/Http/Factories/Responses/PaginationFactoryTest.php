<?php

namespace INXY\Payments\Merchant\Tests\Http\Factories\Responses;

use INXY\Payments\Merchant\Http\Factories\Responses\PaginationFactory;
use INXY\Payments\Merchant\Tests\FactoryTest;

class PaginationFactoryTest extends FactoryTest
{
    /**
     * @return void
     */
    public function testCreatePagination(): void
    {
        $pagination = PaginationFactory::createFromResponseMeta($this->payload->meta);

        $this->assertSame(1, $pagination->page);
        $this->assertSame(1, $pagination->lastPage);
        $this->assertSame(8, $pagination->totalItems);
        $this->assertSame(50, $pagination->perPage);
    }

    /**
     * @return string
     */
    protected function payloadFilePath(): string
    {
        return 'tests/data/responses/subscriptions.list.json';
    }
}
