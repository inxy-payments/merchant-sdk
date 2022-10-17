<?php

namespace INXY\Payments\Merchant\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class Client extends GuzzleClient
{
    private const ApiPrefix = 'api/';

    /**
     * @var string
     */
    private string $apiVersion;

    /**
     * @param string $url
     * @param string $apiToken
     * @param string $apiVersion
     */
    public function __construct(string $url, string $apiToken, string $apiVersion)
    {
        $this->apiVersion = $apiVersion;

        $config['base_uri'] = $url;
        $config['headers']  = [
            'Authorization' => 'Bearer ' . $apiToken,
            'Accept'        => 'application/json'
        ];

        parent::__construct($config);
    }

    /**
     * @param UriInterface|string $uri
     * @param array               $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post($uri, array $options = []): ResponseInterface
    {
        return parent::post(self::ApiPrefix . $this->apiVersion . $uri, $options);
    }

    /**
     * @param UriInterface|string $uri
     * @param array               $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function get($uri, array $options = []): ResponseInterface
    {
        return parent::get(self::ApiPrefix . $this->apiVersion . $uri, $options);
    }

    /**
     * @param UriInterface|string $uri
     * @param array               $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function delete($uri, array $options = []): ResponseInterface
    {
        return parent::delete(self::ApiPrefix . $this->apiVersion . $uri, $options);
    }
}
