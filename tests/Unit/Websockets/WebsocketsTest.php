<?php

namespace ErsinDemirtas\PolygonIOTests\Unit\Websockets;

use ErsinDemirtas\PolygonIO\Websockets\WebsocketResource;
use ErsinDemirtas\PolygonIO\Websockets\Websockets;
use ErsinDemirtas\PolygonIOTests\TestCase;

class WebsocketsTest extends TestCase
{
    /**
     * @var Websockets
     */
    private Websockets $websockets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->websockets = new Websockets('API_KEY_123_312');
    }

    /**
     * Websockets constructor should set apiKey attribute.
     *
     * @test
     */
    public function constructorShouldSetApiKey()
    {
        $this->assertEquals('API_KEY_123_312', $this->websockets->apiKey);
    }

    /**
     * crypto() method should return an instance of  WebSocketResource.
     *
     * @test
     */
    public function cryptoShouldReturnWebsocketResource()
    {
        $crypto = $this->websockets->crypto();

        $this->assertInstanceOf(WebsocketResource::class, $crypto);
    }

    /**
     * forex() method should return an instance of  WebSocketResource.
     *
     * @test
     */
    public function forexShouldReturnWebsocketResource()
    {
        $forex = $this->websockets->forex();

        $this->assertInstanceOf(WebsocketResource::class, $forex);
    }

    /**
     * stocks() method should return an instance of  WebSocketResource.
     *
     * @test
     */
    public function stocksShouldReturnWebsocketResource()
    {
        $stocks = $this->websockets->stocks();

        $this->assertInstanceOf(WebsocketResource::class, $stocks);
    }
}
