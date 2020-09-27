<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

/**
 * Class Stocks
 *
 * @package Ersindemirtas\PolygonIO\Rest\Stocks
 */
class Stocks
{

    /**
     * @var string
     */
    public string $apiKey;

    /**
     * Stocks constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return array
     */
    public function exchanges()
    {
        return (new Exchanges($this->apiKey))->get();
    }

    /**
     * @param  string  $tickerSymbol
     * @param  string  $date
     *
     * @return array
     */
    public function historicTrades(string $tickerSymbol, string $date)
    {
        return (new HistoricTrades($this->apiKey))->get($tickerSymbol, $date);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  string  $date
     *
     * @return array
     */
    public function historicTradesV2(string $tickerSymbol, string $date)
    {
        return (new HistoricTradesV2($this->apiKey))->get($tickerSymbol, $date);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  string  $date
     *
     * @return array
     */
    public function historicQuotes(string $tickerSymbol, string $date)
    {
        return (new HistoricQuotes($this->apiKey))->get($tickerSymbol, $date);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  string  $date
     *
     * @return array
     */
    public function historicQuotesV2(string $tickerSymbol, string $date)
    {
        return (new HistoricQuotesV2($this->apiKey))->get($tickerSymbol, $date);
    }

    /**
     * @param  string  $tickerSymbol
     *
     * @return array
     */
    public function lastTradeForSymbol(string $tickerSymbol)
    {
        return (new LastTradeForSymbol($this->apiKey))->get($tickerSymbol);
    }

    /**
     * @param  string  $tickerSymbol
     *
     * @return array
     */
    public function lastQuoteForSymbol(string $tickerSymbol)
    {
        return (new LastQuoteForSymbol($this->apiKey))->get($tickerSymbol);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  string  $date
     *
     * @return array|mixed
     */
    public function dailyOpenClose(string $tickerSymbol, string $date)
    {
        return (new DailyOpenClose($this->apiKey))->get($tickerSymbol, $date);
    }

    /**
     * @param  string  $tickTypes
     *
     * @return array|mixed
     */
    public function conditionMappings(string $tickTypes = 'trades')
    {
        return (new ConditionMappings($this->apiKey))->get($tickTypes);
    }

    /**
     * @return array
     */
    public function snapshotAllTickers()
    {
        return (new SnapshotAllTickers($this->apiKey))->get();
    }

    /**
     * @param  string  $tickerSymbol
     *
     * @return array
     */
    public function snapshotSingleTicker(string $tickerSymbol)
    {
        return (new SnapshotSingleTicker($this->apiKey))->get($tickerSymbol);
    }

    /**
     * @param  string  $direction
     *
     * @return array
     */
    public function snapshotGainersLosers(string $direction = 'gainers')
    {
        return (new SnapshotGainersLosers($this->apiKey))->get($direction);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array
     */
    public function previousClose(string $tickerSymbol, array $params = [])
    {
        return (new PreviousClose($this->apiKey))->get($tickerSymbol, $params);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  string  $multiplier
     * @param  string  $from
     * @param  string  $to
     * @param  string  $timespan
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function aggregates(string $tickerSymbol, string $multiplier, string $from, string $to, string $timespan = 'days', array $params = [])
    {
        return (new Aggregates($this->apiKey))->get($tickerSymbol, $multiplier, $from, $to, $timespan = 'days', $params = []);
    }

    /**
     * @param  string  $date
     * @param  string  $locale
     * @param  string  $market
     * @param  array  $params
     *
     * @return array
     */
    public function groupedDaily(string $date, string $locale = 'US', string $market = 'STOCKS', array $params = [])
    {
        return (new GroupedDaily($this->apiKey))->get($date, $locale, $market, $params);
    }
}
