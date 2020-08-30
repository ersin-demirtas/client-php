<?php
namespace PolygonIO\Rest\Forex;

/**
 * Class Forex
 *
 * @package PolygonIO\Rest\Forex
 */
class Forex
{
    public Aggregates $aggregates;
    public GroupedDaily $groupedDaily;
    public PreviousClose $previousClose;
    public HistoricForexTick $historicForexTick;
    public RealTimeCurrencyConversion $realTimeCurrencyConversion;
    public LastQuoteForCurrencyPair $lastQuoteForCurrencyPair;
    public SnapshotAllTickers $snapshotAllTickers;
    public SnapshotGainersLosers $snapshotGainersLosers;

    /**
     * Forex constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->groupedDaily = new GroupedDaily($apiKey);
        $this->aggregates = new Aggregates($apiKey);
        $this->previousClose = new PreviousClose($apiKey);
        $this->historicForexTick = new HistoricForexTick($apiKey);
        $this->realTimeCurrencyConversion = new RealTimeCurrencyConversion($apiKey);
        $this->lastQuoteForCurrencyPair = new LastQuoteForCurrencyPair($apiKey);
        $this->snapshotAllTickers = new SnapshotAllTickers($apiKey);
        $this->snapshotGainersLosers = new SnapshotGainersLosers($apiKey);
    }
}
