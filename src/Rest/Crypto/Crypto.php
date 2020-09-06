<?php

namespace ErsinDemirtas\PolygonIO\Rest\Crypto;

/**
 * Class Crypto
 *
 * @package PolygonIO\Rest\Crypto
 */
class Crypto
{
    public Aggregates $aggregates;
    public GroupedDaily $groupedDaily;
    public PreviousClose $previousClose;
    public CryptoExchanges $cryptoExchanges;
    public LastTradeForCryptoPair $lastTradeForCryptoPair;
    public DailyOpenClose $dailyOpenClose;
    public HistoricCryptoTrade $historicCryptoTrade;
    public SnapshotAllTickers $snapshotAllTickers;
    public SnapshotGainersLosers $snapshotGainersLosers;
    public SnapshotSingleTicker $snapshotSingleTicker;
    public SnapshotSingleTickerFullBook $snapshotSingleTickerFullBook;

    /**
     * Crypto constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->previousClose = new PreviousClose($apiKey);
        $this->groupedDaily = new GroupedDaily($apiKey);
        $this->aggregates = new Aggregates($apiKey);
        $this->cryptoExchanges = new CryptoExchanges($apiKey);
        $this->lastTradeForCryptoPair = new LastTradeForCryptoPair($apiKey);
        $this->dailyOpenClose = new DailyOpenClose($apiKey);
        $this->historicCryptoTrade = new HistoricCryptoTrade($apiKey);
        $this->snapshotAllTickers = new SnapshotAllTickers($apiKey);
        $this->snapshotGainersLosers = new SnapshotGainersLosers($apiKey);
        $this->snapshotSingleTicker = new SnapshotSingleTicker($apiKey);
        $this->snapshotSingleTickerFullBook = new SnapshotSingleTickerFullBook($apiKey);
    }
}
