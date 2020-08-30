<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\RestResource;

/**
 * Class LastQuoteForSymbol
 *
 * @package PolygonIO\Rest\Stocks
 */
class LastQuoteForSymbol extends RestResource
{

    /**
     * @param  string  $tickerSymbol
     *
     * @return array
     */
    public function get(string $tickerSymbol): array
    {
        return $this->_get('/v1/last_quote/stocks/'.$tickerSymbol);
    }
}
