<?php
namespace PolygonIO\Websockets;

/**
 * Class Websockets
 *
 * @package PolygonIO\websockets
 */
class Websockets
{

    /**
     * @var WebsocketResource
     */
    public WebsocketResource $stocks;

    /**
     * @var WebsocketResource
     */
    public WebsocketResource $crypto;

    /**
     * @var WebsocketResource
     */
    public WebsocketResource $forex;

    /**
     * Websockets constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->crypto = new WebsocketResource('crypto', $apiKey);
        $this->forex = new WebsocketResource('forex', $apiKey);
        $this->stocks = new WebsocketResource('stocks', $apiKey);
    }
}
