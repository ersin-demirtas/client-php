<?php

namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

use ErsinDemirtas\PolygonIO\Rest\Common\Mappers;
use ErsinDemirtas\PolygonIO\Rest\RestResource;

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
        if (array_key_exists(Mappers::OPEN_TRADES, $response)) {
            $response[Mappers::OPEN_TRADES] = array_map(function ($result) {
                return Mappers::cryptoTick($result);
            }, $response[Mappers::OPEN_TRADES]);
        }

        if (array_key_exists(Mappers::CLOSING_TRADES, $response)) {
            $response[Mappers::CLOSING_TRADES] = array_map(function ($result) {
                return Mappers::cryptoTick($result);
            }, $response[Mappers::CLOSING_TRADES]);
        }

        return $response;
    }
}
