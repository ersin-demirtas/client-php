<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class PreviousClose
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Stocks
 */
class PreviousClose extends RestResource
{
    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array
     */
    public function get(string $tickerSymbol, array $params = []): array
    {
        return $this->_get('/v2/aggs/ticker/'.$tickerSymbol.'/prev', $params);
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['results'] = array_map(function ($result) {
            return Mappers::snapshotAggV2($result);
        }, $response['results']);

        return $response;
    }
}
