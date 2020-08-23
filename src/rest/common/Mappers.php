<?php
namespace PolygonIO\Rest\Common;

/**
 * Class Mappers
 *
 * @package PolygonIO\Rest
 */
class Mappers {

    /**
     * @param  array  $tick
     *
     * @return array
     */
    public static function quoteV1 (array $tick): array
    {
        $tick['condition'] = $tick['c'];
        $tick['bidExchange'] = $tick['bE'];
        $tick['askExchange'] = $tick['aE'];
        $tick['askPrice'] = $tick['aP'];
        $tick['buyPrice'] = $tick['bP'];
        $tick['bidSize'] = $tick['bS'];
        $tick['askSize'] = $tick['aS'];
        $tick['timestamp'] = $tick['t'];

        return $tick;
    }

    /**
     * @param  array  $quote
     *
     * @return array
     */
    public static function snapshotQuote (array $quote): array
    {
        $quote['bidPrice'] = $quote['p'];
        $quote['bidSize'] = $quote['s'];
        $quote['askPrice'] = $quote['P'];
        $quote['askSize'] = $quote['S'];
        $quote['lastUpdateTimestamp'] = $quote['t'];

        return $quote;
    }

    /**
     * @param  array  $tick
     *
     * @return array
     */
    public static function tradeV1 (array $tick): array
    {
        $tick['condition1'] = $tick['c1'];
        $tick['condition2'] = $tick['c2'];
        $tick['condition3'] = $tick['c3'];
        $tick['condition4'] = $tick['c4'];
        $tick['exchange'] = $tick['e'];
        $tick['price'] = $tick['p'];
        $tick['size'] = $tick['s'];
        $tick['timestamp'] = $tick['t'];

        return $tick;
    }

    /**
     * @param  array  $snap
     *
     * @return array
     */
    public static function snapshotAgg (array $snap): array
    {
        $snap['close'] =  $snap['c'];
        $snap['high'] =  $snap['h'];
        $snap['low'] = $snap['l'];
        $snap['open'] = $snap['o'];
        $snap['volume'] = $snap['v'];

        return $snap;
    }

    /**
     * @param  array  $snap
     *
     * @return array
     */
    public static function snapshotAggV2 (array $snap): array
    {
        $snap['tickerSymbol'] = $snap['T'];
        $snap['volume'] = $snap['v'];
        $snap['open'] = $snap['o'];
        $snap['close'] = $snap['c'];
        $snap['high'] = $snap['h'];
        $snap['low'] = $snap['l'];
        $snap['timestamp'] = $snap['t'];
        $snap['numberOfItems'] = $snap['n'];

        return $snap;
    }

    /**
     * @param  array  $snap
     *
     * @return array
     */
    public static function snapshotTicker (array $snap): array
    {
        $snap['day'] = self::snapshotAgg($snap['day']);
        $snap['lastTrade'] = self::tradeV1($snap['lastTrade']);
        $snap['lastQuote'] = self::snapshotQuote($snap['lastQuote']);
        $snap['min'] = self::snapshotAgg($snap['min']);
        $snap['prevDay'] = self::snapshotAgg($snap['prevDay']);

        return $snap;
    }

    /**
     * @param  array  $snap
     *
     * @return array
     */
    public static function snapshotCryptoTicker (array $snap): array
    {
        $snap['day'] = self::snapshotAgg($snap['day']);
        $snap['lastTrade'] = self::cryptoTick($snap['lastTrade']);
        $snap['min'] = self::snapshotAgg($snap['min']);
        $snap['prevDay'] = self::snapshotAgg($snap['prevDay']);

        return $snap;
    }

    /**
     * @param  array  $tick
     *
     * @return array
     */
    public static function cryptoTick(array $tick): array
    {
        $tick['price'] = $tick['p'];
        $tick['size'] = $tick['s'];
        $tick['exchange'] = $tick['x'];
        $tick['conditions'] = $tick['c'];
        $tick['timestamp'] = $tick['t'];

        return $tick;
    }

    /**
     * @param  array  $item
     *
     * @return array
     */
    public static function cryptoSnapshotBookItem (array $item): array
    {
        $item['price'] = $item['p'];

        return $item;
    }
}
