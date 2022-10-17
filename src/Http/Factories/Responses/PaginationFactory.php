<?php

namespace INXY\Payments\Merchant\Http\Factories\Responses;

use INXY\Payments\Merchant\Http\Dto\Pagination;
use stdClass;

class PaginationFactory
{
    /**
     * @param stdClass $meta
     * @return Pagination
     */
    public static function createFromResponseMeta(stdClass $meta)
    {
        $pagination = new Pagination();

        $pagination->page       = $meta->current_page;
        $pagination->perPage    = $meta->per_page;
        $pagination->lastPage   = $meta->last_page;
        $pagination->totalItems = $meta->total;

        return $pagination;
    }
}
