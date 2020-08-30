<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class Tickers
 *
 * @package PolygonIO\Rest\Reference
 */
class Tickers extends RestResource
{

    /**
     * @var string
     */
    public string $route = '/v2/reference/tickers';

    /**
     * @var array
     */
    protected array $defaultParams
        = [
            'sort'    => 'ticker',
            'perPage' => 50,
            'page'    => 1,
        ];

    /**
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(array $params = [])
    {
        return $this->_get($this->route, $params);
    }
}
