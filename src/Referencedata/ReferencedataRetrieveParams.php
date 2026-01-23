<?php

declare(strict_types=1);

namespace Ocm\Referencedata;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Concerns\SdkParams;
use Ocm\Core\Contracts\BaseModel;

/**
 * Returns the core reference data used for looking up IDs such as Connection Types, Operators, Countries etc.
 *
 * This information is useful for UIs such as editing systems or for fetching results in the lighter non-verbose mode, then hydrating POI results back into complex objects.
 *
 * @see Ocm\Services\ReferencedataService::retrieve()
 *
 * @phpstan-type ReferencedataRetrieveParamsShape = array{
 *   countryid?: list<mixed>|null
 * }
 */
final class ReferencedataRetrieveParams implements BaseModel
{
    /** @use SdkModel<ReferencedataRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional filter on countryid, exact match on a given numeric country id (comma separated list).
     *
     * @var list<mixed>|null $countryid
     */
    #[Optional(list: 'mixed')]
    public ?array $countryid;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $countryid
     */
    public static function with(?array $countryid = null): self
    {
        $self = new self;

        null !== $countryid && $self['countryid'] = $countryid;

        return $self;
    }

    /**
     * Optional filter on countryid, exact match on a given numeric country id (comma separated list).
     *
     * @param list<mixed> $countryid
     */
    public function withCountryid(array $countryid): self
    {
        $self = clone $this;
        $self['countryid'] = $countryid;

        return $self;
    }
}
