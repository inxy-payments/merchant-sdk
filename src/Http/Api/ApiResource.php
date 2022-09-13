<?php

namespace INXY\Payments\Merchant\Http\Api;

use INXY\Payments\Merchant\Http\Client;

class ApiResource
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
