<?php

namespace INXY\Payments\Merchant\Http\Api;

use INXY\Payments\Merchant\Http\Client;

class Api
{
    /**
     * @var Sessions
     */
    public $sessions;
    /**
     * @var Subscriptions
     */
    public $subscriptions;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->sessions      = new Sessions($client);
        $this->subscriptions = new Subscriptions($client);
    }
}
