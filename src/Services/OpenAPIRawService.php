<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\OpenAPIRawContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class OpenAPIRawService implements OpenAPIRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the current OpenAPI format (YAML) definition for this API. This is useful for documentation tools, mocking, testing and client generation.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'openapi',
            headers: ['Accept' => 'text/plain'],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
