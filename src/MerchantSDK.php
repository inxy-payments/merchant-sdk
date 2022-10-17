<?php

namespace INXY\Payments\Merchant;

use GuzzleHttp\Exception\GuzzleException;
use INXY\Payments\Merchant\Http\Api\Api;
use INXY\Payments\Merchant\Http\Factories\ApiFactory;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Http\Responses\SessionResponse;
use JsonException;
use INXY\Payments\Merchant\Http\Responses\SubscriptionsListResponse;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;

class MerchantSDK
{
    private Api $api;

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
     * @throws JsonException|GuzzleException
     */
    public function createSession(SessionRequest $request): SessionResponse
    {
        return $this->api->sessions->create($request);
    }

    /**
     * @param int|null $page
     * @return SubscriptionsListResponse
     * @throws JsonException|GuzzleException
     */
    public function subscriptionsList(?int $page = null): SubscriptionsListResponse
    {
        return $this->api->subscriptions->getList($page);
    }

    /**
     * @param string $id
     * @return Subscription
     * @throws JsonException|GuzzleException
     */
    public function showSubscription(string $id): Subscription
    {
        return $this->api->subscriptions->show($id);
    }

    /**
     * @param string $id
     * @return bool
     * @throws JsonException|GuzzleException
     */
    public function deleteSubscription(string $id): bool
    {
        return $this->api->subscriptions->delete($id);
    }
}
