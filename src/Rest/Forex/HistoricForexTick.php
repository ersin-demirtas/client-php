<?php
namespace ErsinDemirtas\PolygonIO\Rest\Forex;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class HistoricForexTick
 *
 * @package PolygonIO\Rest\Forex
 */
class HistoricForexTick extends RestResource
{
    /**
     * @var array
     */
    protected array $defaultParams = [
        'limit' => 100,
    ];

    /**
     * @param  string  $from
     * @param  string  $to
     * @param  string  $date
     * @param  array  $params
     *
     * @return array
     */
    public function get(string $from, string $to, string $date, array $params = [])
    {
        return $this->_get('/v1/historic/forex/'.$from.'/'.$to.'/'.$date, $params);
    }
}
