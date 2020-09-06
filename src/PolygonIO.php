<?php

namespace ErsinDemirtas\PolygonIO;

use ErsinDemirtas\PolygonIO\Rest\Rest;
use ErsinDemirtas\PolygonIO\Websockets\Websockets;

/**
 * Class PolygonIO
 *
 * @package ErsinDemirtas\PolygonIO
 */
class PolygonIO
{

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
