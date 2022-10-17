<?php

namespace INXY\Payments\Merchant\Http\Responses;

use INXY\Payments\Merchant\Http\Factories\Responses\PaginationFactory;
use INXY\Payments\Merchant\Http\Dto\Pagination;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SubscriptionsFactory;
use stdClass;

class SubscriptionsListResponse
{
    /**
     * @var array|Subscription[]
     */
    protected $list;
    /**
     * @var Pagination
     */
    protected $pagination;

    /**
     * @param array      $list
     * @param Pagination $pagination
     */
    public function __construct(array $list, Pagination $pagination)
    {
        $this->list       = $list;
        $this->pagination = $pagination;
    }

    /**
     * @param stdClass $response
     * @return self
     */
    public static function createFromResponse(stdClass $response)
    {
        $list = [];

        foreach ($response->data as $subscription) {
            $list[] = SubscriptionsFactory::create($subscription);
        }

        $pagination = PaginationFactory::createFromResponseMeta($response->meta);

        return new self($list, $pagination);
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @return array|Subscription[]
     */
    public function getList()
    {
        return $this->list;
    }
}
