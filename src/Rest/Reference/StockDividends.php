<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class StockDividends
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Reference
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
