<?php

namespace INXY\Payments\Merchant;

use INXY\Payments\Merchant\Http\Api\Api;
use INXY\Payments\Merchant\Http\Factories\ApiFactory;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Http\Responses\SessionResponse;
use INXY\Payments\Merchant\Http\Responses\SubscriptionsListResponse;
use INXY\Payments\Merchant\Webhooks\Dto\Subscription;

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
     */
    public function createSession(SessionRequest $request): SessionResponse
    {
        return $this->api->sessions->create($request);
    }

    /**
     * @param int|null $page
     * @return SubscriptionsListResponse
     */
    public function subscriptionsList($page = null)
    {
        return $this->api->subscriptions->getList($page);
    }

    /**
     * @param string $id
     * @return Subscription
     */
    public function showSubscription($id)
    {
        return $this->api->subscriptions->show($id);
    }

    /**
     * @param string $id
     * @return bool
     */
    public function deleteSubscription($id)
    {
        return $this->api->subscriptions->delete($id);
    }
}
