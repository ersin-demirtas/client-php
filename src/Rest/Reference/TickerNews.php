<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class TickerNews
 *
 * @package PolygonIO\Rest\Reference
 */
class TickerNews extends RestResource
{
    /**
     * @var array|int[]
     */
    protected array $defaultParams
        = [
            'perPage' => 50,
            'page'    => 1,
        ];

    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol, array $params = [])
    {
        return $this->_get('/v1/meta/symbols/'.$tickerSymbol.'/news', $params);
    }
}
