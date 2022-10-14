<?php

namespace INXY\Payments\Merchant;

use INXY\Payments\Merchant\Enums\ApiUrl;
use INXY\Payments\Merchant\Enums\ApiVersion;
use INXY\Payments\Merchant\Enums\Environment;

class Config
{
    private string $url;
    private string $apiKey;
    private string $apiVersion;

    /**
     * @param string      $environment
     * @param string      $apiKey
     * @param string|null $apiVersion
     */
    public function __construct(string $environment, string $apiKey, string $apiVersion = null)
    {
        $this->url        = $environment === Environment::Production ? ApiUrl::Production : ApiUrl::Sandbox;
        $this->apiKey     = $apiKey;
        $this->apiVersion = $apiVersion ?? ApiVersion::v1;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }
}
