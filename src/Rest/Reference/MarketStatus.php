<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class MarketStatus
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Reference
 */
class MarketStatus extends RestResource
{
    /**
     * @var string
     */
    protected string $route = '/v1/marketstatus/now';

    /**
     * @return array|mixed
     */
    public function get()
    {
        return $this->_get($this->route);
    }
}
