<?php

declare(strict_types=1);

namespace Ocm\Referencedata;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Referencedata\ReferencedataGetResponse\ChargerType;
use Ocm\Referencedata\ReferencedataGetResponse\CheckinStatusType;
use Ocm\Referencedata\ReferencedataGetResponse\ConnectionType;
use Ocm\Referencedata\ReferencedataGetResponse\CurrentType;
use Ocm\Referencedata\ReferencedataGetResponse\DataProvider;
use Ocm\Referencedata\ReferencedataGetResponse\Operator;
use Ocm\Referencedata\ReferencedataGetResponse\StatusType;
use Ocm\Referencedata\ReferencedataGetResponse\SubmissionStatusType;
use Ocm\Referencedata\ReferencedataGetResponse\UsageType;
use Ocm\Referencedata\ReferencedataGetResponse\UserCommentType;

/**
 * Set of core reference data used for other API results and UI.
 *
 * @phpstan-import-type ChargerTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\ChargerType
 * @phpstan-import-type CheckinStatusTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\CheckinStatusType
 * @phpstan-import-type ConnectionTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\ConnectionType
 * @phpstan-import-type CountryShape from \Ocm\Referencedata\Country
 * @phpstan-import-type CurrentTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\CurrentType
 * @phpstan-import-type DataProviderShape from \Ocm\Referencedata\ReferencedataGetResponse\DataProvider
 * @phpstan-import-type OperatorShape from \Ocm\Referencedata\ReferencedataGetResponse\Operator
 * @phpstan-import-type StatusTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\StatusType
 * @phpstan-import-type SubmissionStatusTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\SubmissionStatusType
 * @phpstan-import-type UsageTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\UsageType
 * @phpstan-import-type UserCommentTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\UserCommentType
 *
 * @phpstan-type ReferencedataGetResponseShape = array{
 *   chargerTypes?: list<ChargerType|ChargerTypeShape>|null,
 *   checkinStatusTypes?: list<CheckinStatusType|CheckinStatusTypeShape>|null,
 *   connectionTypes?: list<ConnectionType|ConnectionTypeShape>|null,
 *   countries?: list<Country|CountryShape>|null,
 *   currentTypes?: list<CurrentType|CurrentTypeShape>|null,
 *   dataProviders?: list<DataProvider|DataProviderShape>|null,
 *   dataTypes?: mixed,
 *   metadataGroups?: string|null,
 *   operators?: list<Operator|OperatorShape>|null,
 *   statusTypes?: list<StatusType|StatusTypeShape>|null,
 *   submissionStatusTypes?: list<SubmissionStatusType|SubmissionStatusTypeShape>|null,
 *   usageTypes?: list<UsageType|UsageTypeShape>|null,
 *   userCommentTypes?: list<UserCommentType|UserCommentTypeShape>|null,
 * }
 */
final class ReferencedataGetResponse implements BaseModel
{
    /** @use SdkModel<ReferencedataGetResponseShape> */
    use SdkModel;

    /** @var list<ChargerType>|null $chargerTypes */
    #[Optional('ChargerTypes', list: ChargerType::class)]
    public ?array $chargerTypes;

    /** @var list<CheckinStatusType>|null $checkinStatusTypes */
    #[Optional('CheckinStatusTypes', list: CheckinStatusType::class)]
    public ?array $checkinStatusTypes;

    /** @var list<ConnectionType>|null $connectionTypes */
    #[Optional('ConnectionTypes', list: ConnectionType::class)]
    public ?array $connectionTypes;

    /** @var list<Country>|null $countries */
    #[Optional('Countries', list: Country::class)]
    public ?array $countries;

    /** @var list<CurrentType>|null $currentTypes */
    #[Optional('CurrentTypes', list: CurrentType::class)]
    public ?array $currentTypes;

    /** @var list<DataProvider>|null $dataProviders */
    #[Optional('DataProviders', list: DataProvider::class)]
    public ?array $dataProviders;

    #[Optional('DataTypes')]
    public mixed $dataTypes;

    #[Optional('MetadataGroups')]
    public ?string $metadataGroups;

    /** @var list<Operator>|null $operators */
    #[Optional('Operators', list: Operator::class)]
    public ?array $operators;

    /** @var list<StatusType>|null $statusTypes */
    #[Optional('StatusTypes', list: StatusType::class)]
    public ?array $statusTypes;

    /** @var list<SubmissionStatusType>|null $submissionStatusTypes */
    #[Optional('SubmissionStatusTypes', list: SubmissionStatusType::class)]
    public ?array $submissionStatusTypes;

    /** @var list<UsageType>|null $usageTypes */
    #[Optional('UsageTypes', list: UsageType::class)]
    public ?array $usageTypes;

    /** @var list<UserCommentType>|null $userCommentTypes */
    #[Optional('UserCommentTypes', list: UserCommentType::class)]
    public ?array $userCommentTypes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ChargerType|ChargerTypeShape>|null $chargerTypes
     * @param list<CheckinStatusType|CheckinStatusTypeShape>|null $checkinStatusTypes
     * @param list<ConnectionType|ConnectionTypeShape>|null $connectionTypes
     * @param list<Country|CountryShape>|null $countries
     * @param list<CurrentType|CurrentTypeShape>|null $currentTypes
     * @param list<DataProvider|DataProviderShape>|null $dataProviders
     * @param list<Operator|OperatorShape>|null $operators
     * @param list<StatusType|StatusTypeShape>|null $statusTypes
     * @param list<SubmissionStatusType|SubmissionStatusTypeShape>|null $submissionStatusTypes
     * @param list<UsageType|UsageTypeShape>|null $usageTypes
     * @param list<UserCommentType|UserCommentTypeShape>|null $userCommentTypes
     */
    public static function with(
        ?array $chargerTypes = null,
        ?array $checkinStatusTypes = null,
        ?array $connectionTypes = null,
        ?array $countries = null,
        ?array $currentTypes = null,
        ?array $dataProviders = null,
        mixed $dataTypes = null,
        ?string $metadataGroups = null,
        ?array $operators = null,
        ?array $statusTypes = null,
        ?array $submissionStatusTypes = null,
        ?array $usageTypes = null,
        ?array $userCommentTypes = null,
    ): self {
        $self = new self;

        null !== $chargerTypes && $self['chargerTypes'] = $chargerTypes;
        null !== $checkinStatusTypes && $self['checkinStatusTypes'] = $checkinStatusTypes;
        null !== $connectionTypes && $self['connectionTypes'] = $connectionTypes;
        null !== $countries && $self['countries'] = $countries;
        null !== $currentTypes && $self['currentTypes'] = $currentTypes;
        null !== $dataProviders && $self['dataProviders'] = $dataProviders;
        null !== $dataTypes && $self['dataTypes'] = $dataTypes;
        null !== $metadataGroups && $self['metadataGroups'] = $metadataGroups;
        null !== $operators && $self['operators'] = $operators;
        null !== $statusTypes && $self['statusTypes'] = $statusTypes;
        null !== $submissionStatusTypes && $self['submissionStatusTypes'] = $submissionStatusTypes;
        null !== $usageTypes && $self['usageTypes'] = $usageTypes;
        null !== $userCommentTypes && $self['userCommentTypes'] = $userCommentTypes;

        return $self;
    }

    /**
     * @param list<ChargerType|ChargerTypeShape> $chargerTypes
     */
    public function withChargerTypes(array $chargerTypes): self
    {
        $self = clone $this;
        $self['chargerTypes'] = $chargerTypes;

        return $self;
    }

    /**
     * @param list<CheckinStatusType|CheckinStatusTypeShape> $checkinStatusTypes
     */
    public function withCheckinStatusTypes(array $checkinStatusTypes): self
    {
        $self = clone $this;
        $self['checkinStatusTypes'] = $checkinStatusTypes;

        return $self;
    }

    /**
     * @param list<ConnectionType|ConnectionTypeShape> $connectionTypes
     */
    public function withConnectionTypes(array $connectionTypes): self
    {
        $self = clone $this;
        $self['connectionTypes'] = $connectionTypes;

        return $self;
    }

    /**
     * @param list<Country|CountryShape> $countries
     */
    public function withCountries(array $countries): self
    {
        $self = clone $this;
        $self['countries'] = $countries;

        return $self;
    }

    /**
     * @param list<CurrentType|CurrentTypeShape> $currentTypes
     */
    public function withCurrentTypes(array $currentTypes): self
    {
        $self = clone $this;
        $self['currentTypes'] = $currentTypes;

        return $self;
    }

    /**
     * @param list<DataProvider|DataProviderShape> $dataProviders
     */
    public function withDataProviders(array $dataProviders): self
    {
        $self = clone $this;
        $self['dataProviders'] = $dataProviders;

        return $self;
    }

    public function withDataTypes(mixed $dataTypes): self
    {
        $self = clone $this;
        $self['dataTypes'] = $dataTypes;

        return $self;
    }

    public function withMetadataGroups(string $metadataGroups): self
    {
        $self = clone $this;
        $self['metadataGroups'] = $metadataGroups;

        return $self;
    }

    /**
     * @param list<Operator|OperatorShape> $operators
     */
    public function withOperators(array $operators): self
    {
        $self = clone $this;
        $self['operators'] = $operators;

        return $self;
    }

    /**
     * @param list<StatusType|StatusTypeShape> $statusTypes
     */
    public function withStatusTypes(array $statusTypes): self
    {
        $self = clone $this;
        $self['statusTypes'] = $statusTypes;

        return $self;
    }

    /**
     * @param list<SubmissionStatusType|SubmissionStatusTypeShape> $submissionStatusTypes
     */
    public function withSubmissionStatusTypes(
        array $submissionStatusTypes
    ): self {
        $self = clone $this;
        $self['submissionStatusTypes'] = $submissionStatusTypes;

        return $self;
    }

    /**
     * @param list<UsageType|UsageTypeShape> $usageTypes
     */
    public function withUsageTypes(array $usageTypes): self
    {
        $self = clone $this;
        $self['usageTypes'] = $usageTypes;

        return $self;
    }

    /**
     * @param list<UserCommentType|UserCommentTypeShape> $userCommentTypes
     */
    public function withUserCommentTypes(array $userCommentTypes): self
    {
        $self = clone $this;
        $self['userCommentTypes'] = $userCommentTypes;

        return $self;
    }
}
