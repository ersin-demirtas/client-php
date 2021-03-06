<?php
namespace ErsinDemirtas\PolygonIO\Rest\Forex;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class GroupedDaily
 *
 * @package PolygonIO\Rest\Forex
 */
class GroupedDaily extends RestResource
{
    /**
     * @param  string  $date
     * @param  string  $locale
     * @param  string  $market
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(string $date, string $locale = 'US', string $market = 'FX', array $params = [])
    {
        return $this->_get('/v2/aggs/grouped/locale/'.$locale.'/market/'.$market.'/'.$date, $params);
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
