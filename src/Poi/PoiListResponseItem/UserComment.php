<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Poi\PoiListResponseItem\UserComment\CheckinStatusType;
use Ocm\Poi\PoiListResponseItem\UserComment\CommentType;
use Ocm\Poi\PoiListResponseItem\UserComment\User;

/**
 * A user comment or check-in for a specific charging point (POI/Site).
 *
 * @phpstan-import-type CheckinStatusTypeShape from \Ocm\Poi\PoiListResponseItem\UserComment\CheckinStatusType
 * @phpstan-import-type CommentTypeShape from \Ocm\Poi\PoiListResponseItem\UserComment\CommentType
 * @phpstan-import-type UserShape from \Ocm\Poi\PoiListResponseItem\UserComment\User
 *
 * @phpstan-type UserCommentShape = array{
 *   chargePointID?: int|null,
 *   checkinStatusType?: null|CheckinStatusType|CheckinStatusTypeShape,
 *   checkinStatusTypeID?: int|null,
 *   comment?: string|null,
 *   commentType?: null|CommentType|CommentTypeShape,
 *   commentTypeID?: int|null,
 *   dateCreated?: \DateTimeInterface|null,
 *   id?: string|null,
 *   relatedURL?: string|null,
 *   user?: null|User|UserShape,
 *   userName?: string|null,
 * }
 */
final class UserComment implements BaseModel
{
    /** @use SdkModel<UserCommentShape> */
    use SdkModel;

    #[Optional('ChargePointID')]
    public ?int $chargePointID;

    /**
     * Classification for the users comment or experience using a specific charging location.
     */
    #[Optional('CheckinStatusType')]
    public ?CheckinStatusType $checkinStatusType;

    #[Optional('CheckinStatusTypeID')]
    public ?int $checkinStatusTypeID;

    #[Optional('Comment')]
    public ?string $comment;

    /**
     * Category for a user comment, e.g. General Comment, Fault Report (Notice To Users And Operator).
     */
    #[Optional('CommentType')]
    public ?CommentType $commentType;

    #[Optional('CommentTypeID')]
    public ?int $commentTypeID;

    #[Optional('DateCreated')]
    public ?\DateTimeInterface $dateCreated;

    #[Optional('ID')]
    public ?string $id;

    #[Optional('RelatedURL')]
    public ?string $relatedURL;

    /**
     * Short public summary profile for a specific Open Charge Map user.
     */
    #[Optional('User')]
    public ?User $user;

    #[Optional('UserName')]
    public ?string $userName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CheckinStatusType|CheckinStatusTypeShape|null $checkinStatusType
     * @param CommentType|CommentTypeShape|null $commentType
     * @param User|UserShape|null $user
     */
    public static function with(
        ?int $chargePointID = null,
        CheckinStatusType|array|null $checkinStatusType = null,
        ?int $checkinStatusTypeID = null,
        ?string $comment = null,
        CommentType|array|null $commentType = null,
        ?int $commentTypeID = null,
        ?\DateTimeInterface $dateCreated = null,
        ?string $id = null,
        ?string $relatedURL = null,
        User|array|null $user = null,
        ?string $userName = null,
    ): self {
        $self = new self;

        null !== $chargePointID && $self['chargePointID'] = $chargePointID;
        null !== $checkinStatusType && $self['checkinStatusType'] = $checkinStatusType;
        null !== $checkinStatusTypeID && $self['checkinStatusTypeID'] = $checkinStatusTypeID;
        null !== $comment && $self['comment'] = $comment;
        null !== $commentType && $self['commentType'] = $commentType;
        null !== $commentTypeID && $self['commentTypeID'] = $commentTypeID;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $id && $self['id'] = $id;
        null !== $relatedURL && $self['relatedURL'] = $relatedURL;
        null !== $user && $self['user'] = $user;
        null !== $userName && $self['userName'] = $userName;

        return $self;
    }

    public function withChargePointID(int $chargePointID): self
    {
        $self = clone $this;
        $self['chargePointID'] = $chargePointID;

        return $self;
    }

    /**
     * Classification for the users comment or experience using a specific charging location.
     *
     * @param CheckinStatusType|CheckinStatusTypeShape $checkinStatusType
     */
    public function withCheckinStatusType(
        CheckinStatusType|array $checkinStatusType
    ): self {
        $self = clone $this;
        $self['checkinStatusType'] = $checkinStatusType;

        return $self;
    }

    public function withCheckinStatusTypeID(int $checkinStatusTypeID): self
    {
        $self = clone $this;
        $self['checkinStatusTypeID'] = $checkinStatusTypeID;

        return $self;
    }

    public function withComment(string $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }

    /**
     * Category for a user comment, e.g. General Comment, Fault Report (Notice To Users And Operator).
     *
     * @param CommentType|CommentTypeShape $commentType
     */
    public function withCommentType(CommentType|array $commentType): self
    {
        $self = clone $this;
        $self['commentType'] = $commentType;

        return $self;
    }

    public function withCommentTypeID(int $commentTypeID): self
    {
        $self = clone $this;
        $self['commentTypeID'] = $commentTypeID;

        return $self;
    }

    public function withDateCreated(\DateTimeInterface $dateCreated): self
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

    public function withRelatedURL(string $relatedURL): self
    {
        $self = clone $this;
        $self['relatedURL'] = $relatedURL;

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

    public function withUserName(string $userName): self
    {
        $self = clone $this;
        $self['userName'] = $userName;

        return $self;
    }
}
