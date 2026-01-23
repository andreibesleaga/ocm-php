<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem\MediaItem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Short public summary profile for a specific Open Charge Map user.
 *
 * @phpstan-type UserShape = array{
 *   id?: int|null,
 *   profileImageURL?: string|null,
 *   reputationPoints?: int|null,
 *   username?: string|null,
 * }
 */
final class User implements BaseModel
{
    /** @use SdkModel<UserShape> */
    use SdkModel;

    #[Optional('ID')]
    public ?int $id;

    #[Optional('ProfileImageURL')]
    public ?string $profileImageURL;

    #[Optional('ReputationPoints')]
    public ?int $reputationPoints;

    #[Optional('Username')]
    public ?string $username;

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
        ?int $id = null,
        ?string $profileImageURL = null,
        ?int $reputationPoints = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $profileImageURL && $self['profileImageURL'] = $profileImageURL;
        null !== $reputationPoints && $self['reputationPoints'] = $reputationPoints;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withProfileImageURL(string $profileImageURL): self
    {
        $self = clone $this;
        $self['profileImageURL'] = $profileImageURL;

        return $self;
    }

    public function withReputationPoints(int $reputationPoints): self
    {
        $self = clone $this;
        $self['reputationPoints'] = $reputationPoints;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
