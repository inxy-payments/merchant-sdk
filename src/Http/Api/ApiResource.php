<?php

namespace INXY\Payments\Merchant\Http\Api;

use INXY\Payments\Merchant\Http\Client;
use JsonException;
use stdClass;

class ApiResource
{
    protected const IdMask = '{id}';

    protected Client $client;

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
     * @throws JsonException
     */
    protected function getPayload($response): stdClass
    {
        return json_decode($response->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
    }
}
