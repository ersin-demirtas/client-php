<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class LastQuoteForSymbol
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Stocks
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
