<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Comment\CommentSubmitParams;
use Ocm\Comment\CommentSubmitResponse;
use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface CommentRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CommentSubmitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        array|CommentSubmitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
