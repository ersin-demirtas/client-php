<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class Locales
 *
 * @package PolygonIO\Rest\Reference
 */
class Locales extends RestResource
{
    /**
     * @var string
     */
    protected string $route = '/v2/reference/locales';

    /**
     * @return array|mixed
     */
    public function get()
    {
        return $this->_get($this->route);
    }
}
