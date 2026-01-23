<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Poi\PoiListResponseItem\MediaItem\User;

/**
 * A user submitted media item related to a specific charge point or site. Currently always an image.
 *
 * @phpstan-import-type UserShape from \Ocm\Poi\PoiListResponseItem\MediaItem\User
 *
 * @phpstan-type MediaItemShape = array{
 *   chargePointID?: string|null,
 *   comment?: string|null,
 *   dateCreated?: string|null,
 *   id?: string|null,
 *   isEnabled?: bool|null,
 *   isExternalResource?: bool|null,
 *   isFeaturedItem?: bool|null,
 *   isVideo?: bool|null,
 *   itemThumbnailURL?: string|null,
 *   itemURL?: string|null,
 *   user?: null|User|UserShape,
 * }
 */
final class MediaItem implements BaseModel
{
    /** @use SdkModel<MediaItemShape> */
    use SdkModel;

    #[Optional('ChargePointID')]
    public ?string $chargePointID;

    #[Optional('Comment')]
    public ?string $comment;

    #[Optional('DateCreated')]
    public ?string $dateCreated;

    #[Optional('ID')]
    public ?string $id;

    #[Optional('IsEnabled')]
    public ?bool $isEnabled;

    #[Optional('IsExternalResource')]
    public ?bool $isExternalResource;

    #[Optional('IsFeaturedItem')]
    public ?bool $isFeaturedItem;

    #[Optional('IsVideo')]
    public ?bool $isVideo;

    #[Optional('ItemThumbnailURL')]
    public ?string $itemThumbnailURL;

    #[Optional('ItemURL')]
    public ?string $itemURL;

    /**
     * Short public summary profile for a specific Open Charge Map user.
     */
    #[Optional('User')]
    public ?User $user;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param User|UserShape|null $user
     */
    public static function with(
        ?string $chargePointID = null,
        ?string $comment = null,
        ?string $dateCreated = null,
        ?string $id = null,
        ?bool $isEnabled = null,
        ?bool $isExternalResource = null,
        ?bool $isFeaturedItem = null,
        ?bool $isVideo = null,
        ?string $itemThumbnailURL = null,
        ?string $itemURL = null,
        User|array|null $user = null,
    ): self {
        $self = new self;

        null !== $chargePointID && $self['chargePointID'] = $chargePointID;
        null !== $comment && $self['comment'] = $comment;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $id && $self['id'] = $id;
        null !== $isEnabled && $self['isEnabled'] = $isEnabled;
        null !== $isExternalResource && $self['isExternalResource'] = $isExternalResource;
        null !== $isFeaturedItem && $self['isFeaturedItem'] = $isFeaturedItem;
        null !== $isVideo && $self['isVideo'] = $isVideo;
        null !== $itemThumbnailURL && $self['itemThumbnailURL'] = $itemThumbnailURL;
        null !== $itemURL && $self['itemURL'] = $itemURL;
        null !== $user && $self['user'] = $user;

        return $self;
    }

    public function withChargePointID(string $chargePointID): self
    {
        $self = clone $this;
        $self['chargePointID'] = $chargePointID;

        return $self;
    }

    public function withComment(string $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }

    public function withDateCreated(string $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $self = clone $this;
        $self['isEnabled'] = $isEnabled;

        return $self;
    }

    public function withIsExternalResource(bool $isExternalResource): self
    {
        $self = clone $this;
        $self['isExternalResource'] = $isExternalResource;

        return $self;
    }

    public function withIsFeaturedItem(bool $isFeaturedItem): self
    {
        $self = clone $this;
        $self['isFeaturedItem'] = $isFeaturedItem;

        return $self;
    }

    public function withIsVideo(bool $isVideo): self
    {
        $self = clone $this;
        $self['isVideo'] = $isVideo;

        return $self;
    }

    public function withItemThumbnailURL(string $itemThumbnailURL): self
    {
        $self = clone $this;
        $self['itemThumbnailURL'] = $itemThumbnailURL;

        return $self;
    }

    public function withItemURL(string $itemURL): self
    {
        $self = clone $this;
        $self['itemURL'] = $itemURL;

        return $self;
    }

    /**
     * Short public summary profile for a specific Open Charge Map user.
     *
     * @param User|UserShape $user
     */
    public function withUser(User|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
