<?php

declare(strict_types=1);

namespace Ocm\Profile;

use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Profile\ProfileAuthenticateResponse\Data;
use Ocm\Profile\ProfileAuthenticateResponse\Metadata;

/**
 * @phpstan-import-type DataShape from \Ocm\Profile\ProfileAuthenticateResponse\Data
 * @phpstan-import-type MetadataShape from \Ocm\Profile\ProfileAuthenticateResponse\Metadata
 *
 * @phpstan-type ProfileAuthenticateResponseShape = array{
 *   data: Data|DataShape, metadata: Metadata|MetadataShape
 * }
 */
final class ProfileAuthenticateResponse implements BaseModel
{
    /** @use SdkModel<ProfileAuthenticateResponseShape> */
    use SdkModel;

    #[Required('Data')]
    public Data $data;

    #[Required('Metadata')]
    public Metadata $metadata;

    /**
     * `new ProfileAuthenticateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileAuthenticateResponse::with(data: ..., metadata: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileAuthenticateResponse)->withData(...)->withMetadata(...)
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
     *
     * @param Data|DataShape $data
     * @param Metadata|MetadataShape $metadata
     */
    public static function with(
        Data|array $data,
        Metadata|array $metadata
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
