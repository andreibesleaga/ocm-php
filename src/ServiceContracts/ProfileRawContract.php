<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\Profile\ProfileAuthenticateParams;
use Ocm\Profile\ProfileAuthenticateResponse;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface ProfileRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ProfileAuthenticateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileAuthenticateResponse>
     *
     * @throws APIException
     */
    public function authenticate(
        array|ProfileAuthenticateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
