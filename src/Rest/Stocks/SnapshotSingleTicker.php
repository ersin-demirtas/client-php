<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class SnapshotSingleTicker
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Stocks
 */
class SnapshotSingleTicker extends RestResource
{
    /**
     * @param  string  $tickerSymbol
     *
     * @return array
     */
    public function get(string $tickerSymbol)
    {
        return $this->_get('/v2/snapshot/locale/us/markets/stocks/tickers/'.$tickerSymbol);
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['ticker'] = Mappers::snapshotTicker($response['ticker']);

        return $response;
    }
}
