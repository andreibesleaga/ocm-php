<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem\UserComment;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Category for a user comment, e.g. General Comment, Fault Report (Notice To Users And Operator).
 *
 * @phpstan-type CommentTypeShape = array{id?: int|null, title?: string|null}
 */
final class CommentType implements BaseModel
{
    /** @use SdkModel<CommentTypeShape> */
    use SdkModel;

    #[Optional('ID')]
    public ?int $id;

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
    public static function with(?int $id = null, ?string $title = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
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
