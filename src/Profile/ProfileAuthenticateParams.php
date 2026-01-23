<?php

declare(strict_types=1);

namespace Ocm\Profile;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Concerns\SdkParams;
use Ocm\Core\Contracts\BaseModel;

/**
 * Perform user authentication, returning a model which includes the users profile and a JWT auth token to re-use in subsequent requests.
 *
 * @see Ocm\Services\ProfileService::authenticate()
 *
 * @phpstan-type ProfileAuthenticateParamsShape = array{
 *   emailaddress?: string|null, password?: string|null
 * }
 */
final class ProfileAuthenticateParams implements BaseModel
{
    /** @use SdkModel<ProfileAuthenticateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $emailaddress;

    #[Optional]
    public ?string $password;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $emailaddress = null,
        ?string $password = null
    ): self {
        $self = new self;

        null !== $emailaddress && $self['emailaddress'] = $emailaddress;
        null !== $password && $self['password'] = $password;

        return $self;
    }

    public function withEmailaddress(string $emailaddress): self
    {
        $self = clone $this;
        $self['emailaddress'] = $emailaddress;

        return $self;
    }

    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }
}
