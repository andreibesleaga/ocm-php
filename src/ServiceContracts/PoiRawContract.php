<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\Poi\PoiListParams;
use Ocm\Poi\PoiListResponseItem;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface PoiRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PoiListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<PoiListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|PoiListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
