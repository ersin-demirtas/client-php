<?php
namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class LastTradeForCryptoPair
 *
 * @package PolygonIO\Rest\Crypto
 */
class LastTradeForCryptoPair extends RestResource
{
    /**
     * @param  string  $from
     * @param  string  $to
     *
     * @return array|mixed
     */
    public function get(string $from, string $to)
    {
        return $this->_get('/v1/last/crypto/'.$from.'/'.$to);
    }
}
