<?php

declare(strict_types=1);

namespace Ocm\Referencedata\ReferencedataGetResponse;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Classification for the users comment or experience using a specific charging location.
 *
 * @phpstan-type CheckinStatusTypeShape = array{
 *   id: int, isAutomatedCheckin: bool, isPositive?: bool|null, title?: string|null
 * }
 */
final class CheckinStatusType implements BaseModel
{
    /** @use SdkModel<CheckinStatusTypeShape> */
    use SdkModel;

    #[Required('ID')]
    public int $id;

    /**
     * If true, checkin or comment was provided by an automated system.
     */
    #[Required('IsAutomatedCheckin')]
    public bool $isAutomatedCheckin;

    /**
     * If true, this type of checkin/comment is considered positive.
     */
    #[Optional('IsPositive')]
    public ?bool $isPositive;

    #[Optional('Title')]
    public ?string $title;

    /**
     * `new CheckinStatusType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckinStatusType::with(id: ..., isAutomatedCheckin: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckinStatusType)->withID(...)->withIsAutomatedCheckin(...)
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
        bool $isAutomatedCheckin,
        ?bool $isPositive = null,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['isAutomatedCheckin'] = $isAutomatedCheckin;

        null !== $isPositive && $self['isPositive'] = $isPositive;
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
     * If true, checkin or comment was provided by an automated system.
     */
    public function withIsAutomatedCheckin(bool $isAutomatedCheckin): self
    {
        $self = clone $this;
        $self['isAutomatedCheckin'] = $isAutomatedCheckin;

        return $self;
    }

    /**
     * If true, this type of checkin/comment is considered positive.
     */
    public function withIsPositive(bool $isPositive): self
    {
        $self = clone $this;
        $self['isPositive'] = $isPositive;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
