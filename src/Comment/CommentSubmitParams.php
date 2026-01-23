<?php

declare(strict_types=1);

namespace Ocm\Comment;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Concerns\SdkParams;
use Ocm\Core\Contracts\BaseModel;

/**
 * Submit a user comment or checkin for a specific charging location.
 *
 * @see Ocm\Services\CommentService::submit()
 *
 * @phpstan-type CommentSubmitParamsShape = array{
 *   chargePointID: int,
 *   checkinStatusTypeID?: int|null,
 *   comment?: string|null,
 *   commentTypeID?: int|null,
 *   rating?: int|null,
 *   relatedURL?: string|null,
 *   userName?: string|null,
 * }
 */
final class CommentSubmitParams implements BaseModel
{
    /** @use SdkModel<CommentSubmitParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * This must be a valid POI ID.
     */
    #[Required]
    public int $chargePointID;

    /**
     * Optional valid CheckStatusTypeID to indicate overall catgeory and success/failure to use equipment e.g. 10 = Charged Successfully.
     */
    #[Optional]
    public ?int $checkinStatusTypeID;

    /**
     * This is an optional comment to describe the charging experience, may include guidance for future users.
     */
    #[Optional]
    public ?string $comment;

    /**
     * This must be a valid Comment Type ID as per UserCommentTypes found in Core Reference Data. If left as null then General Comment will be used.
     */
    #[Optional]
    public ?int $commentTypeID;

    /**
     * Optional integer rating between 1 = Worst, 5 = Best.
     */
    #[Optional]
    public ?int $rating;

    /**
     * Optional website URL for related information.
     */
    #[Optional]
    public ?string $relatedURL;

    /**
     * This is an optional name to associate with the submission, for authenticated users their profile username is used.
     */
    #[Optional]
    public ?string $userName;

    /**
     * `new CommentSubmitParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentSubmitParams::with(chargePointID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentSubmitParams)->withChargePointID(...)
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
        ?int $checkinStatusTypeID = null,
        ?string $comment = null,
        ?int $commentTypeID = null,
        ?int $rating = null,
        ?string $relatedURL = null,
        ?string $userName = null,
    ): self {
        $self = new self;

        $self['chargePointID'] = $chargePointID;

        null !== $checkinStatusTypeID && $self['checkinStatusTypeID'] = $checkinStatusTypeID;
        null !== $comment && $self['comment'] = $comment;
        null !== $commentTypeID && $self['commentTypeID'] = $commentTypeID;
        null !== $rating && $self['rating'] = $rating;
        null !== $relatedURL && $self['relatedURL'] = $relatedURL;
        null !== $userName && $self['userName'] = $userName;

        return $self;
    }

    /**
     * This must be a valid POI ID.
     */
    public function withChargePointID(int $chargePointID): self
    {
        $self = clone $this;
        $self['chargePointID'] = $chargePointID;

        return $self;
    }

    /**
     * Optional valid CheckStatusTypeID to indicate overall catgeory and success/failure to use equipment e.g. 10 = Charged Successfully.
     */
    public function withCheckinStatusTypeID(int $checkinStatusTypeID): self
    {
        $self = clone $this;
        $self['checkinStatusTypeID'] = $checkinStatusTypeID;

        return $self;
    }

    /**
     * This is an optional comment to describe the charging experience, may include guidance for future users.
     */
    public function withComment(string $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }

    /**
     * This must be a valid Comment Type ID as per UserCommentTypes found in Core Reference Data. If left as null then General Comment will be used.
     */
    public function withCommentTypeID(int $commentTypeID): self
    {
        $self = clone $this;
        $self['commentTypeID'] = $commentTypeID;

        return $self;
    }

    /**
     * Optional integer rating between 1 = Worst, 5 = Best.
     */
    public function withRating(int $rating): self
    {
        $self = clone $this;
        $self['rating'] = $rating;

        return $self;
    }

    /**
     * Optional website URL for related information.
     */
    public function withRelatedURL(string $relatedURL): self
    {
        $self = clone $this;
        $self['relatedURL'] = $relatedURL;

        return $self;
    }

    /**
     * This is an optional name to associate with the submission, for authenticated users their profile username is used.
     */
    public function withUserName(string $userName): self
    {
        $self = clone $this;
        $self['userName'] = $userName;

        return $self;
    }
}
