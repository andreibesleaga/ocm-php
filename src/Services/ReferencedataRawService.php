<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Contracts\BaseResponse;
use Ocm\Core\Exceptions\APIException;
use Ocm\Referencedata\ReferencedataGetResponse;
use Ocm\Referencedata\ReferencedataRetrieveParams;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\ReferencedataRawContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class ReferencedataRawService implements ReferencedataRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the core reference data used for looking up IDs such as Connection Types, Operators, Countries etc.
     *
     * This information is useful for UIs such as editing systems or for fetching results in the lighter non-verbose mode, then hydrating POI results back into complex objects.
     *
     * @param array{countryid?: list<mixed>}|ReferencedataRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferencedataGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|ReferencedataRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReferencedataRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'referencedata',
            query: $parsed,
            options: $options,
            convert: ReferencedataGetResponse::class,
        );
    }
}
