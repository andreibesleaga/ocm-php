<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Exceptions\APIException;
use Ocm\Core\Util;
use Ocm\Profile\ProfileAuthenticateResponse;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\ProfileContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class ProfileService implements ProfileContract
{
    /**
     * @api
     */
    public ProfileRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProfileRawService($client);
    }

    /**
     * @api
     *
     * Perform user authentication, returning a model which includes the users profile and a JWT auth token to re-use in subsequent requests.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function authenticate(
        ?string $emailaddress = null,
        ?string $password = null,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileAuthenticateResponse {
        $params = Util::removeNulls(
            ['emailaddress' => $emailaddress, 'password' => $password]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->authenticate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
