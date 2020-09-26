<?php

namespace ErsinDemirtas\PolygonIOTests\Unit\Rest;

use ErsinDemirtas\PolygonIOTests\TestCase;
use ErsinDemirtas\PolygonIO\Rest\Reference\Reference;
use ErsinDemirtas\PolygonIO\Rest\Reference\Tickers;
use ErsinDemirtas\PolygonIO\Rest\Reference\TickerTypes;
use ErsinDemirtas\PolygonIO\Rest\Reference\TickerDetails;
use ErsinDemirtas\PolygonIO\Rest\Reference\TickerNews;
use ErsinDemirtas\PolygonIO\Rest\Reference\Markets;
use ErsinDemirtas\PolygonIO\Rest\Reference\Locales;
use ErsinDemirtas\PolygonIO\Rest\Reference\StockSplits;
use ErsinDemirtas\PolygonIO\Rest\Reference\StockDividends;
use ErsinDemirtas\PolygonIO\Rest\Reference\StockFinancials;
use ErsinDemirtas\PolygonIO\Rest\Reference\MarketStatus;
use ErsinDemirtas\PolygonIO\Rest\Reference\MarketHolidays;

class ReferenceTest extends TestCase
{
    public function testExportAllTheMethodsFromReferenceApi()
    {
        $reference = new Reference('fake-api-key');
        $this->assertInstanceOf(Tickers::class, $reference->tickers);
        $this->assertInstanceOf(TickerTypes::class, $reference->tickerTypes);
        $this->assertInstanceOf(TickerDetails::class, $reference->tickerDetails);
        $this->assertInstanceOf(TickerNews::class, $reference->tickerNews);
        $this->assertInstanceOf(Markets::class, $reference->markets);
        $this->assertInstanceOf(Locales::class, $reference->locales);
        $this->assertInstanceOf(StockSplits::class, $reference->stockSplits);
        $this->assertInstanceOf(StockDividends::class, $reference->stockDividends);
        $this->assertInstanceOf(StockFinancials::class, $reference->stockFinancials);
        $this->assertInstanceOf(MarketStatus::class, $reference->marketStatus);
        $this->assertInstanceOf(MarketHolidays::class, $reference->marketHolidays);
    }

    public function testTickersGetCall()
    {
        $requestsContainer = [];

        $tickers = new Tickers('fake-api-key');
        $tickers->httpClient = $this->getHttpMock($requestsContainer);

        $tickers->get();

        $this->assertPath($requestsContainer, '/v2/reference/tickers');
    }

    public function testTickerTypesGetCall()
    {
        $requestsContainer = [];

        $tickerTypes = new TickerTypes('fake-api-key');
        $tickerTypes->httpClient = $this->getHttpMock($requestsContainer);

        $tickerTypes->get();

        $this->assertPath($requestsContainer, '/v2/reference/types');
    }

    public function testTickerDetailsGetCall()
    {
        $requestsContainer = [];
        $response = [
            'lei' => 'lei_remapped',
            'sic' => 'sic_remapped'
        ];
        $tickerDetails = new TickerDetails('fake-api-key');
        $tickerDetails->httpClient = $this->getHttpMock($requestsContainer, $response);

        $apiResponse = $tickerDetails->get('AAPL');

        $this->assertPath($requestsContainer, '/v1/meta/symbols/AAPL/company');
        $this->assertEquals('lei_remapped', $apiResponse['legalEntityIdentifier']);
        $this->assertEquals('sic_remapped', $apiResponse['standardIndustryClassification']);
    }

    public function testTickerNewsGetCall()
    {
        $requestsContainer = [];
        $tickerNews = new TickerNews('fake-api-key');
        $tickerNews->httpClient = $this->getHttpMock($requestsContainer);

        $tickerNews->get('AAPL');

        $this->assertPath($requestsContainer, '/v1/meta/symbols/AAPL/news');
    }

    public function testMarketsGetCall()
    {
        $requestsContainer = [];

        $markets = new Markets('fake-api-key');
        $markets->httpClient = $this->getHttpMock($requestsContainer);

        $markets->get();

        $this->assertPath($requestsContainer, '/v2/reference/markets');
    }

    public function testLocalesGetCall()
    {
        $requestsContainer = [];

        $locales = new Locales('fake-api-key');
        $locales->httpClient = $this->getHttpMock($requestsContainer);

        $locales->get();

        $this->assertPath($requestsContainer, '/v2/reference/locales');
    }

    public function testStockSplitsCall()
    {
        $requestsContainer = [];

        $stockSplits = new StockSplits('fake-api-key');
        $stockSplits->httpClient = $this->getHttpMock($requestsContainer);

        $stockSplits->get('AAPL');

        $this->assertPath($requestsContainer, '/v2/reference/splits/AAPL');
    }

    public function testStockDividendsCall()
    {
        $requestsContainer = [];

        $stockDividends = new StockDividends('fake-api-key');
        $stockDividends->httpClient = $this->getHttpMock($requestsContainer);

        $stockDividends->get('AAPL');

        $this->assertPath($requestsContainer, '/v2/reference/dividends/AAPL');
    }

    public function testStockFinancialsCall()
    {
        $requestsContainer = [];

        $stockFinancials = new StockFinancials('fake-api-key');
        $stockFinancials->httpClient = $this->getHttpMock($requestsContainer);

        $stockFinancials->get('AAPL');

        $this->assertPath($requestsContainer, '/v2/reference/financials/AAPL');
    }

    public function testMarketStatusGetCall()
    {
        $requestsContainer = [];

        $marketStatus = new MarketStatus('fake-api-key');
        $marketStatus->httpClient = $this->getHttpMock($requestsContainer);

        $marketStatus->get();

        $this->assertPath($requestsContainer, '/v1/marketstatus/now');
    }

    public function testMarketHolidaysGetCall()
    {
        $requestsContainer = [];

        $marketHolidays = new MarketHolidays('fake-api-key');
        $marketHolidays->httpClient = $this->getHttpMock($requestsContainer);

        $marketHolidays->get();

        $this->assertPath($requestsContainer, '/v1/marketstatus/upcoming');
    }

    private function assertPath($requests, $path)
    {
        $this->assertCount(1, $requests);
        $this->assertEquals($path, $requests[0]['request']->getUri()->getPath());
    }
}
