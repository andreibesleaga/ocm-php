<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Exceptions\APIException;
use Ocm\Core\Util;
use Ocm\Poi\PoiListResponseItem;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\PoiContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class PoiService implements PoiContract
{
    /**
     * @api
     */
    public PoiRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PoiRawService($client);
    }

    /**
     * @api
     *
     * Used to fetch a list of POIs (sites) within a geographic boundary or near a specific latitude/longitude. This is the primary method for most applications and services to consume data from Open Charge Map.
     *
     * @param list<mixed> $boundingbox Filter results to a given bounding box. specify top left and bottom right box corners as: (lat,lng),(lat2,lng2)
     * @param bool $camelcase set to true to get a property names in camelCase format
     * @param string $chargepointid Exact match on a given OCM POI ID (comma separated list)
     * @param string $client String to identify your client application. Optional but recommended to distinguish your client from other bots/crawlers
     * @param bool $compact set to true to remove reference data objects from output (just returns IDs for common reference data such as DataProvider etc)
     * @param list<mixed> $connectiontypeid Exact match on a given connection type id (comma separated list)
     * @param string $countrycode 2-character ISO Country code to filter to one specific country
     * @param list<string> $countryid Exact match on a given numeric country id (comma separated list)
     * @param list<mixed> $dataproviderid exact match on a given data provider id id (comma separated list)
     * @param float $distance Optionally filter results by a max distance from the given latitude/longitude
     * @param string $distanceunit `miles` or `km` distance unit
     * @param string $greaterthanid Filter to items with ID greater than given value
     * @param bool $includecomments If true, user comments and media items will be include in result set
     * @param int $latitude Latitude for distance calculation and filtering
     * @param list<mixed> $levelid Exact match on a given charging level (1-3) id (comma separated list)
     * @param float $longitude Longitude for distance calculation and filtering
     * @param int $maxresults Limit on max number of results returned
     * @param string $modifiedsince Filter to results modified after the given date
     * @param bool $opendata use opendata=true for only OCM provided ("Open") data
     * @param list<mixed> $operatorid Exact match on a given EVSE operator id (comma separated list)
     * @param string $output optional output format `json`,`geojson`,`xml`,`csv`, JSON is the default and recommended as the highest fidelity
     * @param string $polygon Filter results within a given Polygon. Specify an encoded polyline for the polygon shape. Polygon will be automatically closed from the last point to the first point.
     * @param string $polyline Filter results along an encoded polyline, use with distance param to increase search distance along line. Polyline is expanded into a polygon to cover the search distance.
     * @param string $sortby Default sort order is based on spatial index but you can optionally sort by  `modified_asc` for results in order of modification (oldest to newest), or ` id_asc` for results in order of ID
     * @param list<mixed> $statustypeid Exact match on a given status type id (comma separated list)
     * @param list<mixed> $usagetypeid Exact match on a given usage type id (comma separated list)
     * @param bool $verbose set to false to get a smaller result set with null items removed
     * @param RequestOpts|null $requestOptions
     *
     * @return list<PoiListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?array $boundingbox = null,
        bool $camelcase = false,
        ?string $chargepointid = null,
        ?string $client = null,
        ?bool $compact = null,
        ?array $connectiontypeid = null,
        ?string $countrycode = null,
        ?array $countryid = null,
        ?array $dataproviderid = null,
        ?float $distance = null,
        string $distanceunit = 'Miles',
        ?string $greaterthanid = null,
        ?bool $includecomments = null,
        ?int $latitude = null,
        ?array $levelid = null,
        ?float $longitude = null,
        int $maxresults = 100,
        ?string $modifiedsince = null,
        ?bool $opendata = null,
        ?array $operatorid = null,
        string $output = 'json',
        ?string $polygon = null,
        ?string $polyline = null,
        ?string $sortby = null,
        ?array $statustypeid = null,
        ?array $usagetypeid = null,
        ?bool $verbose = null,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'boundingbox' => $boundingbox,
                'camelcase' => $camelcase,
                'chargepointid' => $chargepointid,
                'client' => $client,
                'compact' => $compact,
                'connectiontypeid' => $connectiontypeid,
                'countrycode' => $countrycode,
                'countryid' => $countryid,
                'dataproviderid' => $dataproviderid,
                'distance' => $distance,
                'distanceunit' => $distanceunit,
                'greaterthanid' => $greaterthanid,
                'includecomments' => $includecomments,
                'latitude' => $latitude,
                'levelid' => $levelid,
                'longitude' => $longitude,
                'maxresults' => $maxresults,
                'modifiedsince' => $modifiedsince,
                'opendata' => $opendata,
                'operatorid' => $operatorid,
                'output' => $output,
                'polygon' => $polygon,
                'polyline' => $polyline,
                'sortby' => $sortby,
                'statustypeid' => $statustypeid,
                'usagetypeid' => $usagetypeid,
                'verbose' => $verbose,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
