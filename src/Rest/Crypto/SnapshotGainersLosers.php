<?php
namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class SnapshotGainersLosers
 *
 * @package PolygonIO\Rest\Crypto
 */
class SnapshotGainersLosers extends RestResource
{

    /**
     * @param  string  $direction
     *
     * @return array|mixed
     */
    public function get(string $direction = 'gainers')
    {
        return $this->_get('/v2/snapshot/locale/global/markets/crypto/'.$direction);
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
