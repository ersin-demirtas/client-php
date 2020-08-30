<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class TickerTypes
 *
 * @package PolygonIO\Rest\Reference
 */
class TickerTypes extends RestResource
{
    /**
     * @var string
     */
    protected string $route = '/v2/reference/types';

    /**
     * @return array|mixed
     */
    public function get()
    {
        return $this->_get($this->route);
    }
}
