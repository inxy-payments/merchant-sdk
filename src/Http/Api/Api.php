<?php

namespace INXY\Payments\Merchant\Http\Api;

use INXY\Payments\Merchant\Http\Client;

class Api
{
    public Sessions $sessions;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->sessions = new Sessions($client);
    }
}
