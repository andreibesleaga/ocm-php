<?php

declare(strict_types=1);

namespace Ocm\Services;

use Ocm\Client;
use Ocm\Core\Exceptions\APIException;
use Ocm\Core\Util;
use Ocm\Referencedata\ReferencedataGetResponse;
use Ocm\RequestOptions;
use Ocm\ServiceContracts\ReferencedataContract;

/**
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
final class ReferencedataService implements ReferencedataContract
{
    /**
     * @api
     */
    public ReferencedataRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReferencedataRawService($client);
    }

    /**
     * @api
     *
     * Returns the core reference data used for looking up IDs such as Connection Types, Operators, Countries etc.
     *
     * This information is useful for UIs such as editing systems or for fetching results in the lighter non-verbose mode, then hydrating POI results back into complex objects.
     *
     * @param list<mixed> $countryid Optional filter on countryid, exact match on a given numeric country id (comma separated list)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $countryid = null,
        RequestOptions|array|null $requestOptions = null
    ): ReferencedataGetResponse {
        $params = Util::removeNulls(['countryid' => $countryid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
