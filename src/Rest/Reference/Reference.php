<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

/**
 * Class Reference
 *
 * @package PolygonIO\Rest\Reference
 */
class Reference
{
    /**
     * @var string
     */
    protected string $apiKey;

    /**
     * Reference constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function tickers($params = [])
    {
        return (new Tickers($this->apiKey))->get($params);
    }

    /**
     * @return array|mixed
     */
    public function tickerTypes()
    {
        return (new TickerTypes($this->apiKey))->get();
    }

    /**
     * @param  string  $tickerSymbol
     *
     * @return mixed
     */
    public function tickerDetails(string $tickerSymbol)
    {
        return (new TickerDetails($this->apiKey))->get($tickerSymbol);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function tickerNews(string $tickerSymbol, array $params = [])
    {
        return (new TickerNews($this->apiKey))->get($tickerSymbol, $params);
    }

    /**
     * @return array|mixed
     */
    public function markets()
    {
        return (new Markets($this->apiKey))->get();
    }

    /**
     * @return array|mixed
     */
    public function locales()
    {
        return (new Locales($this->apiKey))->get();
    }

    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function stockSplits(string $tickerSymbol)
    {
        return (new StockSplits($this->apiKey))->get($tickerSymbol);
    }

    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function stockDividends(string $tickerSymbol)
    {
        return (new StockDividends($this->apiKey))->get($tickerSymbol);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function stockFinancials(string $tickerSymbol, array $params = [])
    {
        return (new StockFinancials($this->apiKey))->get($tickerSymbol, $params);
    }

    /**
     * @return array|mixed
     */
    public function marketStatus()
    {
        return (new MarketStatus($this->apiKey))->get();
    }

    /**
     * @return array|mixed
     */
    public function marketHolidays()
    {
        return (new MarketHolidays($this->apiKey))->get();
    }
}
