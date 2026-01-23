<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem\Connection;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Indicates the EVSE power supply type e.g. DC (Direct Current), AC (Single Phase), AC (3 Phase).
 *
 * @phpstan-type CurrentTypeShape = array{id: int, title?: string|null}
 */
final class CurrentType implements BaseModel
{
    /** @use SdkModel<CurrentTypeShape> */
    use SdkModel;

    #[Required('ID')]
    public int $id;

    #[Optional('Title')]
    public ?string $title;

    /**
     * `new CurrentType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrentType::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrentType)->withID(...)
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
    public static function with(int $id, ?string $title = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
