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

    /**
     * @var Reference
     */
    public Reference $reference;

    /**
     * @var Stocks
     */
    public Stocks $stocks;

    /**
     * @var Forex
     */
    public Forex $forex;

    /**
     * @var Crypto
     */
    public Crypto $crypto;

    /**
     * Rest constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->reference = new Reference($apiKey);
        $this->stocks = new Stocks($apiKey);
        $this->forex = new Forex($apiKey);
        $this->crypto = new Crypto($apiKey);
    }
}
