<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * The Usage Type of a site indicates the general restrictions on usage.
 *
 * @phpstan-type UsageTypeShape = array{
 *   id: int,
 *   isAccessKeyRequired: bool,
 *   isMembershipRequired: bool,
 *   isPayAtLocation: bool,
 *   title?: string|null,
 * }
 */
final class UsageType implements BaseModel
{
    /** @use SdkModel<UsageTypeShape> */
    use SdkModel;

    #[Required('ID')]
    public int $id;

    /**
     * @deprecated
     *
     * If true this usage required a physical access key
     */
    #[Required('IsAccessKeyRequired')]
    public bool $isAccessKeyRequired;

    /**
     * If true, this usage type requires registration or membership with a service.
     */
    #[Required('IsMembershipRequired')]
    public bool $isMembershipRequired;

    /**
     * If true, usage requires paying at location.
     */
    #[Required('IsPayAtLocation')]
    public bool $isPayAtLocation;

    #[Optional('Title')]
    public ?string $title;

    /**
     * `new UsageType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageType::with(
     *   id: ...,
     *   isAccessKeyRequired: ...,
     *   isMembershipRequired: ...,
     *   isPayAtLocation: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageType)
     *   ->withID(...)
     *   ->withIsAccessKeyRequired(...)
     *   ->withIsMembershipRequired(...)
     *   ->withIsPayAtLocation(...)
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
        int $id,
        bool $isAccessKeyRequired,
        bool $isMembershipRequired,
        bool $isPayAtLocation,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['isAccessKeyRequired'] = $isAccessKeyRequired;
        $self['isMembershipRequired'] = $isMembershipRequired;
        $self['isPayAtLocation'] = $isPayAtLocation;

        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * If true this usage required a physical access key.
     */
    public function withIsAccessKeyRequired(bool $isAccessKeyRequired): self
    {
        $self = clone $this;
        $self['isAccessKeyRequired'] = $isAccessKeyRequired;

        return $self;
    }

    /**
     * If true, this usage type requires registration or membership with a service.
     */
    public function withIsMembershipRequired(bool $isMembershipRequired): self
    {
        $self = clone $this;
        $self['isMembershipRequired'] = $isMembershipRequired;

        return $self;
    }

    /**
     * If true, usage requires paying at location.
     */
    public function withIsPayAtLocation(bool $isPayAtLocation): self
    {
        $self = clone $this;
        $self['isPayAtLocation'] = $isPayAtLocation;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
