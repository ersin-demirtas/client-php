<?php
namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class SnapshotAllTickers
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Crypto
 */
class SnapshotAllTickers extends RestResource
{
    /**
     * @return array|mixed
     */
    public function get()
    {
        return $this->_get('/v2/snapshot/locale/global/markets/crypto/tickers');
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['tickers'] = array_map(function ($ticker) {
            return Mappers::snapshotCryptoTicker($ticker);
        }, $response['tickers']);

        return $response;
    }
}
