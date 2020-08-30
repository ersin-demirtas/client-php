<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class Markets
 *
 * @package PolygonIO\Rest\Reference
 */
class Markets extends RestResource
{
    /**
     * @var string
     */
    protected string $route = '/v2/reference/markets';

    /**
     * @return array|mixed
     */
    public function get()
    {
        return $this->_get($this->route);
    }
}
