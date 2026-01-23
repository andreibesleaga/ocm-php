<?php

declare(strict_types=1);

namespace Ocm\Comment;

use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * @phpstan-type CommentSubmitResponseShape = array{
 *   description: string, status: string
 * }
 */
final class CommentSubmitResponse implements BaseModel
{
    /** @use SdkModel<CommentSubmitResponseShape> */
    use SdkModel;

    #[Required]
    public string $description;

    #[Required]
    public string $status;

    /**
     * `new CommentSubmitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentSubmitResponse::with(description: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentSubmitResponse)->withDescription(...)->withStatus(...)
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
    public static function with(string $description, string $status): self
    {
        $self = new self;

        $self['description'] = $description;
        $self['status'] = $status;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
