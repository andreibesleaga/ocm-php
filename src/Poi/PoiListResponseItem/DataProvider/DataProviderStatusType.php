<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem\DataProvider;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Status object describing whether this data provider is currently enabled and the type of source (manual entry, imported etc).
 *
 * @phpstan-type DataProviderStatusTypeShape = array{
 *   id: int, isProviderEnabled: bool, description?: string|null
 * }
 */
final class DataProviderStatusType implements BaseModel
{
    /** @use SdkModel<DataProviderStatusTypeShape> */
    use SdkModel;

    /**
     * The reference ID for this provider status type.
     */
    #[Required('ID')]
    public int $id;

    /**
     * If false, results from this data provider are not currently enabled.
     */
    #[Required('IsProviderEnabled')]
    public bool $isProviderEnabled;

    /**
     * The Title of this status type.
     */
    #[Optional]
    public ?string $description;

    /**
     * `new DataProviderStatusType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DataProviderStatusType::with(id: ..., isProviderEnabled: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DataProviderStatusType)->withID(...)->withIsProviderEnabled(...)
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
        int $id = 0,
        bool $isProviderEnabled = false,
        ?string $description = null
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['isProviderEnabled'] = $isProviderEnabled;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The reference ID for this provider status type.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * If false, results from this data provider are not currently enabled.
     */
    public function withIsProviderEnabled(bool $isProviderEnabled): self
    {
        $self = clone $this;
        $self['isProviderEnabled'] = $isProviderEnabled;

        return $self;
    }

    /**
     * The Title of this status type.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
