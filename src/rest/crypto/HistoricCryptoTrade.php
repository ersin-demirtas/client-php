<?php
namespace PolygonIO\Rest\Crypto;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

class HistoricCryptoTrade extends RestResource {
    protected array $defaultParams
        = [
            'limit' => 100,
        ];

    public function get($from, $to, $date, $params = [])
    {
        return $this->_get('/v1/historic/crypto/'.$from.'/'.$to.'/'.$date, $params);
    }

    protected function mapper(array $response): array
    {
        $response['ticks'] = array_map(function($tick) {
            return Mappers::cryptoTick($tick);
        }, $response['ticks']);
        return $response;
    }
}
