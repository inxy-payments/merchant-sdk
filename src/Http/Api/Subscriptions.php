<?php

namespace INXY\Payments\Merchant\Http\Api;

use GuzzleHttp\Exception\GuzzleException;
use INXY\Payments\Merchant\Http\Api\Enums\Route;
use INXY\Payments\Merchant\Http\Api\Enums\StatusCode;
use INXY\Payments\Merchant\Http\Responses\SubscriptionsListResponse;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;
use INXY\Payments\Merchant\Webhooks\Factories\Dto\SubscriptionsFactory;
use JsonException;

class Subscriptions extends ApiResource
{
    private const FirstPage = 1;

    /**
     * @param int $page
     * @return SubscriptionsListResponse
     * @throws JsonException|GuzzleException
     */
    public function getList(int $page = self::FirstPage): SubscriptionsListResponse
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
     * @param int $id
     * @return Subscription
     * @throws JsonException|GuzzleException
     */
    public function show(int $id): Subscription
    {
        $route    = str_replace(self::IdMask, $id, Route::SubscriptionsShow);
        $response = $this->client->get($route);
        $payload  = $this->getPayload($response);

        return SubscriptionsFactory::create($payload->data);
    }

    /**
     * @param string $id
     * @return bool
     * @throws GuzzleException
     */
    public function delete(string $id): bool
    {
        $route    = str_replace(self::IdMask, $id, Route::SubscriptionsDelete);
        $response = $this->client->delete($route);

        return $response->getStatusCode() === StatusCode::NoContent;
    }
}
