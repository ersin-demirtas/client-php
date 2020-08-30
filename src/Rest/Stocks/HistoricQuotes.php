<?php

namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

/**
 * Class HistoricQuotes
 *
 * @package PolygonIO\Rest\Stocks
 */
class HistoricQuotes extends RestResource
{

    /**
     * @var array
     */
    protected array $defaultParams = [
        'limit' => 100
    ];

    /**
     * @param  string  $tickerSymbol
     * @param  string  $date
     *
     * @return array
     */
    public function get(string $tickerSymbol, string $date)
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
