<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class StockDividends
 *
 * @package PolygonIO\Rest\Reference
 */
class StockDividends extends RestResource
{
    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol)
    {
        return $this->_get('/v2/reference/dividends/'.$tickerSymbol);
    }
}
