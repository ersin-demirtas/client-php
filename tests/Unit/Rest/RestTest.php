<?php

namespace ErsinDemirtas\PolygonIOTests\Unit\Rest;

use ErsinDemirtas\PolygonIO\Rest\Crypto\Crypto;
use ErsinDemirtas\PolygonIO\Rest\Forex\Forex;
use ErsinDemirtas\PolygonIO\Rest\Reference\Reference;
use ErsinDemirtas\PolygonIO\Rest\Rest;
use ErsinDemirtas\PolygonIO\Rest\Stocks\Stocks;
use ErsinDemirtas\PolygonIOTests\TestCase;

class RestTest extends TestCase
{
    private Rest $rest;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rest = new Rest('API_KEY_000_111');
    }

    /**
     * @test
     */
    public function constructorShouldSetApiKeyAttribute()
    {
        $this->assertEquals('API_KEY_000_111', $this->rest->apiKey);
    }

    /**
     * @test
     */
    public function referenceMethodShouldReturnReferenceInstance()
    {
        $this->assertInstanceOf(Reference::class, $this->rest->reference());
    }

    /**
     * @test
     */
    public function stocksMethodShouldReturnStocksInstance()
    {
        $this->assertInstanceOf(Stocks::class, $this->rest->stocks());
    }

    /**
     * @test
     */
    public function forexMethodShouldReturnForexInstance()
    {
        $this->assertInstanceOf(Forex::class, $this->rest->forex());
    }

    /**
     * @test
     */
    public function cryptoMethodShouldReturnCryptoInstance()
    {
        $this->assertInstanceOf(Crypto::class, $this->rest->crypto());
    }
}
