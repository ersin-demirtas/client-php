<?php

namespace ErsinDemirtas\PolygonIOTests\Unit;

use ErsinDemirtas\PolygonIO\Client;
use ErsinDemirtas\PolygonIO\Rest\Rest;
use ErsinDemirtas\PolygonIO\Websockets\Websockets;
use ErsinDemirtas\PolygonIOTests\TestCase;

/**
 * Class ClientTest
 *
 * @package ErsinDemirtas\PolygonIOTests\Unit
 */
class ClientTest extends TestCase
{

    /**
     * @var Client
     */
    private Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Client('API_KEY');
    }

    /**
     * websockets() method should return instance of Websockets class.
     *
     * @test
     */
    public function websocketMethodShouldReturnWebsocketsInstance()
    {
        $this->assertInstanceOf(Websockets::class, $this->client->websockets());
    }

    /**
     * rest() method should return instance of Rest class.
     *
     * @test
     */
    public function restMethodShouldReturnRestInstance()
    {
        $this->assertInstanceOf(Rest::class, $this->client->rest());
    }
}
