<?php

namespace INXY\Payments\Merchant\Http\Requests\Dto;

use INXY\Payments\Merchant\Interfaces\Arrayable;

class Subscription implements Arrayable
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $interval;
    /**
     * @var int
     */
    private $intervalCount;

    /**
     * @param string $name
     * @param string $interval
     * @param int    $intervalCount
     */
    public function __construct($name, $interval, $intervalCount)
    {
        $this->name          = $name;
        $this->interval      = $interval;
        $this->intervalCount = $intervalCount;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name'           => $this->name,
            'interval'       => $this->interval,
            'interval_count' => $this->intervalCount
        ];
    }
}
