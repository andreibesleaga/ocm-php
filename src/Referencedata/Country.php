<?php

declare(strict_types=1);

namespace Ocm\Referencedata;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Country details.
 *
 * @phpstan-type CountryShape = array{
 *   continentCode: string, id: int, isoCode: string, title?: string|null
 * }
 */
final class Country implements BaseModel
{
    /** @use SdkModel<CountryShape> */
    use SdkModel;

    /**
     * The Continentcode Schema.
     */
    #[Required('ContinentCode')]
    public string $continentCode;

    /**
     * The Id Schema.
     */
    #[Required('ID')]
    public int $id;

    /**
     * The Isocode Schema.
     */
    #[Required('ISOCode')]
    public string $isoCode;

    /**
     * The Title Schema.
     */
    #[Optional('Title')]
    public ?string $title;

    /**
     * `new Country()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Country::with(continentCode: ..., id: ..., isoCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Country)->withContinentCode(...)->withID(...)->withISOCode(...)
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
     */
    public static function with(
        string $continentCode = '',
        int $id = 0,
        string $isoCode = '',
        ?string $title = null,
    ): self {
        $self = new self;

        $self['continentCode'] = $continentCode;
        $self['id'] = $id;
        $self['isoCode'] = $isoCode;

        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * The Continentcode Schema.
     */
    public function withContinentCode(string $continentCode): self
    {
        $self = clone $this;
        $self['continentCode'] = $continentCode;

        return $self;
    }

    /**
     * The Id Schema.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The Isocode Schema.
     */
    public function withISOCode(string $isoCode): self
    {
        $self = clone $this;
        $self['isoCode'] = $isoCode;

        return $self;
    }

    /**
     * The Title Schema.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
