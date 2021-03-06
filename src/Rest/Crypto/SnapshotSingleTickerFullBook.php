<?php
namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class SnapshotSingleTickerFullBook
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Crypto
 */
class SnapshotSingleTickerFullBook extends RestResource
{

    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol)
    {
        return $this->_get('/v2/snapshot/locale/global/markets/crypto/tickers/'.$tickerSymbol.'/book');
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        if (array_key_exists('asks', $response['data'])) {
            $response['data']['asks'] = array_map(function ($ask) {
                return Mappers::cryptoSnapshotBookItem($ask);
            }, $response['data']['asks']);
        }
        if (array_key_exists('bids', $response['data'])) {
            $response['data']['bids'] = array_map(function ($bid) {
                return Mappers::cryptoSnapshotBookItem($bid);
            }, $response['data']['bids']);
        }
        return $response;
    }
}
