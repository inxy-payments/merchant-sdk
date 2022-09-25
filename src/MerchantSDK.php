<?php

namespace INXY\Payments\Merchant;

use GuzzleHttp\Exception\GuzzleException;
use INXY\Payments\Merchant\Http\Api\Api;
use INXY\Payments\Merchant\Http\Factories\ApiFactory;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Http\Responses\SessionResponse;

class MerchantSDK
{
    /**
     * @var Api
     */
    private $api;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->api = ApiFactory::createApi($config);
    }

    /**
     * @param SessionRequest $request
     * @return SessionResponse
     * @throws GuzzleException
     */
    public function createSession(SessionRequest $request): SessionResponse
    {
        return $this->api->sessions->create($request);
    }
}
