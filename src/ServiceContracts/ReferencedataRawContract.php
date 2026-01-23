<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\Referencedata\ReferencedataGetResponse;
use Ocm\Referencedata\ReferencedataRetrieveParams;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface ReferencedataRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ReferencedataRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferencedataGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|ReferencedataRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
