<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

/**
 * Class SnapshotGainersLosers
 *
 * @package PolygonIO\Rest\Stocks
 */
class SnapshotGainersLosers extends RestResource
{

    /**
     * @param  string  $direction
     *
     * @return array
     */
    public function get(string $direction = 'gainers'): array
    {
        return $this->_get('/v2/snapshot/locale/us/markets/stocks/'.$direction);
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
