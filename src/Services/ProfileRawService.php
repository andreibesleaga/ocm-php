<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\Profile\ProfileAuthenticateParams;
use Ocm\Profile\ProfileAuthenticateResponse;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\ProfileRawContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class ProfileRawService implements ProfileRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Perform user authentication, returning a model which includes the users profile and a JWT auth token to re-use in subsequent requests.
     *
     * @param array{
     *   emailaddress?: string, password?: string
     * }|ProfileAuthenticateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileAuthenticateResponse>
     *
     * @throws APIException
     */
    public function authenticate(
        array|ProfileAuthenticateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileAuthenticateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'profile/authenticate',
            body: (object) $parsed,
            options: $options,
            convert: ProfileAuthenticateResponse::class,
        );
    }
}
