<?php

declare(strict_types=1);

namespace Ocm\ServiceContracts;

use Ocm\Core\Exceptions\APIException;
use Ocm\Mediaitem\MediaitemNewResponse;
use Ocm\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
interface MediaitemContract
{
    /**
     * @api
     *
     * @param int $chargePointID ID value for the OCM site (POI) this image relates to
     * @param string $imageDataBase64 BASE64 encoded data
     * @param string $comment Optional description of image or context
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $chargePointID,
        string $imageDataBase64,
        ?string $comment = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaitemNewResponse;
}
