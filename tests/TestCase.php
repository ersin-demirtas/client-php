<?php

namespace ErsinDemirtas\PolygonIOTests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @param $requestsContainer
     * @param  array  $response
     *
     * @return Client
     */
    protected function getHttpMock(&$requestsContainer, array $response = [])
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode($response)),
        ]);

        $handler = HandlerStack::create($mock);

        $history = Middleware::history($requestsContainer);
        $handler->push($history);

        return new Client(['handler' => $handler]);
    }
}
