<?php
namespace ErsinDemirtas\PolygonIO\Rest;

use GuzzleHttp\Client;

/**
 * Class RestResource
 *
 * @package PolygonIO\Rest
 */
abstract class RestResource
{

    /**
     * @var Client
     */
    public Client $httpClient;

    /**
     * @var string
     */
    protected string $API_URL = 'https://api.polygon.io';

    /**
     * @var string
     */
    protected string $apiKey;

    /**
     * @var array
     */
    protected array $defaultParams = [];

    /**
     * @var string
     */
    protected string $route;

    /**
     * RestResource constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = new Client();
    }

    /**
     * @param  string  $route
     * @param  array  $params
     *
     * @return array
     */
    protected function _get(string $route, array $params = []): array
    {
        $enhancedParams =  array_merge(
            [
                'apiKey' => $this->apiKey,
            ],
            array_merge(
                $this->defaultParams,
                $params
            )
        );

        $route = $this->API_URL . $route;
        $response = $this->httpClient->get($route, [
            'query' => $enhancedParams
        ]);

        $bodyString = $response->getBody()->getContents();
        $json = json_decode($bodyString, true);

        return $this->mapper($json);
    }

    /**
     * @param array $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        return $response;
    }
}
