<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * The Status Type of a site or equipment item indicates whether it is generally operational.
 *
 * @phpstan-type StatusTypeShape = array{
 *   id: int, isOperational: bool, isUserSelectable: bool, title?: string|null
 * }
 */
final class StatusType implements BaseModel
{
    /** @use SdkModel<StatusTypeShape> */
    use SdkModel;

    #[Required('ID')]
    public int $id;

    #[Required('IsOperational')]
    public bool $isOperational;

    #[Required('IsUserSelectable')]
    public bool $isUserSelectable;

    #[Optional('Title')]
    public ?string $title;

    /**
     * `new StatusType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusType::with(id: ..., isOperational: ..., isUserSelectable: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusType)->withID(...)->withIsOperational(...)->withIsUserSelectable(...)
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
        bool $isOperational = false,
        bool $isUserSelectable = false,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['isOperational'] = $isOperational;
        $self['isUserSelectable'] = $isUserSelectable;

        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIsOperational(bool $isOperational): self
    {
        $self = clone $this;
        $self['isOperational'] = $isOperational;

        return $self;
    }

    public function withIsUserSelectable(bool $isUserSelectable): self
    {
        $self = clone $this;
        $self['isUserSelectable'] = $isUserSelectable;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
