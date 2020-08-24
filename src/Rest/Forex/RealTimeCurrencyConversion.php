<?php
namespace PolygonIO\Rest\Forex;

use PolygonIO\Rest\RestResource;

class RealTimeCurrencyConversion extends RestResource {
    protected array $defaultParams = [
                        'amount'    => 100,
                        'precision' => 2,
                    ];

    /**
     * @param $from
     * @param $to
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(string $from, string $to, array $params = [])
    {
        return $this->_get('/v1/conversion/' . $from . '/' . $to, $params);
    }
}
