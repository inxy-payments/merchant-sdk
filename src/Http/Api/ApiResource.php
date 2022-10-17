<?php

namespace INXY\Payments\Merchant\Http\Api;

use INXY\Payments\Merchant\Http\Client;
use stdClass;

class ApiResource
{
    const IdMask = '{id}';

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

    /**
     * @param $response
     * @return stdClass
     */
    protected function getPayload($response)
    {
        return json_decode($response->getBody()->getContents(), false);
    }
}
