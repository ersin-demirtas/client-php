<?php

namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

/**
 * Class Crypto
 *
 * @package PolygonIO\Rest\Crypto
 */
class Crypto
{
    /**
     * @var string
     */
    public string $apiKey;

    /**
     * Crypto constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param  string  $tickerSymbol
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function previousClose(string $tickerSymbol, array $params = [])
    {
        return (new PreviousClose($this->apiKey))->get($tickerSymbol, $params);
    }


    /**
     * @param  string  $date
     * @param  string  $locale
     * @param  string  $market
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function groupedDaily(string $date, string $locale = 'US', string $market = 'CRYPTO', array $params = [])
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
     * @return mixed
     */
    public function aggregates(string $tickerSymbol, string $multiplier, string $from, string $to, string $timespan = 'days', array $params = [])
    {
        return (new Aggregates($this->apiKey))->get($tickerSymbol, $multiplier, $from, $to, $timespan, $params);
    }

    /**
     * @return array|mixed
     */
    public function cryptoExchanges()
    {
        return (new CryptoExchanges($this->apiKey))->get();
    }

    /**
     * @param  string  $from
     * @param  string  $to
     *
     * @return array|mixed
     */
    public function lastTradeForCryptoPair(string $from, string $to)
    {
        return (new LastTradeForCryptoPair($this->apiKey))->get($from, $to);
    }

    /**
     * @param  string  $from
     * @param  string  $to
     * @param  string  $date
     *
     * @return array|mixed
     */
    public function dailyOpenClose(string $from, string $to, string $date)
    {
        return (new DailyOpenClose($this->apiKey))->get($from, $to, $date);
    }

    /**
     * @param  string  $from
     * @param  string  $to
     * @param  string  $date
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function historicCryptoTrade(string $from, string $to, string $date, array $params = [])
    {
        return (new HistoricCryptoTrade($this->apiKey))->get($from, $to, $date, $params);
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

    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function snapshotSingleTicker(string $tickerSymbol)
    {
        return (new SnapshotSingleTicker($this->apiKey))->get($tickerSymbol);
    }

    /**
     * @param  string  $tickerSymbol
     *
     * @return array|mixed
     */
    public function snapshotSingleTickerFullBook(string $tickerSymbol)
    {
        return (new SnapshotSingleTickerFullBook($this->apiKey))->get($tickerSymbol);
    }
}
