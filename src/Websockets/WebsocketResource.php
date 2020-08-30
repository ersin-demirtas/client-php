<?php
namespace PolygonIO\Websockets;

use Amp\Websocket;

/**
 * Class WebsocketResource
 *
 * @package PolygonIO\Websockets
 */
class WebsocketResource
{
    /**
     * @var string
     */
    public string $SOCKET_URI;

    /**
     * @var string
     */
    private string $apiKey;

    /**
     * WebsocketResource constructor.
     *
     * @param  string  $topic
     * @param  string  $apiKey
     */
    public function __construct(string $topic, string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->SOCKET_URI = 'wss://socket.polygon.io:443/'.$topic;
    }

    /**
     * @param  array  $subscriptions
     * @param  callable  $onMessageCallback
     */
    public function connect(array $subscriptions, callable $onMessageCallback)
    {
        $subscriptions = implode(",", $subscriptions);

        \Amp\Loop::run(function () use ($onMessageCallback, $subscriptions) {
            /** @var Websocket\Connection $connection */
            $connection = yield Websocket\connect($this->SOCKET_URI);

            yield $connection->send('{"action":"auth", "params":"'.$this->apiKey.'"}');
            yield $connection->send(json_encode([
                "action" => "subscribe",
                "params" => $subscriptions,
            ]));

            /** @var Websocket\Message $message */
            while ($message = yield $connection->receive()) {
                $payload = yield $message->buffer();
                $onMessageCallback(json_decode($payload));
            }
        });
    }
}
