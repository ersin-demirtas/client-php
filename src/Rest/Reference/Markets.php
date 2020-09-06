<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class Markets
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Reference
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
