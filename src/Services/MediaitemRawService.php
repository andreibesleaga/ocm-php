<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\Mediaitem\MediaitemCreateParams;
use Ocm\Mediaitem\MediaitemNewResponse;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\MediaitemRawContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class MediaitemRawService implements MediaitemRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit a photo for a specific charging location
     *
     * @param array{
     *   chargePointID: int, imageDataBase64: string, comment?: string
     * }|MediaitemCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaitemNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MediaitemCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaitemCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'mediaitem',
            body: (object) $parsed,
            options: $options,
            convert: MediaitemNewResponse::class,
        );
    }
}
