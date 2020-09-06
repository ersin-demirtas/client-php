<?php
namespace ErsinDemirtas\PolygonIO\Rest\Stocks;

/**
 * Class Stocks
 *
 * @package Ersindemirtas\PolygonIO\Rest\Stocks
 */
class Stocks
{
    public Exchanges $exchanges;
    public HistoricTrades $historicTrades;
    public HistoricTradesV2 $historicTradesV2;
    public HistoricQuotes $historicQuotes;
    public HistoricQuotesV2 $historicQuotesV2;
    public LastTradeForSymbol $lastTradeForSymbol;
    public LastQuoteForSymbol $lastQuoteForSymbol;
    public DailyOpenClose $dailyOpenClose;
    public ConditionMappings $conditionMappings;
    public SnapshotAllTickers $snapshotAllTickers;
    public SnapshotSingleTicker $snapshotSingleTicker;
    public SnapshotGainersLosers $snapshotGainersLosers;
    public PreviousClose $previousClose;
    public Aggregates $aggregates;
    public GroupedDaily $groupedDaily;

    /**
     * Stocks constructor.
     *
     * @param  string  $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->exchanges = new Exchanges($apiKey);
        $this->historicTrades = new HistoricTrades($apiKey);
        $this->historicTradesV2 = new HistoricTradesV2($apiKey);
        $this->historicQuotes = new HistoricQuotes($apiKey);
        $this->historicQuotesV2 = new HistoricQuotesV2($apiKey);
        $this->lastTradeForSymbol = new LastTradeForSymbol($apiKey);
        $this->lastQuoteForSymbol = new LastQuoteForSymbol($apiKey);
        $this->dailyOpenClose = new DailyOpenClose($apiKey);
        $this->conditionMappings = new ConditionMappings($apiKey);
        $this->snapshotAllTickers = new SnapshotAllTickers($apiKey);
        $this->snapshotSingleTicker = new SnapshotSingleTicker($apiKey);
        $this->snapshotGainersLosers = new SnapshotGainersLosers($apiKey);
        $this->previousClose = new PreviousClose($apiKey);
        $this->aggregates = new Aggregates($apiKey);
        $this->groupedDaily = new GroupedDaily($apiKey);
    }
}
