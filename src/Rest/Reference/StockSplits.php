<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class StockSplits
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Reference
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
