<?php
namespace PolygonIO\Rest\Forex;

use PolygonIO\Rest\RestResource;

class HistoricForexTick extends RestResource {
    protected array $defaultParams
        = [
            'limit' => 100,
        ];

    public function get($from, $to, $date, $params = [])
    {
        return $this->_get('/v1/historic/forex/'.$from.'/'.$to.'/'.$date, $params);
    }
}
