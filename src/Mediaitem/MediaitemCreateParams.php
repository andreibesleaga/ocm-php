<?php

declare(strict_types=1);

namespace Ocm\Mediaitem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Concerns\SdkParams;
use Ocm\Core\Contracts\BaseModel;

/**
 * Submit a photo for a specific charging location.
 *
 * @see Ocm\Services\MediaitemService::create()
 *
 * @phpstan-type MediaitemCreateParamsShape = array{
 *   chargePointID: int, imageDataBase64: string, comment?: string|null
 * }
 */
final class MediaitemCreateParams implements BaseModel
{
    /** @use SdkModel<MediaitemCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID value for the OCM site (POI) this image relates to.
     */
    #[Required]
    public int $chargePointID;

    /**
     * BASE64 encoded data.
     */
    #[Required]
    public string $imageDataBase64;

    /**
     * Optional description of image or context.
     */
    #[Optional]
    public ?string $comment;

    /**
     * `new MediaitemCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaitemCreateParams::with(chargePointID: ..., imageDataBase64: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaitemCreateParams)->withChargePointID(...)->withImageDataBase64(...)
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
        int $chargePointID,
        string $imageDataBase64,
        ?string $comment = null
    ): self {
        $self = new self;

        $self['chargePointID'] = $chargePointID;
        $self['imageDataBase64'] = $imageDataBase64;

        null !== $comment && $self['comment'] = $comment;

        return $self;
    }

    /**
     * ID value for the OCM site (POI) this image relates to.
     */
    public function withChargePointID(int $chargePointID): self
    {
        $self = clone $this;
        $self['chargePointID'] = $chargePointID;

        return $self;
    }

    /**
     * BASE64 encoded data.
     */
    public function withImageDataBase64(string $imageDataBase64): self
    {
        $self = clone $this;
        $self['imageDataBase64'] = $imageDataBase64;

        return $self;
    }

    /**
     * Optional description of image or context.
     */
    public function withComment(string $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }
}
