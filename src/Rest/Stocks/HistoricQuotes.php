<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\RestResource;

class HistoricQuotes extends RestResource {

    protected array $defaultParams
        = [
            'limit' => 100
        ];

    public function get($tickerSymbol, $date)
    {
        return $this->_get('/v1/historic/quotes/'.$tickerSymbol.'/'.$date);
    }

    protected function mapper(array $response): array
    {
        $response['ticks'] = array_map(function ($tick) {
            $tick['condition'] = $tick['c'];
            $tick['bidExchange'] = $tick['bE'];
            $tick['askExchange'] = $tick['aE'];
            $tick['askPrice'] = $tick['aP'];
            $tick['buyPrice'] = $tick['bP'];
            $tick['bidSize'] = $tick['bS'];
            $tick['askSize'] = $tick['aS'];
            $tick['timestamp'] = $tick['t'];
            return $tick;
        }, $response['ticks']);
        return $response;
    }
}
