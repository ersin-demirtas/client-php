<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class TickerTypes
 *
 * @package Ersindemirtas\PolygonIO\Rest\Reference
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
