<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class ConditionMappings
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Stocks
 */
class ConditionMappings extends RestResource
{

    /**
     * @param  string  $tickTypes
     *
     * @return array|mixed
     */
    public function get(string $tickTypes = 'trades')
    {
        return $this->_get('/v1/meta/conditions/'.$tickTypes);
    }
}
