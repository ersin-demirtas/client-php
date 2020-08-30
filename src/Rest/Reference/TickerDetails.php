<?php
namespace PolygonIO\Rest\Reference;

use PolygonIO\Rest\RestResource;

/**
 * Class TickerDetails
 *
 * @package PolygonIO\Rest\Reference
 */
class TickerDetails extends RestResource
{
    /**
     * @param string $tickerSymbol
     * @return mixed
     */
    public function get(string $tickerSymbol)
    {
        return $this->_get('/v1/meta/symbols/'.$tickerSymbol.'/company');
    }

    /**
     * @param  array  $response
     *
     * @return array
     */
    protected function mapper(array $response): array
    {
        $response['legalEntityIdentifier'] = $response['lei'];
        $response['standardIndustryClassification'] = $response['sic'];
        return $response;
    }
}
