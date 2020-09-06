<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class LastTradeForSymbol
 *
 * @package Ersindemirtas\PolygonIO\Rest\Stocks
 */
class LastTradeForSymbol extends RestResource
{
    /**
     * @param  string  $tickerSymbol
     *
     * @return array
     */
    public function get(string $tickerSymbol)
    {
        return $this->_get('/v1/last/stocks/'.$tickerSymbol);
    }
}
