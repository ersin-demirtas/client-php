<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\RestResource;

/**
 * Class LastQuoteForSymbol
 *
 * @package PolygonIO\rest\stocks
 */
class LastQuoteForSymbol extends RestResource {

    /**
     * @param $tickerSymbol
     *
     * @return mixed
     */
    public function get($tickerSymbol) {
        return $this->_get('/v1/last_quote/stocks/'.$tickerSymbol);
    }
}
