<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

class PreviousClose extends RestResource {
    public function get($tickerSymbol, $params = [])
    {
        return $this->_get('/v2/aggs/ticker/'.$tickerSymbol.'/prev', $params);
    }

    protected function mapper(array $response): array
    {
        $response['results'] = array_map(function ($result) {
            return Mappers::snapshotAggV2($result);
        }, $response['results']);
        return $response;
    }
}
