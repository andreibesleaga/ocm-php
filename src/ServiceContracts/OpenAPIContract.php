<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Exceptions\APIException;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface OpenAPIContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
