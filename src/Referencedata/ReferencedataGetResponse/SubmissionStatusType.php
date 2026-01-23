<?php

declare(strict_types=1);

namespace Ocm\Referencedata\ReferencedataGetResponse;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Submission Status object, detailing the POI listing status.
 *
 * @phpstan-type SubmissionStatusTypeShape = array{
 *   id: int, isLive: bool, title?: string|null
 * }
 */
final class SubmissionStatusType implements BaseModel
{
    /** @use SdkModel<SubmissionStatusTypeShape> */
    use SdkModel;

    /**
     * Submission Status Type reference ID.
     */
    #[Required('ID')]
    public int $id;

    /**
     * If true, POI listing is live (not draft or de-listed).
     */
    #[Required('IsLive')]
    public bool $isLive;

    #[Optional('Title')]
    public ?string $title;

    /**
     * `new SubmissionStatusType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubmissionStatusType::with(id: ..., isLive: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubmissionStatusType)->withID(...)->withIsLive(...)
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
        bool $isLive = false,
        ?string $title = null
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['isLive'] = $isLive;

        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * Submission Status Type reference ID.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * If true, POI listing is live (not draft or de-listed).
     */
    public function withIsLive(bool $isLive): self
    {
        $self = clone $this;
        $self['isLive'] = $isLive;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
