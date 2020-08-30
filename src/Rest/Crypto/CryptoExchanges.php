<?php
namespace PolygonIO\Rest\Crypto;

use PolygonIO\Rest\RestResource;

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
