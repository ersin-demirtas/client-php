<?php
namespace PolygonIO;

use PolygonIO\Rest\Rest;
use PolygonIO\Websockets\Websockets;

class PolygonIO {

    /**
     * @var string
     */
    public string $apiKey;

    /**
     * @var Rest
     */
    public Rest $rest;

    /**
     * @var Websockets
     */
    public Websockets $websockets;

    /**
     * Polygon constructor.
     * @param $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->rest = new Rest($apiKey);
        $this->websockets = new Websockets($apiKey);
    }
}
