<?php
namespace ErsinDemirtas\PolygonIO\Rest\Forex;

/**
 * Class Forex
 *
 * @package PolygonIO\Rest\Forex
 */
class Forex
{
    public string $apiKey;

    /**
     * Forex constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param  string  $date
     * @param  string  $locale
     * @param  string  $market
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function groupedDaily(string $date, string $locale = 'US', string $market = 'FX', array $params = [])
    {
        return (new GroupedDaily($this->apiKey))->get($date, $locale, $market, $params);
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
        return (new Aggregates($this->apiKey))->get($tickerSymbol, $multiplier, $from, $to, $timespan, $params);
    }

    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function previousClose(string $tickerSymbol, array $params = [])
    {
        return (new PreviousClose($this->apiKey))->get($tickerSymbol, $params = []);
    }

    /**
     * @param  string  $from
     * @param  string  $to
     * @param  string  $date
     * @param  array  $params
     *
     * @return array
     */
    public function historicForexTick(string $from, string $to, string $date, array $params = [])
    {
        return (new HistoricForexTick($this->apiKey))->get($from, $to, $date, $params);
    }

    /**
     * @param  string  $from
     * @param  string  $to
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function realTimeCurrencyConversion(string $from, string $to, array $params = [])
    {
        return (new RealTimeCurrencyConversion($this->apiKey))->get($from, $to, $params);
    }

    /**
     * @param  string  $from
     * @param  string  $to
     *
     * @return array|mixed
     */
    public function lastQuoteForCurrencyPair(string $from, string $to)
    {
        return (new LastQuoteForCurrencyPair($this->apiKey))->get($from, $to);
    }

    /**
     * @return array|mixed
     */
    public function snapshotAllTickers()
    {
        return (new SnapshotAllTickers($this->apiKey))->get();
    }

    /**
     * @param  string  $direction
     *
     * @return array|mixed
     */
    public function snapshotGainersLosers(string $direction = 'gainers')
    {
        return (new SnapshotGainersLosers($this->apiKey))->get($direction);
    }
}
