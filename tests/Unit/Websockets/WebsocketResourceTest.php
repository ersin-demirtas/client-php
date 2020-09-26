<?php

namespace ErsinDemirtas\PolygonIOTests\Unit\Websockets;

use ErsinDemirtas\PolygonIO\Websockets\WebsocketResource;
use ErsinDemirtas\PolygonIOTests\TestCase;

class WebsocketResourceTest extends TestCase
{
    /**
     * @var WebsocketResource
     */
    private WebsocketResource $websocketResource;

    protected function setUp(): void
    {
        parent::setUp();

        $topic = 'foobar';
        $apiKey = 'API_KEY_000_111';
        $this->websocketResource = new WebsocketResource($topic, $apiKey);
    }

    /**
     * @test
     */
    public function constructorShouldSetWebsocketAndApiKeyAttributes()
    {
        $this->assertEquals('wss://socket.polygon.io:443/foobar', $this->websocketResource->SOCKET_URI);
        $this->assertEquals('API_KEY_000_111', $this->websocketResource->apiKey);
    }

    /**
     * @test
     */
    public function connectMethodShouldConnectAndSubscribe()
    {
        $this->markTestSkipped();
    }
}
