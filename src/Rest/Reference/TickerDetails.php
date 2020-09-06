<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class TickerDetails
 *
 * @package ErsinDemirtas\PolygonIO\Rest\Reference
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
