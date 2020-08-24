<?php
namespace PolygonIO\Rest\Stocks;

use PolygonIO\Rest\RestResource;

/**
 * Class ConditionMappings
 *
 * @package PolygonIO\rest\stocks
 */
class ConditionMappings extends RestResource {

    /**
     * @param  string  $tickTypes
     *
     * @return mixed
     */
    public function get($tickTypes = 'trades')
    {
        return $this->_get('/v1/meta/conditions/'.$tickTypes);
    }
}
