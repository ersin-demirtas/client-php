<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class StockSplits
 *
 * @package PolygonIO\Rest\Reference
 */
class StockSplits extends RestResource
{
    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol)
    {
        return $this->_get('/v2/reference/splits/'.$tickerSymbol);
    }
}
