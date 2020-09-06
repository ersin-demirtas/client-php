<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class DailyOpenClose
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Stocks
 */
class DailyOpenClose extends RestResource
{

    /**
     * @param  string  $tickerSymbol
     * @param  string  $date
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol, string $date)
    {
        return $this->_get('/v1/open-close/'.$tickerSymbol.'/'.$date);
    }
}
