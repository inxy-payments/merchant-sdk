<?php

namespace INXY\Payments\Merchant\Http\Factories;

use INXY\Payments\Merchant\Config;
use INXY\Payments\Merchant\Http\Api\Api;
use INXY\Payments\Merchant\Http\Client;

class ApiFactory
{
    /**
     * @param Config $config
     * @return Api
     */
    public static function createApi(Config $config)
    {
        $client = new Client($config->getUrl(), $config->getApiKey(), $config->getApiVersion());

        return new Api($client);
    }
}
