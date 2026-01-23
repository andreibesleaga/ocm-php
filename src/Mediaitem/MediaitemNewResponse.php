<?php

declare(strict_types=1);

namespace Ocm\Mediaitem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaitemNewResponseShape = array{
 *   status: string, description?: string|null
 * }
 */
final class MediaitemNewResponse implements BaseModel
{
    /** @use SdkModel<MediaitemNewResponseShape> */
    use SdkModel;

    /**
     * status code OK.
     */
    #[Required]
    public string $status;

    #[Optional]
    public ?string $description;

    /**
     * `new MediaitemNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaitemNewResponse::with(status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaitemNewResponse)->withStatus(...)
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
        string $status,
        ?string $description = null
    ): self {
        $self = new self;

        $self['status'] = $status;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * status code OK.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
