<?php

namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class CryptoExchanges
 *
 * @package Ersindemirtas\PolygonIO\Rest\Crypto
 */
class CryptoExchanges extends RestResource
{
    public string $route = '/v1/meta/crypto-exchanges';

    /**
     * @return array|mixed
     */
    public function get()
    {
        return $this->_get($this->route);
    }
}
