<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

class SnapshotGainersLosers extends RestResource
{
    public function get($direction = 'gainers')
    {
        return $this->_get('/v2/snapshot/locale/us/markets/stocks/'.$direction);
    }

    protected function mapper(array $response): array
    {
        $response['tickers'] = array_map(function ($ticker) {
            return Mappers::snapshotTicker($ticker);
        }, $response['tickers']);
        return $response;
    }
}
