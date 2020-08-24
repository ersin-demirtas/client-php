<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\RestResource;

class HistoricTrades extends RestResource {

    protected array $defaultParams
        = [
            'limit' => 100
        ];

    public function get($tickerSymbol, $date)
    {
        return $this->_get('/v1/historic/trades/'.$tickerSymbol.'/'.$date);
    }

    protected function mapper(array $response): array
    {
        $response['ticks'] = array_map(function ($tick) {
            $tick['condition1'] = $tick['c1'];
            $tick['condition2'] = $tick['c2'];
            $tick['condition3'] = $tick['c3'];
            $tick['condition4'] = $tick['c4'];
            $tick['exchange'] = $tick['e'];
            $tick['price'] = $tick['p'];
            $tick['size'] = $tick['s'];
            $tick['timestamp'] = $tick['t'];
            return $tick;
        }, $response['ticks']);
        return $response;
    }
}
