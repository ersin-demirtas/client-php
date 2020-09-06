<?php
namespace ErsinDemirtas\PolygonIO\Rest\Reference;

use ErsinDemirtas\PolygonIO\Rest\RestResource;

/**
 * Class Tickers
 *
 * @package PolygonIO\Rest\Reference
 */
class Tickers extends RestResource
{
    /**
     * @var string
     */
    public string $route = '/v2/reference/tickers';

    /**
     * @var array
     */
    protected array $defaultParams
        = [
            'sort'    => 'ticker',
            'perPage' => 50,
            'page'    => 1,
        ];


    /**
     * @param  array  $params
     *
     * @return array|mixed
     */
    public function get(array $params = [])
    {
        return $this->_get($this->route, $params);
    }

    /**
     * @param  callable  $closure
     */
    public function all(callable $closure): void
    {
        $currentPage = 1;

        do {
            $resource = $this->get([
                'page' => $currentPage
            ]);

            $tickers = $resource['tickers'];

            foreach ($tickers as $ticker) {
                $closure($ticker);
            }

            $totalPage = intval(intval($resource['count']) / intval($resource['perPage']));
            $currentPage++;

        } while ($currentPage <= $totalPage);
    }
}
