<?php

declare(strict_types=1);

namespace Ocm;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Ocm\Core\BaseClient;
use Ocm\Core\Util;
use Ocm\Services\CommentService;
use Ocm\Services\MediaitemService;
use Ocm\Services\OpenAPIService;
use Ocm\Services\PoiService;
use Ocm\Services\ProfileService;
use Ocm\Services\ReferencedataService;

/**
 * @phpstan-import-type NormalizedRequest from \Ocm\Core\BaseClient
 * @phpstan-import-type RequestOpts from \Ocm\RequestOptions
 */
class Client extends BaseClient
{
    public string $apiKey;

    public string $apiKeyHeader;

    public string $bearer;

    /**
     * @api
     */
    public PoiService $poi;

    /**
     * @api
     */
    public ReferencedataService $referencedata;

    /**
     * @api
     */
    public ProfileService $profile;

    /**
     * @api
     */
    public CommentService $comment;

    /**
     * @api
     */
    public MediaitemService $mediaitem;

    /**
     * @api
     */
    public OpenAPIService $openAPI;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $apiKeyHeader = null,
        ?string $bearer = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->apiKey = (string) ($apiKey ?? getenv('OCM_API_KEY'));
        $this->apiKeyHeader = (string) ($apiKeyHeader ?? getenv('OCM_API_KEY'));
        $this->bearer = (string) ($bearer ?? getenv('OCM_USERNAME'));

        $baseUrl ??= getenv('OCM_BASE_URL') ?: 'https://api.openchargemap.io/v3';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('ocm/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.1.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->poi = new PoiService($this);
        $this->referencedata = new ReferencedataService($this);
        $this->profile = new ProfileService($this);
        $this->comment = new CommentService($this);
        $this->mediaitem = new MediaitemService($this);
        $this->openAPI = new OpenAPIService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return [...$this->apiKeyHeaderScheme(), ...$this->userAuthentication()];
    }

    /** @return array<string,string> */
    protected function authQuery(): array
    {
        return $this->apiKey ? ['key' => $this->apiKey] : [];
    }

    /** @return array<string,string> */
    protected function apiKeyHeaderScheme(): array
    {
        return $this->apiKeyHeader ? ['X-API-Key' => $this->apiKeyHeader] : [];
    }

    /** @return array<string,string> */
    protected function userAuthentication(): array
    {
        return $this->bearer ? ['Authorization' => "Bearer {$this->bearer}"] : [];
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: [...$this->authQuery(), ...$query],
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
