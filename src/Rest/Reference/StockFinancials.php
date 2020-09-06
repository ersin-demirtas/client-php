<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class StockFinancials
 *
 * @package PolygonIO\Rest\Reference
 */
class StockFinancials extends RestResource
{
    /**
     * @var array|int[]
     */
    protected array $defaultParams = [
        'limit' => 5,
    ];

    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol, array $params = [])
    {
        return $this->_get('/v2/reference/financials/'.$tickerSymbol, $params);
    }
}
