<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

class Aggregates extends RestResource
{

    /**
     * @param $tickerSymbol
     * @param $multiplier
     * @param $from
     * @param $to
     * @param  string  $timespan
     * @param  array  $params
     *
     * @return mixed
     */
    public function get($tickerSymbol, $multiplier, $from, $to, $timespan = 'days', $params = [])
    {
        return $this->_get('/v2/aggs/ticker/'.$tickerSymbol.'/range/'.$multiplier.'/'.$timespan.'/'.$from.'/'.$to, $params);
    }

    /**
     * @param $response
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
