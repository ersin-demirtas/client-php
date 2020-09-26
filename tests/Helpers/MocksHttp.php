<?php

namespace ErsinDemirtas\PolygonIOTests\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

trait MocksHttp
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
