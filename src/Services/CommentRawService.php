<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Comment\CommentSubmitParams;
use Ocm\Comment\CommentSubmitResponse;
use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\CommentRawContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class CommentRawService implements CommentRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit a user comment or checkin for a specific charging location
     *
     * @param array{
     *   chargePointID: int,
     *   checkinStatusTypeID?: int,
     *   comment?: string,
     *   commentTypeID?: int,
     *   rating?: int,
     *   relatedURL?: string,
     *   userName?: string,
     * }|CommentSubmitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        array|CommentSubmitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CommentSubmitParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'comment',
            body: (object) $parsed,
            options: $options,
            convert: CommentSubmitResponse::class,
        );
    }
}
