<?php

namespace ErsinDemirtas\PolygonIOTests\Rest\Common;

use ErsinDemirtas\PolygonIOTests\TestCase;
use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;

class MappersTest extends TestCase
{
    public function testQuoteV1()
    {
        $tickData = [
            'c'  => 'a',
            'bE' => 'b',
            'aE' => 'c',
            'aP' => 'd',
            'bP' => 'e',
            'bS' => 'f',
            'aS' => 'g',
            't'  => 'h'
        ];

        $expected = [
            'condition'   => 'a',
            'bidExchange' => 'b',
            'askExchange' => 'c',
            'askPrice'    => 'd',
            'buyPrice'    => 'e',
            'bidSize'     => 'f',
            'askSize'     => 'g',
            'timestamp'   => 'h',
            'c'           => 'a',
            'bE'          => 'b',
            'aE'          => 'c',
            'aP'          => 'd',
            'bP'          => 'e',
            'bS'          => 'f',
            'aS'          => 'g',
            't'           => 'h'
        ];

        $actualData = Mappers::quoteV1($tickData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function testSnapshotQuote()
    {
        $tickData = [
            'p' => 'a',
            's' => 'b',
            'P' => 'c',
            'S' => 'd',
            't' => 'e',
        ];

        $expected = [
            'bidPrice'            => 'a',
            'bidSize'             => 'b',
            'askPrice'            => 'c',
            'askSize'             => 'd',
            'lastUpdateTimestamp' => 'e',
            'p'                   => 'a',
            's'                   => 'b',
            'P'                   => 'c',
            'S'                   => 'd',
            't'                   => 'e',
        ];

        $actualData = Mappers::snapshotQuote($tickData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function testTradeV1()
    {
        $tickData = [
            'c1' => 'a',
            'c2' => 'b',
            'c3' => 'c',
            'c4' => 'd',
            'e'  => 'e',
            'p'  => 'f',
            's'  => 'g',
            't'  => 'h',
        ];

        $expected = [
            'condition1' => 'a',
            'condition2' => 'b',
            'condition3' => 'c',
            'condition4' => 'd',
            'exchange'   => 'e',
            'price'      => 'f',
            'size'       => 'g',
            'timestamp'  => 'h',
            'c1'         => 'a',
            'c2'         => 'b',
            'c3'         => 'c',
            'c4'         => 'd',
            'e'          => 'e',
            'p'          => 'f',
            's'          => 'g',
            't'          => 'h',
        ];

        $actualData = Mappers::tradeV1($tickData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function snapshotAgg()
    {
        $snapData = [
            'c' => 'a',
            'h' => 'b',
            'l' => 'c',
            'o' => 'd',
            'v' => 'e',
        ];

        $expected = [
            'close'  => 'a',
            'high'   => 'b',
            'low'    => 'c',
            'open'   => 'd',
            'volume' => 'e',
            'c'      => 'a',
            'h'      => 'b',
            'l'      => 'c',
            'o'      => 'd',
            'v'      => 'e',
        ];

        $actualData = Mappers::snapshotAgg($snapData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function testSnapshotAggV2()
    {
        $snapData = [
            'T' => 'a',
            'v' => 'b',
            'o' => 'c',
            'c' => 'd',
            'h' => 'e',
            'l' => 'f',
            't' => 'g',
            'n' => 'h',
        ];

        $expected = [
            'tickerSymbol'  => 'a',
            'volume'        => 'b',
            'open'          => 'c',
            'close'         => 'd',
            'high'          => 'e',
            'low'           => 'f',
            'timestamp'     => 'g',
            'numberOfItems' => 'h',
            'T'             => 'a',
            'v'             => 'b',
            'o'             => 'c',
            'c'             => 'd',
            'h'             => 'e',
            'l'             => 'f',
            't'             => 'g',
            'n'             => 'h',
        ];

        $actualData = Mappers::snapshotAggV2($snapData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function testSnapshotTicker()
    {
        $snapData = [
            'day'       => [
                'c' => 'a',
                'h' => 'b',
                'l' => 'c',
                'o' => 'd',
                'v' => 'e',
            ],
            'lastTrade' => [
                'c1' => 'a',
                'c2' => 'b',
                'c3' => 'c',
                'c4' => 'd',
                'e'  => 'e',
                'p'  => 'f',
                's'  => 'g',
                't'  => 'h',
            ],
            'lastQuote' => [
                'p' => 'a',
                's' => 'b',
                'P' => 'c',
                'S' => 'd',
                't' => 'e',
            ],
            'min'       => [
                'c' => 'a',
                'h' => 'b',
                'l' => 'c',
                'o' => 'd',
                'v' => 'e',
            ],
            'prevDay'   => [
                'c' => 'a',
                'h' => 'b',
                'l' => 'c',
                'o' => 'd',
                'v' => 'e',
            ]
        ];

        $expected = [
            'day'       => [
                'close'  => 'a',
                'high'   => 'b',
                'low'    => 'c',
                'open'   => 'd',
                'volume' => 'e',
                'c'      => 'a',
                'h'      => 'b',
                'l'      => 'c',
                'o'      => 'd',
                'v'      => 'e',
            ],
            'lastTrade' => [
                'condition1' => 'a',
                'condition2' => 'b',
                'condition3' => 'c',
                'condition4' => 'd',
                'exchange'   => 'e',
                'price'      => 'f',
                'size'       => 'g',
                'timestamp'  => 'h',
                'c1'         => 'a',
                'c2'         => 'b',
                'c3'         => 'c',
                'c4'         => 'd',
                'e'          => 'e',
                'p'          => 'f',
                's'          => 'g',
                't'          => 'h',
            ],
            'lastQuote' => [
                'bidPrice'            => 'a',
                'bidSize'             => 'b',
                'askPrice'            => 'c',
                'askSize'             => 'd',
                'lastUpdateTimestamp' => 'e',
                'p'                   => 'a',
                's'                   => 'b',
                'P'                   => 'c',
                'S'                   => 'd',
                't'                   => 'e',
            ],
            'min'       => [
                'close'  => 'a',
                'high'   => 'b',
                'low'    => 'c',
                'open'   => 'd',
                'volume' => 'e',
                'c'      => 'a',
                'h'      => 'b',
                'l'      => 'c',
                'o'      => 'd',
                'v'      => 'e',
            ],
            'prevDay'   => [
                'close'  => 'a',
                'high'   => 'b',
                'low'    => 'c',
                'open'   => 'd',
                'volume' => 'e',
                'c'      => 'a',
                'h'      => 'b',
                'l'      => 'c',
                'o'      => 'd',
                'v'      => 'e',
            ]
        ];

        $actualData = Mappers::snapshotTicker($snapData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function testSnapshotCryptoTicker()
    {
        $tickData = [
            'day'       => [
                'c' => 'a',
                'h' => 'b',
                'l' => 'c',
                'o' => 'd',
                'v' => 'e',
            ],
            'lastTrade' => [
                'p' => 'a',
                's' => 'b',
                'x' => 'c',
                'c' => 'd',
                't' => 'e',
            ],
            'min'       => [
                'c' => 'a',
                'h' => 'b',
                'l' => 'c',
                'o' => 'd',
                'v' => 'e',
            ],
            'prevDay'   => [
                'c' => 'a',
                'h' => 'b',
                'l' => 'c',
                'o' => 'd',
                'v' => 'e',
            ]
        ];

        $expected = [
            'day'       => [
                'close'  => 'a',
                'high'   => 'b',
                'low'    => 'c',
                'open'   => 'd',
                'volume' => 'e',
                'c'      => 'a',
                'h'      => 'b',
                'l'      => 'c',
                'o'      => 'd',
                'v'      => 'e',
            ],
            'lastTrade' => [
                'p'          => 'a',
                's'          => 'b',
                'x'          => 'c',
                'c'          => 'd',
                't'          => 'e',
                'price'      => 'a',
                'size'       => 'b',
                'exchange'   => 'c',
                'conditions' => 'd',
                'timestamp'  => 'e'
            ],
            'min'       => [
                'close'  => 'a',
                'high'   => 'b',
                'low'    => 'c',
                'open'   => 'd',
                'volume' => 'e',
                'c'      => 'a',
                'h'      => 'b',
                'l'      => 'c',
                'o'      => 'd',
                'v'      => 'e',
            ],
            'prevDay'   => [
                'close'  => 'a',
                'high'   => 'b',
                'low'    => 'c',
                'open'   => 'd',
                'volume' => 'e',
                'c'      => 'a',
                'h'      => 'b',
                'l'      => 'c',
                'o'      => 'd',
                'v'      => 'e',
            ]
        ];

        $actualData = Mappers::snapshotCryptoTicker($tickData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function testCryptoTick()
    {
        $snapData = [
            'p' => 'a',
            's' => 'b',
            'x' => 'c',
            'c' => 'd',
            't' => 'e',
        ];

        $expected = [
            'p'          => 'a',
            's'          => 'b',
            'x'          => 'c',
            'c'          => 'd',
            't'          => 'e',
            'price'      => 'a',
            'size'       => 'b',
            'exchange'   => 'c',
            'conditions' => 'd',
            'timestamp'  => 'e'
        ];

        $actualData = Mappers::cryptoTick($snapData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }

    public function testCryptoSnapshotBookItem()
    {
        $itemData = [
            'p' => 'a'
        ];

        $expected = [
            'p'     => 'a',
            'price' => 'a',
        ];

        $actualData = Mappers::cryptoSnapshotBookItem($itemData);

        $this->assertIsArray($actualData);
        $this->assertEquals($expected, $actualData);
    }
}
