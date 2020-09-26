<?php
namespace ErsinDemirtas\PolygonIO\Rest;

use ErsinDemirtas\PolygonIO\Rest\Crypto\Crypto;
use ErsinDemirtas\PolygonIO\Rest\Forex\Forex;
use ErsinDemirtas\PolygonIO\Rest\Reference\Reference;
use ErsinDemirtas\PolygonIO\Rest\Stocks\Stocks;

/**
 * Class Rest
 *
 * @package PolygonIO\Rest
 */
class Rest
{

    public string $apiKey;

    /**
     * Rest constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return Reference
     */
    public function reference()
    {
        return new Reference($this->apiKey);
    }

    /**
     * @return Stocks
     */
    public function stocks()
    {
        return new Stocks($this->apiKey);
    }

    /**
     * @return Forex
     */
    public function forex()
    {
        return new Forex($this->apiKey);
    }

    /**
     * @return Crypto
     */
    public function crypto()
    {
        return new Crypto($this->apiKey);
    }
}
