<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class SnapshotAllTickers
 *
 * @package PolygonIO\Rest\Stocks
 */
class SnapshotAllTickers extends RestResource
{
    /**
     * @return array
     */
    public function get(): array
    {
        return $this->_get('/v2/snapshot/locale/us/markets/stocks/tickers');
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['tickers'] = array_map(function ($ticker) {
            return Mappers::snapshotTicker($ticker);
        }, $response['tickers']);

        return $response;
    }
}
