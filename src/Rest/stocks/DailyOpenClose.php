<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\RestResource;

/**
 * Class DailyOpenClose
 *
 * @package PolygonIO\rest\stocks
 */
class DailyOpenClose extends RestResource {

    /**
     * @param $tickerSymbol
     * @param $date
     *
     * @return mixed
     */
    public function get($tickerSymbol, $date)
    {
        return $this->_get('/v1/open-close/'.$tickerSymbol.'/'.$date);
    }
}
