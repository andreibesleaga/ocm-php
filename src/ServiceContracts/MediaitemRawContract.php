<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\Mediaitem\MediaitemCreateParams;
use Ocm\Mediaitem\MediaitemNewResponse;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface MediaitemRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MediaitemCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaitemNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MediaitemCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
