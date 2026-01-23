<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Exceptions\APIException;
use Ocm\Referencedata\ReferencedataGetResponse;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface ReferencedataContract
{
    /**
     * @api
     *
     * @param list<mixed> $countryid Optional filter on countryid, exact match on a given numeric country id (comma separated list)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $countryid = null,
        RequestOptions|array|null $requestOptions = null
    ): ReferencedataGetResponse;
}
