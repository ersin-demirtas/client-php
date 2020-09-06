<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class HistoricTrades
 *
 * @package Ersindemirtas\PolygonIO\Rest\Stocks
 */
class HistoricTrades extends RestResource
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
        return $this->_get('/v1/historic/trades/'.$tickerSymbol.'/'.$date);
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['ticks'] = array_map(function ($result) {
            return Mappers::tradeV1($result);
        }, $response['ticks']);

        return $response;
    }
}
