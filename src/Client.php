<?php

namespace ErsinDemirtas\PolygonIO;

use ErsinDemirtas\PolygonIO\Rest\Rest;
use ErsinDemirtas\PolygonIO\Websockets\Websockets;

/**
 * Class PolygonIO
 *
 * @package ErsinDemirtas\PolygonIO
 */
class Client
{

    /**
     * @var string
     */
    public string $apiKey;

    /**
     * Polygon constructor.
     * @param $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return Rest
     */
    public function rest()
    {
        return new Rest($this->apiKey);
    }

    /**
     * @return Websockets
     */
    public function websockets()
    {
        return new Websockets($this->apiKey);
    }
}
