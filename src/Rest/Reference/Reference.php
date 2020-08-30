<?php
namespace PolygonIO\Rest\Reference;

/**
 * Class Reference
 *
 * @package PolygonIO\Rest\Reference
 */
class Reference
{
    public Tickers $tickers;
    public TickerTypes $tickerTypes;
    public TickerDetails $tickerDetails;
    public TickerNews $tickerNews;
    public Markets $markets;
    public Locales $locales;
    public StockSplits $stockSplits;
    public StockDividends $stockDividends;
    public StockFinancials $stockFinancials;
    public MarketStatus $marketStatus;
    public MarketHolidays $marketHolidays;

    /**
     * Reference constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->tickers = new Tickers($apiKey);
        $this->tickerTypes = new TickerTypes($apiKey);
        $this->tickerDetails = new TickerDetails($apiKey);
        $this->tickerNews = new TickerNews($apiKey);
        $this->markets = new Markets($apiKey);
        $this->locales = new Locales($apiKey);
        $this->stockSplits = new StockSplits($apiKey);
        $this->stockDividends = new StockDividends($apiKey);
        $this->stockFinancials = new StockFinancials($apiKey);
        $this->marketStatus = new MarketStatus($apiKey);
        $this->marketHolidays = new MarketHolidays($apiKey);
    }
}
