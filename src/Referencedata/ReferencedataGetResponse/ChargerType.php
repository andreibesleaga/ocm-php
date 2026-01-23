<?php

declare(strict_types=1);

namespace Ocm\Referencedata\ReferencedataGetResponse;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * A general category for equipment power capability. Deprecated for general use. Currently computed automatically based on equipment power.
 *
 * @phpstan-type ChargerTypeShape = array{
 *   comments: string, id: int, isFastChargeCapable: bool, title?: string|null
 * }
 */
final class ChargerType implements BaseModel
{
    /** @use SdkModel<ChargerTypeShape> */
    use SdkModel;

    #[Required('Comments')]
    public string $comments;

    #[Required('ID')]
    public int $id;

    /**
     * If true, this level is considered 'fast' charging, relative to other levels.
     */
    #[Required('IsFastChargeCapable')]
    public bool $isFastChargeCapable;

    #[Optional('Title')]
    public ?string $title;

    /**
     * `new ChargerType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargerType::with(comments: ..., id: ..., isFastChargeCapable: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChargerType)->withComments(...)->withID(...)->withIsFastChargeCapable(...)
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
        string $comments,
        int $id,
        bool $isFastChargeCapable,
        ?string $title = null
    ): self {
        $self = new self;

        $self['comments'] = $comments;
        $self['id'] = $id;
        $self['isFastChargeCapable'] = $isFastChargeCapable;

        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withComments(string $comments): self
    {
        $self = clone $this;
        $self['comments'] = $comments;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * If true, this level is considered 'fast' charging, relative to other levels.
     */
    public function withIsFastChargeCapable(bool $isFastChargeCapable): self
    {
        $self = clone $this;
        $self['isFastChargeCapable'] = $isFastChargeCapable;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
