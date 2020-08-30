<?php
namespace PolygonIO\Rest\Forex;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

/**
 * Class Aggregates
 *
 * @package PolygonIO\Rest\Forex
 */
class Aggregates extends RestResource
{

    /**
     * @param  string  $tickerSymbol
     * @param  string  $multiplier
     * @param  string  $from
     * @param  string  $to
     * @param  string  $timespan
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(string $tickerSymbol, string $multiplier, string $from, string $to, string $timespan = 'days', array $params = [])
    {
        return $this->_get('/v2/aggs/ticker/' . $tickerSymbol . '/range/' . $multiplier . '/'. $timespan .'/'. $from . '/' . $to, $params);
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
