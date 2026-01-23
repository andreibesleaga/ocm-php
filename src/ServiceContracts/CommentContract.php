<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Comment\CommentSubmitResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface CommentContract
{
    /**
     * @api
     *
     * @param int $chargePointID This must be a valid POI ID
     * @param int $checkinStatusTypeID Optional valid CheckStatusTypeID to indicate overall catgeory and success/failure to use equipment e.g. 10 = Charged Successfully.
     * @param string $comment this is an optional comment to describe the charging experience, may include guidance for future users
     * @param int $commentTypeID This must be a valid Comment Type ID as per UserCommentTypes found in Core Reference Data. If left as null then General Comment will be used.
     * @param int $rating optional integer rating between 1 = Worst, 5 = Best
     * @param string $relatedURL Optional website URL for related information
     * @param string $userName this is an optional name to associate with the submission, for authenticated users their profile username is used
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        int $chargePointID,
        ?int $checkinStatusTypeID = null,
        ?string $comment = null,
        ?int $commentTypeID = null,
        ?int $rating = null,
        ?string $relatedURL = null,
        ?string $userName = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentSubmitResponse;
}
