<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class Tickers
 * @package PolygonIO\rest\reference
 */
class Tickers extends RestResource {
    public string $route = '/v2/reference/tickers';
    protected array $defaultParams
        = [
            'sort'    => 'ticker',
            'perPage' => 50,
            'page'    => 1,
        ];

    /**
     * @param $params
     * @return mixed
     */
    public function get($params = [])
    {
        return $this->_get($this->route, $params);
    }
}
