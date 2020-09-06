<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class Locales
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Reference
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
