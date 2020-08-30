<?php

namespace PolygonIO\Rest\Crypto;

use PolygonIO\Rest\Common\Mappers;
use PolygonIO\Rest\RestResource;

/**
 * Class DailyOpenClose
 *
 * @package PolygonIO\Rest\Crypto
 */
class DailyOpenClose extends RestResource
{
    /**
     * @param  string  $from
     * @param  string  $to
     * @param  string  $date
     *
     * @return array|mixed
     */
    public function get(string $from, string $to, string $date)
    {
        return $this->_get("/v1/open-close/crypto/${from}/${to}/${date}");
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        if (array_key_exists('openTrades', $response)) {
            $response['openTrades'] = array_map(function ($result) {
                return Mappers::cryptoTick($result);
            }, $response['openTrades']);
        }

        if (array_key_exists('closingTrades', $response)) {
            $response['closingTrades'] = array_map(function ($result) {
                return Mappers::cryptoTick($result);
            }, $response['closingTrades']);
        }

        return $response;
    }
}
