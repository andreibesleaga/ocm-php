<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Exceptions\APIException;
use Ocm\Profile\ProfileAuthenticateResponse;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface ProfileContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function authenticate(
        ?string $emailaddress = null,
        ?string $password = null,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileAuthenticateResponse;
}
