<?php
namespace PolygonIO\Rest\Crypto;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

/**
 * Class HistoricCryptoTrade
 *
 * @package PolygonIO\Rest\Crypto
 */
class HistoricCryptoTrade extends RestResource
{
    /**
     * @var array|int[]
     */
    protected array $defaultParams = [
            'limit' => 100,
        ];

    /**
     * @param  string  $from
     * @param  string  $to
     * @param  string  $date
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(string $from, string $to, string $date, array $params = [])
    {
        return $this->_get('/v1/historic/crypto/'.$from.'/'.$to.'/'.$date, $params);
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['ticks'] = array_map(function ($tick) {
            return Mappers::cryptoTick($tick);
        }, $response['ticks']);
        return $response;
    }
}
