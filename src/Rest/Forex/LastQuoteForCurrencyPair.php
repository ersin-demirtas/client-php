<?php
namespace ErsinDemirtas\PolygonIO\Rest\Forex;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class LastQuoteForCurrencyPair
 *
 * @package PolygonIO\Rest\Forex
 */
class LastQuoteForCurrencyPair extends RestResource
{
    /**
     * @param  string  $from
     * @param  string  $to
     *
     * @return array|mixed
     */
    public function get(string $from, string $to)
    {
        return $this->_get('/v1/last_quote/currencies/'.$from.'/'.$to);
    }
}
