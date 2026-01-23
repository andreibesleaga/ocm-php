<?php

declare(strict_types=1);

namespace Ocm\Profile\ProfileAuthenticateResponse\Data;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;

/**
 * Full user profile, including non-public fields such as Email Address.
 *
 * @phpstan-type UserProfileShape = array{
 *   dateCreated: string,
 *   id: float,
 *   isProfilePublic: bool,
 *   username: string,
 *   dateLastLogin?: string|null,
 *   emailAddress?: string|null,
 *   latitude?: float|null,
 *   location?: string|null,
 *   longitude?: float|null,
 *   permissions?: string|null,
 *   profile?: string|null,
 *   profileImageURL?: string|null,
 *   reputationPoints?: float|null,
 *   websiteURL?: string|null,
 * }
 */
final class UserProfile implements BaseModel
{
    /** @use SdkModel<UserProfileShape> */
    use SdkModel;

    #[Required('DateCreated')]
    public string $dateCreated;

    #[Required('ID')]
    public float $id;

    #[Required('IsProfilePublic')]
    public bool $isProfilePublic;

    #[Required('Username')]
    public string $username;

    #[Optional('DateLastLogin')]
    public ?string $dateLastLogin;

    #[Optional('EmailAddress')]
    public ?string $emailAddress;

    #[Optional('Latitude')]
    public ?float $latitude;

    #[Optional('Location')]
    public ?string $location;

    #[Optional('Longitude')]
    public ?float $longitude;

    #[Optional('Permissions')]
    public ?string $permissions;

    #[Optional('Profile')]
    public ?string $profile;

    #[Optional('ProfileImageURL')]
    public ?string $profileImageURL;

    #[Optional('ReputationPoints')]
    public ?float $reputationPoints;

    #[Optional('WebsiteURL')]
    public ?string $websiteURL;

    /**
     * `new UserProfile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserProfile::with(
     *   dateCreated: ..., id: ..., isProfilePublic: ..., username: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserProfile)
     *   ->withDateCreated(...)
     *   ->withID(...)
     *   ->withIsProfilePublic(...)
     *   ->withUsername(...)
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
     */
    public static function with(
        string $dateCreated,
        float $id,
        bool $isProfilePublic,
        string $username,
        ?string $dateLastLogin = null,
        ?string $emailAddress = null,
        ?float $latitude = null,
        ?string $location = null,
        ?float $longitude = null,
        ?string $permissions = null,
        ?string $profile = null,
        ?string $profileImageURL = null,
        ?float $reputationPoints = null,
        ?string $websiteURL = null,
    ): self {
        $self = new self;

        $self['dateCreated'] = $dateCreated;
        $self['id'] = $id;
        $self['isProfilePublic'] = $isProfilePublic;
        $self['username'] = $username;

        null !== $dateLastLogin && $self['dateLastLogin'] = $dateLastLogin;
        null !== $emailAddress && $self['emailAddress'] = $emailAddress;
        null !== $latitude && $self['latitude'] = $latitude;
        null !== $location && $self['location'] = $location;
        null !== $longitude && $self['longitude'] = $longitude;
        null !== $permissions && $self['permissions'] = $permissions;
        null !== $profile && $self['profile'] = $profile;
        null !== $profileImageURL && $self['profileImageURL'] = $profileImageURL;
        null !== $reputationPoints && $self['reputationPoints'] = $reputationPoints;
        null !== $websiteURL && $self['websiteURL'] = $websiteURL;

        return $self;
    }

    public function withDateCreated(string $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    public function withID(float $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIsProfilePublic(bool $isProfilePublic): self
    {
        $self = clone $this;
        $self['isProfilePublic'] = $isProfilePublic;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }

    public function withDateLastLogin(string $dateLastLogin): self
    {
        $self = clone $this;
        $self['dateLastLogin'] = $dateLastLogin;

        return $self;
    }

    public function withEmailAddress(string $emailAddress): self
    {
        $self = clone $this;
        $self['emailAddress'] = $emailAddress;

        return $self;
    }

    public function withLatitude(float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    public function withPermissions(string $permissions): self
    {
        $self = clone $this;
        $self['permissions'] = $permissions;

        return $self;
    }

    public function withProfile(string $profile): self
    {
        $self = clone $this;
        $self['profile'] = $profile;

        return $self;
    }

    public function withProfileImageURL(string $profileImageURL): self
    {
        $self = clone $this;
        $self['profileImageURL'] = $profileImageURL;

        return $self;
    }

    public function withReputationPoints(float $reputationPoints): self
    {
        $self = clone $this;
        $self['reputationPoints'] = $reputationPoints;

        return $self;
    }

    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }
}
