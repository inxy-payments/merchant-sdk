<?php

namespace INXY\Payments\Merchant\Http\Api;

use INXY\Payments\Merchant\Http\Api\Enums\Route;
use INXY\Payments\Merchant\Http\Api\Enums\StatusCode;
use INXY\Payments\Merchant\Http\Responses\SubscriptionsListResponse;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SubscriptionsFactory;

class Subscriptions extends ApiResource
{
    const FirstPage = 1;

    /**
     * @param $page
     * @return SubscriptionsListResponse
     */
    public function getList($page = self::FirstPage)
    {
        $response = $this->client->get(Route::SubscriptionsList, [
            'query' => [
                'page' => $page
            ]
        ]);

        $payload = $this->getPayload($response);

        return SubscriptionsListResponse::createFromResponse($payload);
    }

    /**
     * @param $id
     * @return Subscription
     */
    public function show($id)
    {
        $route    = str_replace(self::IdMask, '', Route::SubscriptionsShow);
        $response = $this->client->get($route);
        $payload  = $this->getPayload($response);

        return SubscriptionsFactory::create($payload->data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $route    = str_replace(self::IdMask, '', Route::SubscriptionsDelete);
        $response = $this->client->delete($route);

        return $response->getStatusCode() === StatusCode::NoContent;
    }
}
