<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\RestResource;

/**
 * Class Exchanges
 *
 * @package PolygonIO\Rest\Stocks
 */
class Exchanges extends RestResource
{
    /**
     * @var string
     */
    protected string $route = '/v1/meta/exchanges';

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->_get($this->route);
    }
}
