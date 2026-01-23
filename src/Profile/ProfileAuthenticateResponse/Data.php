<?php

declare(strict_types=1);

namespace Ocm\Profile\ProfileAuthenticateResponse;

use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Profile\ProfileAuthenticateResponse\Data\UserProfile;

/**
 * @phpstan-import-type UserProfileShape from \Ocm\Profile\ProfileAuthenticateResponse\Data\UserProfile
 *
 * @phpstan-type DataShape = array{
 *   accessToken: string, userProfile: UserProfile|UserProfileShape
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * JWT Bearer Token to use in subsequent authenticated requests.
     */
    #[Required('access_token')]
    public string $accessToken;

    /**
     * Full user profile, including non-public fields such as Email Address.
     */
    #[Required('UserProfile')]
    public UserProfile $userProfile;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(accessToken: ..., userProfile: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withAccessToken(...)->withUserProfile(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserProfile|UserProfileShape $userProfile
     */
    public static function with(
        string $accessToken,
        UserProfile|array $userProfile
    ): self {
        $self = new self;

        $self['accessToken'] = $accessToken;
        $self['userProfile'] = $userProfile;

        return $self;
    }

    /**
     * JWT Bearer Token to use in subsequent authenticated requests.
     */
    public function withAccessToken(string $accessToken): self
    {
        $self = clone $this;
        $self['accessToken'] = $accessToken;

        return $self;
    }

    /**
     * Full user profile, including non-public fields such as Email Address.
     *
     * @param UserProfile|UserProfileShape $userProfile
     */
    public function withUserProfile(UserProfile|array $userProfile): self
    {
        $self = clone $this;
        $self['userProfile'] = $userProfile;

        return $self;
    }
}
