<?php
namespace PolygonIO\Rest\Crypto;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

/**
 * Class SnapshotSingleTicker
 *
 * @package PolygonIO\Rest\Crypto
 */
class SnapshotSingleTicker extends RestResource
{
    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol)
    {
        return $this->_get('/v2/snapshot/locale/global/markets/crypto/tickers/'.$tickerSymbol);
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['ticker'] = Mappers::snapshotCryptoTicker($response['ticker']);
        return $response;
    }
}
