<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class MarketHolidays
 *
 * @package PolygonIO\Rest\Reference
 */
class MarketHolidays extends RestResource
{
    /**
     * @var string
     */
    protected string $route = 'GET	/v1/marketstatus/upcoming';

    /**
     * @return array|mixed
     */
    public function get()
    {
        return $this->_get($this->route);
    }
}
