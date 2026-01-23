<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Exceptions\APIException;
use Ocm\Core\Util;
use Ocm\Mediaitem\MediaitemNewResponse;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\MediaitemContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class MediaitemService implements MediaitemContract
{
    /**
     * @api
     */
    public MediaitemRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MediaitemRawService($client);
    }

    /**
     * @api
     *
     * Submit a photo for a specific charging location
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
    ): MediaitemNewResponse {
        $params = Util::removeNulls(
            [
                'chargePointID' => $chargePointID,
                'imageDataBase64' => $imageDataBase64,
                'comment' => $comment,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
