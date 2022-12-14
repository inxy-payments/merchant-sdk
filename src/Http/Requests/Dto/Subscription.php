<?php

namespace INXY\Payments\Merchant\Http\Requests\Dto;

use INXY\Payments\Merchant\Interfaces\Arrayable;

class Subscription implements Arrayable
{
    private string $name;
    private string $interval;
    private int    $intervalCount;

    /**
     * @param string $name
     * @param string $interval
     * @param int    $intervalCount
     */
    public function __construct(string $name, string $interval, int $intervalCount)
    {
        $this->name          = $name;
        $this->interval      = $interval;
        $this->intervalCount = $intervalCount;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'           => $this->name,
            'interval'       => $this->interval,
            'interval_count' => $this->intervalCount
        ];
    }
}
