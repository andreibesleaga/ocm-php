<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Conversion\ListOf;
use Ocm\Core\Exceptions\APIException;
use Ocm\Poi\PoiListParams;
use Ocm\Poi\PoiListResponseItem;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\PoiRawContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class PoiRawService implements PoiRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Used to fetch a list of POIs (sites) within a geographic boundary or near a specific latitude/longitude. This is the primary method for most applications and services to consume data from Open Charge Map.
     *
     * @param array{
     *   boundingbox?: list<mixed>,
     *   camelcase?: bool,
     *   chargepointid?: string,
     *   client?: string,
     *   compact?: bool,
     *   connectiontypeid?: list<mixed>,
     *   countrycode?: string,
     *   countryid?: list<string>,
     *   dataproviderid?: list<mixed>,
     *   distance?: float,
     *   distanceunit?: string,
     *   greaterthanid?: string,
     *   includecomments?: bool,
     *   latitude?: int,
     *   levelid?: list<mixed>,
     *   longitude?: float,
     *   maxresults?: int,
     *   modifiedsince?: string,
     *   opendata?: bool,
     *   operatorid?: list<mixed>,
     *   output?: string,
     *   polygon?: string,
     *   polyline?: string,
     *   sortby?: string,
     *   statustypeid?: list<mixed>,
     *   usagetypeid?: list<mixed>,
     *   verbose?: bool,
     * }|PoiListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<PoiListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|PoiListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PoiListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'poi',
            query: $parsed,
            options: $options,
            convert: new ListOf(PoiListResponseItem::class),
        );
    }
}
