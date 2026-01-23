<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Exceptions\APIException;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\OpenAPIContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class OpenAPIService implements OpenAPIContract
{
    /**
     * @api
     */
    public OpenAPIRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OpenAPIRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the current OpenAPI format (YAML) definition for this API. This is useful for documentation tools, mocking, testing and client generation.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }
}
