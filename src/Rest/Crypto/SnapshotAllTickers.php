<?php
namespace PolygonIO\Rest\Crypto;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

class SnapshotAllTickers extends RestResource
{
    public function get()
    {
        return $this->_get('/v2/snapshot/locale/global/markets/crypto/tickers');
    }

    protected function mapper(array $response): array
    {
        $response['tickers'] = array_map(function ($ticker) {
            return Mappers::snapshotCryptoTicker($ticker);
        }, $response['tickers']);
        return $response;
    }
}
