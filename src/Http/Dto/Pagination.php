<?php

namespace INXY\Payments\Merchant\Http\Dto;

class Pagination
{
    /**
     * @var int
     */
    public $page;
    /**
     * @var int
     */
    public $perPage;
    /**
     * @var int
     */
    public $lastPage;
    /**
     * @var int
     */
    public $totalItems;
}
