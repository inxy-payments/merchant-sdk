<?php

namespace INXY\Payments\Merchant;

use INXY\Payments\Merchant\Http\Api\Api;
use INXY\Payments\Merchant\Http\Factories\ApiFactory;
use INXY\Payments\Merchant\Http\Requests\CryptoCryptoSessionRequest;
use INXY\Payments\Merchant\Http\Requests\MultiCurrencySessionRequest;
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
     * @deprecated
     */
    public function createSession(SessionRequest $request): SessionResponse
    {
        return $this->api->sessions->create($request);
    }

    /**
     * @param MultiCurrencySessionRequest $request
     * @return SessionResponse
     */
    public function createMultiCurrencySession(MultiCurrencySessionRequest $request): SessionResponse
    {
        return $this->api->sessions->createMultiCurrency($request);
    }

    /**
     * @param CryptoCryptoSessionRequest $request
     * @return SessionResponse
     */
    public function createCryptoCryptoSession(CryptoCryptoSessionRequest $request): SessionResponse
    {
        return $this->api->sessions->createCryptoCrypto($request);
    }
}
