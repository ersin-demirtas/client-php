<?php

namespace ErsinDemirtas\PolygonIOTests\Unit\Rest;

use ErsinDemirtas\PolygonIOTests\TestCase;
use ErsinDemirtas\PolygonIO\Rest\Forex\Aggregates;
use ErsinDemirtas\PolygonIO\Rest\Forex\Forex;
use ErsinDemirtas\PolygonIO\Rest\Forex\GroupedDaily;
use ErsinDemirtas\PolygonIO\Rest\Forex\HistoricForexTick;
use ErsinDemirtas\PolygonIO\Rest\Forex\LastQuoteForCurrencyPair;
use ErsinDemirtas\PolygonIO\Rest\Forex\PreviousClose;
use ErsinDemirtas\PolygonIO\Rest\Forex\RealTimeCurrencyConversion;
use ErsinDemirtas\PolygonIO\Rest\Forex\SnapshotAllTickers;
use ErsinDemirtas\PolygonIO\Rest\Forex\SnapshotGainersLosers;

class ForexTest extends TestCase
{
    public function testExportAllMethodsFromStocksApi()
    {
        $forex = new Forex('fake api key');

        $this->assertInstanceOf(Aggregates::class, $forex->aggregates);
        $this->assertInstanceOf(GroupedDaily::class, $forex->groupedDaily);
        $this->assertInstanceOf(PreviousClose::class, $forex->previousClose);
        $this->assertInstanceOf(HistoricForexTick::class, $forex->historicForexTick);
        $this->assertInstanceOf(RealTimeCurrencyConversion::class, $forex->realTimeCurrencyConversion);
        $this->assertInstanceOf(LastQuoteForCurrencyPair::class, $forex->lastQuoteForCurrencyPair);
        $this->assertInstanceOf(SnapshotGainersLosers::class, $forex->snapshotGainersLosers);
        $this->assertInstanceOf(SnapshotAllTickers::class, $forex->snapshotAllTickers);
    }

    public function testPreviousCloseGetCall()
    {
        $requestsContainer = [];

        $previousClose = new PreviousClose('fake-api-key');
        $previousClose->httpClient = $this->getHttpMock($requestsContainer, [
            'results' => [],
        ]);

        $previousClose->get('AAPL');

        $this->assertPath($requestsContainer, '/v2/aggs/ticker/AAPL/prev');
    }

    public function testAggregatesCloseGetCall()
    {
        $requestsContainer = [];

        $previousClose = new Aggregates('fake-api-key');
        $previousClose->httpClient = $this->getHttpMock($requestsContainer, [
            'results' => [],
        ]);

        $previousClose->get('AAPL', 1, '2018-2-2', '2019-2-2');

        $this->assertPath($requestsContainer, '/v2/aggs/ticker/AAPL/range/1/days/2018-2-2/2019-2-2');
    }

    public function testGroupedDailyGetCall()
    {
        $requestsContainer = [];

        $groupedDaily = new GroupedDaily('fake-api-key');
        $groupedDaily->httpClient = $this->getHttpMock($requestsContainer, [
            'results' => [],
        ]);

        $groupedDaily->get('2019-2-2');

        $this->assertPath($requestsContainer, '/v2/aggs/grouped/locale/US/market/FX/2019-2-2');
    }

    public function testHistoricForexTickGetCall()
    {
        $requestsContainer = [];

        $historicForexTick = new HistoricForexTick('fake-api-key');
        $historicForexTick->httpClient = $this->getHttpMock($requestsContainer);

        $historicForexTick->get('USD', 'AUD', '2018-2-2');

        $this->assertPath($requestsContainer, '/v1/historic/forex/USD/AUD/2018-2-2');
    }

    public function testRealTimeCurrencyConversionGetCall()
    {
        $requestsContainer = [];

        $realTimeCurrencyConversion = new RealTimeCurrencyConversion('fake-api-key');
        $realTimeCurrencyConversion->httpClient = $this->getHttpMock($requestsContainer);

        $realTimeCurrencyConversion->get('USD', 'AUD');

        $this->assertPath($requestsContainer, '/v1/conversion/USD/AUD');
    }

    public function testLastQuoteForCurrencyPairGetCall()
    {
        $requestsContainer = [];

        $lastQuoteForCurrencyPair = new LastQuoteForCurrencyPair('fake-api-key');
        $lastQuoteForCurrencyPair->httpClient = $this->getHttpMock($requestsContainer);

        $lastQuoteForCurrencyPair->get('USD', 'AUD');

        $this->assertPath($requestsContainer, '/v1/last_quote/currencies/USD/AUD');
    }

    public function testSnapshotGainersLosersGetCall()
    {
        $requestsContainer = [];

        $snapshotGainersLosers = new SnapshotGainersLosers('fake-api-key');
        $snapshotGainersLosers->httpClient = $this->getHttpMock($requestsContainer, [
            'tickers' => [],
        ]);

        $snapshotGainersLosers->get();

        $this->assertPath($requestsContainer, '/v2/snapshot/locale/global/markets/forex/gainers');
    }

    public function testSnapshotAllTickersGetCall()
    {
        $requestsContainer = [];

        $snapshotAllTickers = new SnapshotAllTickers('fake-api-key');
        $snapshotAllTickers->httpClient = $this->getHttpMock($requestsContainer, [
            'tickers' => [],
        ]);

        $snapshotAllTickers->get();

        $this->assertPath($requestsContainer, '/v2/snapshot/locale/global/markets/forex/tickers');
    }


    private function assertPath($requests, $path)
    {
        $this->assertCount(1, $requests);
        $this->assertEquals($path, $requests[0]['request']->getUri()->getPath());
    }
}
