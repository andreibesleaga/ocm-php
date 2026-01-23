<?php

declare(strict_types=1);

namespace Ocm\Referencedata\ReferencedataGetResponse\Operator;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Referencedata\Country;

/**
 * Geographic position for site and (nearest) address component information.
 *
 * @phpstan-import-type CountryShape from \Ocm\Referencedata\Country
 *
 * @phpstan-type AddressInfoShape = array{
 *   countryID: int,
 *   id: int,
 *   latitude: float,
 *   longitude: float,
 *   accessComments?: string|null,
 *   addressLine1?: string|null,
 *   addressLine2?: string|null,
 *   contactEmail?: string|null,
 *   contactTelephone1?: string|null,
 *   contactTelephone2?: string|null,
 *   country?: null|Country|CountryShape,
 *   distance?: float|null,
 *   distanceUnit?: int|null,
 *   postcode?: string|null,
 *   relatedURL?: string|null,
 *   stateOrProvince?: string|null,
 *   title?: string|null,
 *   town?: string|null,
 * }
 */
final class AddressInfo implements BaseModel
{
    /** @use SdkModel<AddressInfoShape> */
    use SdkModel;

    /**
     * The reference ID for the Country.
     */
    #[Required('CountryID')]
    public int $countryID;

    /**
     * ID.
     */
    #[Required('ID')]
    public int $id;

    /**
     * Site latitude coordinate in decimal degrees.
     */
    #[Required('Latitude')]
    public float $latitude;

    /**
     * Site longitude coordinate in decimal degrees.
     */
    #[Required('Longitude')]
    public float $longitude;

    /**
     * Guidance for users to use or find the equipment.
     */
    #[Optional('AccessComments')]
    public ?string $accessComments;

    /**
     * First line of nearby street address.
     */
    #[Optional('AddressLine1')]
    public ?string $addressLine1;

    /**
     * Second line of nearby street address.
     */
    #[Optional('AddressLine2')]
    public ?string $addressLine2;

    /**
     * Primary contact email.
     */
    #[Optional('ContactEmail')]
    public ?string $contactEmail;

    /**
     * Primary contact number.
     */
    #[Optional('ContactTelephone1')]
    public ?string $contactTelephone1;

    /**
     * Secondary contact number.
     */
    #[Optional('ContactTelephone2')]
    public ?string $contactTelephone2;

    /**
     * Country details.
     */
    #[Optional('Country')]
    public ?Country $country;

    /**
     * Distance from search location, if search is around a point.
     */
    #[Optional('Distance')]
    public ?float $distance;

    /**
     * Unit used for distance, 1= Miles, 2 = KM.
     */
    #[Optional('DistanceUnit')]
    public ?int $distanceUnit;

    /**
     * Postal code or Zipcode.
     */
    #[Optional('Postcode')]
    public ?string $postcode;

    /**
     * Optional website for more information.
     */
    #[Optional('RelatedURL')]
    public ?string $relatedURL;

    /**
     * State or Province.
     */
    #[Optional('StateOrProvince')]
    public ?string $stateOrProvince;

    /**
     * General title for this location to aid user.
     */
    #[Optional('Title')]
    public ?string $title;

    /**
     * Town or City.
     */
    #[Optional('Town')]
    public ?string $town;

    /**
     * `new AddressInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AddressInfo::with(countryID: ..., id: ..., latitude: ..., longitude: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AddressInfo)
     *   ->withCountryID(...)
     *   ->withID(...)
     *   ->withLatitude(...)
     *   ->withLongitude(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Country|CountryShape|null $country
     */
    public static function with(
        int $countryID,
        int $id = 0,
        float $latitude = 0,
        float $longitude = 0,
        ?string $accessComments = null,
        ?string $addressLine1 = null,
        ?string $addressLine2 = null,
        ?string $contactEmail = null,
        ?string $contactTelephone1 = null,
        ?string $contactTelephone2 = null,
        Country|array|null $country = null,
        ?float $distance = null,
        ?int $distanceUnit = null,
        ?string $postcode = null,
        ?string $relatedURL = null,
        ?string $stateOrProvince = null,
        ?string $title = null,
        ?string $town = null,
    ): self {
        $self = new self;

        $self['countryID'] = $countryID;
        $self['id'] = $id;
        $self['latitude'] = $latitude;
        $self['longitude'] = $longitude;

        null !== $accessComments && $self['accessComments'] = $accessComments;
        null !== $addressLine1 && $self['addressLine1'] = $addressLine1;
        null !== $addressLine2 && $self['addressLine2'] = $addressLine2;
        null !== $contactEmail && $self['contactEmail'] = $contactEmail;
        null !== $contactTelephone1 && $self['contactTelephone1'] = $contactTelephone1;
        null !== $contactTelephone2 && $self['contactTelephone2'] = $contactTelephone2;
        null !== $country && $self['country'] = $country;
        null !== $distance && $self['distance'] = $distance;
        null !== $distanceUnit && $self['distanceUnit'] = $distanceUnit;
        null !== $postcode && $self['postcode'] = $postcode;
        null !== $relatedURL && $self['relatedURL'] = $relatedURL;
        null !== $stateOrProvince && $self['stateOrProvince'] = $stateOrProvince;
        null !== $title && $self['title'] = $title;
        null !== $town && $self['town'] = $town;

        return $self;
    }

    /**
     * The reference ID for the Country.
     */
    public function withCountryID(int $countryID): self
    {
        $self = clone $this;
        $self['countryID'] = $countryID;

        return $self;
    }

    /**
     * ID.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Site latitude coordinate in decimal degrees.
     */
    public function withLatitude(float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    /**
     * Site longitude coordinate in decimal degrees.
     */
    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    /**
     * Guidance for users to use or find the equipment.
     */
    public function withAccessComments(string $accessComments): self
    {
        $self = clone $this;
        $self['accessComments'] = $accessComments;

        return $self;
    }

    /**
     * First line of nearby street address.
     */
    public function withAddressLine1(string $addressLine1): self
    {
        $self = clone $this;
        $self['addressLine1'] = $addressLine1;

        return $self;
    }

    /**
     * Second line of nearby street address.
     */
    public function withAddressLine2(string $addressLine2): self
    {
        $self = clone $this;
        $self['addressLine2'] = $addressLine2;

        return $self;
    }

    /**
     * Primary contact email.
     */
    public function withContactEmail(string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    /**
     * Primary contact number.
     */
    public function withContactTelephone1(string $contactTelephone1): self
    {
        $self = clone $this;
        $self['contactTelephone1'] = $contactTelephone1;

        return $self;
    }

    /**
     * Secondary contact number.
     */
    public function withContactTelephone2(string $contactTelephone2): self
    {
        $self = clone $this;
        $self['contactTelephone2'] = $contactTelephone2;

        return $self;
    }

    /**
     * Country details.
     *
     * @param Country|CountryShape $country
     */
    public function withCountry(Country|array $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Distance from search location, if search is around a point.
     */
    public function withDistance(float $distance): self
    {
        $self = clone $this;
        $self['distance'] = $distance;

        return $self;
    }

    /**
     * Unit used for distance, 1= Miles, 2 = KM.
     */
    public function withDistanceUnit(int $distanceUnit): self
    {
        $self = clone $this;
        $self['distanceUnit'] = $distanceUnit;

        return $self;
    }

    /**
     * Postal code or Zipcode.
     */
    public function withPostcode(string $postcode): self
    {
        $self = clone $this;
        $self['postcode'] = $postcode;

        return $self;
    }

    /**
     * Optional website for more information.
     */
    public function withRelatedURL(string $relatedURL): self
    {
        $self = clone $this;
        $self['relatedURL'] = $relatedURL;

        return $self;
    }

    /**
     * State or Province.
     */
    public function withStateOrProvince(string $stateOrProvince): self
    {
        $self = clone $this;
        $self['stateOrProvince'] = $stateOrProvince;

        return $self;
    }

    /**
     * General title for this location to aid user.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Town or City.
     */
    public function withTown(string $town): self
    {
        $self = clone $this;
        $self['town'] = $town;

        return $self;
    }
}
