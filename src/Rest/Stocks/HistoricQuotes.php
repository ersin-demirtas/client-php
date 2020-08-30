<?php

namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

/**
 * Class HistoricQuotes
 *
 * @package PolygonIO\Rest\Stocks
 */
class HistoricQuotes extends RestResource {

    /**
     * @var array|int[]
     */
    protected array $defaultParams = [
        'limit' => 100
    ];

    /**
     * @param $tickerSymbol
     * @param $date
     *
     * @return array|mixed
     */
    public function get($tickerSymbol, $date)
    {
        return $this->_get('/v1/historic/quotes/'.$tickerSymbol.'/'.$date);
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['ticks'] = array_map(function ($result) {
            return Mappers::quoteV1($result);
        }, $response['ticks']);

        return $response;
    }
}
