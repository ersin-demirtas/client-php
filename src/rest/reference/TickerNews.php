<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class TickerNews
 * @package PolygonIO\rest\reference
 */
class TickerNews extends RestResource {
    protected array $defaultParams
        = [
            'perPage' => 50,
            'page'    => 1,
        ];

    /**
     * @param $tickerSymbol
     * @param $params
     * @return mixed
     */
    public function get($tickerSymbol, $params = [])
    {
        return $this->_get('/v1/meta/symbols/'.$tickerSymbol.'/news', $params);
    }
}
