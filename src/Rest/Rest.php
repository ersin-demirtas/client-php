<?php
namespace PolygonIO\Rest;

use PolygonIO\Rest\Crypto\Crypto;
use PolygonIO\Rest\Forex\Forex;
use PolygonIO\Rest\Reference\Reference;
use PolygonIO\Rest\Stocks\Stocks;

/**
 * Class Rest
 *
 * @package PolygonIO\rest
 */
class Rest {

    /**
     * @var Reference
     */
    public $reference;

    /**
     * @var Stocks
     */
    public $stocks;

    /**
     * @var Forex
     */
    public $forex;

    /**
     * @var Crypto
     */
    public $crypto;

    /**
     * Rest constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->reference = new Reference($apiKey);
        $this->stocks = new Stocks($apiKey);
        $this->forex = new Forex($apiKey);
        $this->crypto = new Crypto($apiKey);
    }
}
