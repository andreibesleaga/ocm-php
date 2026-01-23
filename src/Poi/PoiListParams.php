<?php

declare(strict_types=1);

namespace Ocm\Poi;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Concerns\SdkParams;
use Ocm\Core\Contracts\BaseModel;

/**
 * Used to fetch a list of POIs (sites) within a geographic boundary or near a specific latitude/longitude. This is the primary method for most applications and services to consume data from Open Charge Map.
 *
 * @see Ocm\Services\PoiService::list()
 *
 * @phpstan-type PoiListParamsShape = array{
 *   boundingbox?: list<mixed>|null,
 *   camelcase?: bool|null,
 *   chargepointid?: string|null,
 *   client?: string|null,
 *   compact?: bool|null,
 *   connectiontypeid?: list<mixed>|null,
 *   countrycode?: string|null,
 *   countryid?: list<string>|null,
 *   dataproviderid?: list<mixed>|null,
 *   distance?: float|null,
 *   distanceunit?: string|null,
 *   greaterthanid?: string|null,
 *   includecomments?: bool|null,
 *   latitude?: int|null,
 *   levelid?: list<mixed>|null,
 *   longitude?: float|null,
 *   maxresults?: int|null,
 *   modifiedsince?: string|null,
 *   opendata?: bool|null,
 *   operatorid?: list<mixed>|null,
 *   output?: string|null,
 *   polygon?: string|null,
 *   polyline?: string|null,
 *   sortby?: string|null,
 *   statustypeid?: list<mixed>|null,
 *   usagetypeid?: list<mixed>|null,
 *   verbose?: bool|null,
 * }
 */
final class PoiListParams implements BaseModel
{
    /** @use SdkModel<PoiListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter results to a given bounding box. specify top left and bottom right box corners as: (lat,lng),(lat2,lng2).
     *
     * @var list<mixed>|null $boundingbox
     */
    #[Optional(list: 'mixed')]
    public ?array $boundingbox;

    /**
     * Set to true to get a property names in camelCase format.
     */
    #[Optional]
    public ?bool $camelcase;

    /**
     * Exact match on a given OCM POI ID (comma separated list).
     */
    #[Optional]
    public ?string $chargepointid;

    /**
     * String to identify your client application. Optional but recommended to distinguish your client from other bots/crawlers.
     */
    #[Optional]
    public ?string $client;

    /**
     * Set to true to remove reference data objects from output (just returns IDs for common reference data such as DataProvider etc).
     */
    #[Optional]
    public ?bool $compact;

    /**
     * Exact match on a given connection type id (comma separated list).
     *
     * @var list<mixed>|null $connectiontypeid
     */
    #[Optional(list: 'mixed')]
    public ?array $connectiontypeid;

    /**
     * 2-character ISO Country code to filter to one specific country.
     */
    #[Optional]
    public ?string $countrycode;

    /**
     * Exact match on a given numeric country id (comma separated list).
     *
     * @var list<string>|null $countryid
     */
    #[Optional(list: 'string')]
    public ?array $countryid;

    /**
     * Exact match on a given data provider id id (comma separated list).
     *
     * @var list<mixed>|null $dataproviderid
     */
    #[Optional(list: 'mixed')]
    public ?array $dataproviderid;

    /**
     * Optionally filter results by a max distance from the given latitude/longitude.
     */
    #[Optional]
    public ?float $distance;

    /**
     * `miles` or `km` distance unit.
     */
    #[Optional]
    public ?string $distanceunit;

    /**
     * Filter to items with ID greater than given value.
     */
    #[Optional]
    public ?string $greaterthanid;

    /**
     * If true, user comments and media items will be include in result set.
     */
    #[Optional]
    public ?bool $includecomments;

    /**
     * Latitude for distance calculation and filtering.
     */
    #[Optional]
    public ?int $latitude;

    /**
     * Exact match on a given charging level (1-3) id (comma separated list).
     *
     * @var list<mixed>|null $levelid
     */
    #[Optional(list: 'mixed')]
    public ?array $levelid;

    /**
     * Longitude for distance calculation and filtering.
     */
    #[Optional]
    public ?float $longitude;

    /**
     * Limit on max number of results returned.
     */
    #[Optional]
    public ?int $maxresults;

    /**
     * Filter to results modified after the given date.
     */
    #[Optional]
    public ?string $modifiedsince;

    /**
     * Use opendata=true for only OCM provided ("Open") data.
     */
    #[Optional]
    public ?bool $opendata;

    /**
     * Exact match on a given EVSE operator id (comma separated list).
     *
     * @var list<mixed>|null $operatorid
     */
    #[Optional(list: 'mixed')]
    public ?array $operatorid;

    /**
     * Optional output format `json`,`geojson`,`xml`,`csv`, JSON is the default and recommended as the highest fidelity.
     */
    #[Optional]
    public ?string $output;

    /**
     * Filter results within a given Polygon. Specify an encoded polyline for the polygon shape. Polygon will be automatically closed from the last point to the first point.
     */
    #[Optional]
    public ?string $polygon;

    /**
     * Filter results along an encoded polyline, use with distance param to increase search distance along line. Polyline is expanded into a polygon to cover the search distance.
     */
    #[Optional]
    public ?string $polyline;

    /**
     * Default sort order is based on spatial index but you can optionally sort by  `modified_asc` for results in order of modification (oldest to newest), or ` id_asc` for results in order of ID.
     */
    #[Optional]
    public ?string $sortby;

    /**
     * Exact match on a given status type id (comma separated list).
     *
     * @var list<mixed>|null $statustypeid
     */
    #[Optional(list: 'mixed')]
    public ?array $statustypeid;

    /**
     * Exact match on a given usage type id (comma separated list).
     *
     * @var list<mixed>|null $usagetypeid
     */
    #[Optional(list: 'mixed')]
    public ?array $usagetypeid;

    /**
     * Set to false to get a smaller result set with null items removed.
     */
    #[Optional]
    public ?bool $verbose;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $boundingbox
     * @param list<mixed>|null $connectiontypeid
     * @param list<string>|null $countryid
     * @param list<mixed>|null $dataproviderid
     * @param list<mixed>|null $levelid
     * @param list<mixed>|null $operatorid
     * @param list<mixed>|null $statustypeid
     * @param list<mixed>|null $usagetypeid
     */
    public static function with(
        ?array $boundingbox = null,
        ?bool $camelcase = null,
        ?string $chargepointid = null,
        ?string $client = null,
        ?bool $compact = null,
        ?array $connectiontypeid = null,
        ?string $countrycode = null,
        ?array $countryid = null,
        ?array $dataproviderid = null,
        ?float $distance = null,
        ?string $distanceunit = null,
        ?string $greaterthanid = null,
        ?bool $includecomments = null,
        ?int $latitude = null,
        ?array $levelid = null,
        ?float $longitude = null,
        ?int $maxresults = null,
        ?string $modifiedsince = null,
        ?bool $opendata = null,
        ?array $operatorid = null,
        ?string $output = null,
        ?string $polygon = null,
        ?string $polyline = null,
        ?string $sortby = null,
        ?array $statustypeid = null,
        ?array $usagetypeid = null,
        ?bool $verbose = null,
    ): self {
        $self = new self;

        null !== $boundingbox && $self['boundingbox'] = $boundingbox;
        null !== $camelcase && $self['camelcase'] = $camelcase;
        null !== $chargepointid && $self['chargepointid'] = $chargepointid;
        null !== $client && $self['client'] = $client;
        null !== $compact && $self['compact'] = $compact;
        null !== $connectiontypeid && $self['connectiontypeid'] = $connectiontypeid;
        null !== $countrycode && $self['countrycode'] = $countrycode;
        null !== $countryid && $self['countryid'] = $countryid;
        null !== $dataproviderid && $self['dataproviderid'] = $dataproviderid;
        null !== $distance && $self['distance'] = $distance;
        null !== $distanceunit && $self['distanceunit'] = $distanceunit;
        null !== $greaterthanid && $self['greaterthanid'] = $greaterthanid;
        null !== $includecomments && $self['includecomments'] = $includecomments;
        null !== $latitude && $self['latitude'] = $latitude;
        null !== $levelid && $self['levelid'] = $levelid;
        null !== $longitude && $self['longitude'] = $longitude;
        null !== $maxresults && $self['maxresults'] = $maxresults;
        null !== $modifiedsince && $self['modifiedsince'] = $modifiedsince;
        null !== $opendata && $self['opendata'] = $opendata;
        null !== $operatorid && $self['operatorid'] = $operatorid;
        null !== $output && $self['output'] = $output;
        null !== $polygon && $self['polygon'] = $polygon;
        null !== $polyline && $self['polyline'] = $polyline;
        null !== $sortby && $self['sortby'] = $sortby;
        null !== $statustypeid && $self['statustypeid'] = $statustypeid;
        null !== $usagetypeid && $self['usagetypeid'] = $usagetypeid;
        null !== $verbose && $self['verbose'] = $verbose;

        return $self;
    }

    /**
     * Filter results to a given bounding box. specify top left and bottom right box corners as: (lat,lng),(lat2,lng2).
     *
     * @param list<mixed> $boundingbox
     */
    public function withBoundingbox(array $boundingbox): self
    {
        $self = clone $this;
        $self['boundingbox'] = $boundingbox;

        return $self;
    }

    /**
     * Set to true to get a property names in camelCase format.
     */
    public function withCamelcase(bool $camelcase): self
    {
        $self = clone $this;
        $self['camelcase'] = $camelcase;

        return $self;
    }

    /**
     * Exact match on a given OCM POI ID (comma separated list).
     */
    public function withChargepointid(string $chargepointid): self
    {
        $self = clone $this;
        $self['chargepointid'] = $chargepointid;

        return $self;
    }

    /**
     * String to identify your client application. Optional but recommended to distinguish your client from other bots/crawlers.
     */
    public function withClient(string $client): self
    {
        $self = clone $this;
        $self['client'] = $client;

        return $self;
    }

    /**
     * Set to true to remove reference data objects from output (just returns IDs for common reference data such as DataProvider etc).
     */
    public function withCompact(bool $compact): self
    {
        $self = clone $this;
        $self['compact'] = $compact;

        return $self;
    }

    /**
     * Exact match on a given connection type id (comma separated list).
     *
     * @param list<mixed> $connectiontypeid
     */
    public function withConnectiontypeid(array $connectiontypeid): self
    {
        $self = clone $this;
        $self['connectiontypeid'] = $connectiontypeid;

        return $self;
    }

    /**
     * 2-character ISO Country code to filter to one specific country.
     */
    public function withCountrycode(string $countrycode): self
    {
        $self = clone $this;
        $self['countrycode'] = $countrycode;

        return $self;
    }

    /**
     * Exact match on a given numeric country id (comma separated list).
     *
     * @param list<string> $countryid
     */
    public function withCountryid(array $countryid): self
    {
        $self = clone $this;
        $self['countryid'] = $countryid;

        return $self;
    }

    /**
     * Exact match on a given data provider id id (comma separated list).
     *
     * @param list<mixed> $dataproviderid
     */
    public function withDataproviderid(array $dataproviderid): self
    {
        $self = clone $this;
        $self['dataproviderid'] = $dataproviderid;

        return $self;
    }

    /**
     * Optionally filter results by a max distance from the given latitude/longitude.
     */
    public function withDistance(float $distance): self
    {
        $self = clone $this;
        $self['distance'] = $distance;

        return $self;
    }

    /**
     * `miles` or `km` distance unit.
     */
    public function withDistanceunit(string $distanceunit): self
    {
        $self = clone $this;
        $self['distanceunit'] = $distanceunit;

        return $self;
    }

    /**
     * Filter to items with ID greater than given value.
     */
    public function withGreaterthanid(string $greaterthanid): self
    {
        $self = clone $this;
        $self['greaterthanid'] = $greaterthanid;

        return $self;
    }

    /**
     * If true, user comments and media items will be include in result set.
     */
    public function withIncludecomments(bool $includecomments): self
    {
        $self = clone $this;
        $self['includecomments'] = $includecomments;

        return $self;
    }

    /**
     * Latitude for distance calculation and filtering.
     */
    public function withLatitude(int $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    /**
     * Exact match on a given charging level (1-3) id (comma separated list).
     *
     * @param list<mixed> $levelid
     */
    public function withLevelid(array $levelid): self
    {
        $self = clone $this;
        $self['levelid'] = $levelid;

        return $self;
    }

    /**
     * Longitude for distance calculation and filtering.
     */
    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    /**
     * Limit on max number of results returned.
     */
    public function withMaxresults(int $maxresults): self
    {
        $self = clone $this;
        $self['maxresults'] = $maxresults;

        return $self;
    }

    /**
     * Filter to results modified after the given date.
     */
    public function withModifiedsince(string $modifiedsince): self
    {
        $self = clone $this;
        $self['modifiedsince'] = $modifiedsince;

        return $self;
    }

    /**
     * Use opendata=true for only OCM provided ("Open") data.
     */
    public function withOpendata(bool $opendata): self
    {
        $self = clone $this;
        $self['opendata'] = $opendata;

        return $self;
    }

    /**
     * Exact match on a given EVSE operator id (comma separated list).
     *
     * @param list<mixed> $operatorid
     */
    public function withOperatorid(array $operatorid): self
    {
        $self = clone $this;
        $self['operatorid'] = $operatorid;

        return $self;
    }

    /**
     * Optional output format `json`,`geojson`,`xml`,`csv`, JSON is the default and recommended as the highest fidelity.
     */
    public function withOutput(string $output): self
    {
        $self = clone $this;
        $self['output'] = $output;

        return $self;
    }

    /**
     * Filter results within a given Polygon. Specify an encoded polyline for the polygon shape. Polygon will be automatically closed from the last point to the first point.
     */
    public function withPolygon(string $polygon): self
    {
        $self = clone $this;
        $self['polygon'] = $polygon;

        return $self;
    }

    /**
     * Filter results along an encoded polyline, use with distance param to increase search distance along line. Polyline is expanded into a polygon to cover the search distance.
     */
    public function withPolyline(string $polyline): self
    {
        $self = clone $this;
        $self['polyline'] = $polyline;

        return $self;
    }

    /**
     * Default sort order is based on spatial index but you can optionally sort by  `modified_asc` for results in order of modification (oldest to newest), or ` id_asc` for results in order of ID.
     */
    public function withSortby(string $sortby): self
    {
        $self = clone $this;
        $self['sortby'] = $sortby;

        return $self;
    }

    /**
     * Exact match on a given status type id (comma separated list).
     *
     * @param list<mixed> $statustypeid
     */
    public function withStatustypeid(array $statustypeid): self
    {
        $self = clone $this;
        $self['statustypeid'] = $statustypeid;

        return $self;
    }

    /**
     * Exact match on a given usage type id (comma separated list).
     *
     * @param list<mixed> $usagetypeid
     */
    public function withUsagetypeid(array $usagetypeid): self
    {
        $self = clone $this;
        $self['usagetypeid'] = $usagetypeid;

        return $self;
    }

    /**
     * Set to false to get a smaller result set with null items removed.
     */
    public function withVerbose(bool $verbose): self
    {
        $self = clone $this;
        $self['verbose'] = $verbose;

        return $self;
    }
}
