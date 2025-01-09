<?php

namespace INXY\Payments\Merchant\Http\Api;

use GuzzleHttp\Exception\GuzzleException;
use INXY\Payments\Merchant\Http\Api\Enums\Route;
use INXY\Payments\Merchant\Http\Requests\CryptoCryptoSessionRequest;
use INXY\Payments\Merchant\Http\Requests\MultiCurrencySessionRequest;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Http\Responses\SessionResponse;
use JsonException;

class Sessions extends ApiResource
{
    /**
     * @param SessionRequest $request
     * @return SessionResponse
     * @throws JsonException|GuzzleException
     *
     * @deprecated
     */
    public function create(SessionRequest $request): SessionResponse
    {
        $response = $this->client->post(Route::SessionsCreate, [
            'json' => $request->toArray()
        ]);

        $payload = $this->getPayload($response);

        return new SessionResponse($payload->data->redirect_url);
    }

    /**
     * @param MultiCurrencySessionRequest $request
     * @return SessionResponse
     * @throws JsonException|GuzzleException
     */
    public function createMultiCurrency(MultiCurrencySessionRequest $request): SessionResponse
    {
        $response = $this->client->post(Route::MultiCurrencySessionsCreate, [
            'json' => $request->toArray()
        ]);

        $payload = $this->getPayload($response);

        return new SessionResponse($payload->data->redirect_url);
    }

    /**
     * @param CryptoCryptoSessionRequest $request
     * @return SessionResponse
     * @throws JsonException|GuzzleException
     */
    public function createCryptoCrypto(CryptoCryptoSessionRequest $request): SessionResponse
    {
        $response = $this->client->post(Route::MultiCurrencySessionsCreate, [
            'json' => $request->toArray()
        ]);

        $payload = $this->getPayload($response);

        return new SessionResponse($payload->data->redirect_url);
    }
}
