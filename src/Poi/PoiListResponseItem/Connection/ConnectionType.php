<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem\Connection;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * The type of end-user connection an EVSE supports.
 *
 * @phpstan-type ConnectionTypeShape = array{
 *   formalName?: string|null,
 *   id?: int|null,
 *   isDiscontinued?: bool|null,
 *   isObsolete?: bool|null,
 *   title?: string|null,
 * }
 */
final class ConnectionType implements BaseModel
{
    /** @use SdkModel<ConnectionTypeShape> */
    use SdkModel;

    /**
     * Formal (standard) name for this connection type.
     */
    #[Optional('FormalName')]
    public ?string $formalName;

    #[Optional('ID')]
    public ?int $id;

    /**
     * If true, this is an discontinued but used connection type.
     */
    #[Optional('IsDiscontinued')]
    public ?bool $isDiscontinued;

    /**
     * If true, this is an obsolete connection type and is unlikely top be present in modern infrastructure.
     */
    #[Optional('IsObsolete')]
    public ?bool $isObsolete;

    #[Optional('Title')]
    public ?string $title;

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
        ?string $formalName = null,
        ?int $id = null,
        ?bool $isDiscontinued = null,
        ?bool $isObsolete = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $formalName && $self['formalName'] = $formalName;
        null !== $id && $self['id'] = $id;
        null !== $isDiscontinued && $self['isDiscontinued'] = $isDiscontinued;
        null !== $isObsolete && $self['isObsolete'] = $isObsolete;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * Formal (standard) name for this connection type.
     */
    public function withFormalName(string $formalName): self
    {
        $self = clone $this;
        $self['formalName'] = $formalName;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * If true, this is an discontinued but used connection type.
     */
    public function withIsDiscontinued(bool $isDiscontinued): self
    {
        $self = clone $this;
        $self['isDiscontinued'] = $isDiscontinued;

        return $self;
    }

    /**
     * If true, this is an obsolete connection type and is unlikely top be present in modern infrastructure.
     */
    public function withIsObsolete(bool $isObsolete): self
    {
        $self = clone $this;
        $self['isObsolete'] = $isObsolete;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
