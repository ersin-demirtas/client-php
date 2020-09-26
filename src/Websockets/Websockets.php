<?php
namespace ErsinDemirtas\PolygonIO\Websockets;

/**
 * Class Websockets
 *
 * @package ErsinDemirtas\PolygonIO\Websockets
 */
class Websockets
{

    /**
     * @var string
     */
    public string $apiKey;

    /**
     * Websockets constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return WebsocketResource
     */
    public function crypto()
    {
        return $this->createWebsocketResource('crypto');
    }

    /**
     * @return WebsocketResource
     */
    public function forex()
    {
        return $this->createWebsocketResource('forex');
    }

    /**
     * @return WebsocketResource
     */
    public function stocks()
    {
        return $this->createWebsocketResource('stocks');
    }

    /**
     * @param $topic
     *
     * @return WebsocketResource
     */
    public function createWebsocketResource($topic)
    {
        return new WebsocketResource('stocks', $this->apiKey);
    }
}
