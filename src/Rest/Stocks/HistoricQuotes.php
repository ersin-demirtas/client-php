<?php

namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class HistoricQuotes
 *
 * @package Ersindemirtas\PolygonIO\Rest\Stocks
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
