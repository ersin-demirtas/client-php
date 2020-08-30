<?php
namespace PolygonIO\Rest\Forex;

use PolygonIO\Rest\RestResource;

/**
 * Class RealTimeCurrencyConversion
 *
 * @package PolygonIO\Rest\Forex
 */
class RealTimeCurrencyConversion extends RestResource
{
    /**
     * @var array|int[]
     */
    protected array $defaultParams = [
                        'amount'    => 100,
                        'precision' => 2,
                    ];

    /**
     * @param  string  $from
     * @param  string  $to
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(string $from, string $to, array $params = [])
    {
        return $this->_get('/v1/conversion/' . $from . '/' . $to, $params);
    }
}
