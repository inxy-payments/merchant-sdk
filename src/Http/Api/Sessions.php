<?php

namespace INXY\Payments\Merchant\Http\Api;

use INXY\Payments\Merchant\Http\Api\Enums\Route;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Http\Responses\SessionResponse;

class Sessions extends ApiResource
{
    /**
     * @param SessionRequest $request
     * @return SessionResponse
     */
    public function create(SessionRequest $request)
    {
        $response = $this->client->post(Route::SessionsCreate, [
            'json' => $request->toArray()
        ]);

        $payload = $this->getPayload($response);

        return new SessionResponse($payload->data->redirect_url);
    }
}
