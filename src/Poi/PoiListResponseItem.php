<?php

declare(strict_types=1);

namespace Ocm\Poi;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Poi\PoiListResponseItem\AddressInfo;
use Ocm\Poi\PoiListResponseItem\Connection;
use Ocm\Poi\PoiListResponseItem\DataProvider;
use Ocm\Poi\PoiListResponseItem\MediaItem;
use Ocm\Poi\PoiListResponseItem\OperatorInfo;
use Ocm\Poi\PoiListResponseItem\StatusType;
use Ocm\Poi\PoiListResponseItem\SubmissionStatus;
use Ocm\Poi\PoiListResponseItem\UsageType;
use Ocm\Poi\PoiListResponseItem\UserComment;

/**
 * A POI (Point of Interest), also referred to as a `Site` or `ChargePoint`, is the top-level set of information regarding a geographic site with one or more electric vehicle charging equipment present. The term `ChargePointID` is used to reference the unique ID for each POI, as called OCM ID. This reference appears in various UI elements in the format `OCM-12345` to distinguish the ID number as being a reference for a specific POI/site.
 *
 * Note: If the API is called in verbose mode properties expanded properties are included in the results (e.g. UsageType, StatusType, DataProvider, OperatorInfo, SubmissionStatus).  With the exception of the AddressInfo property, other object properties will not be populated in a compact result set and instead only the associated reference IDs will be set (e.g. UsageTypeID, DataProviderID etc)
 *
 * @phpstan-import-type AddressInfoShape from \Ocm\Poi\PoiListResponseItem\AddressInfo
 * @phpstan-import-type ConnectionShape from \Ocm\Poi\PoiListResponseItem\Connection
 * @phpstan-import-type DataProviderShape from \Ocm\Poi\PoiListResponseItem\DataProvider
 * @phpstan-import-type MediaItemShape from \Ocm\Poi\PoiListResponseItem\MediaItem
 * @phpstan-import-type OperatorInfoShape from \Ocm\Poi\PoiListResponseItem\OperatorInfo
 * @phpstan-import-type StatusTypeShape from \Ocm\Poi\PoiListResponseItem\StatusType
 * @phpstan-import-type SubmissionStatusShape from \Ocm\Poi\PoiListResponseItem\SubmissionStatus
 * @phpstan-import-type UsageTypeShape from \Ocm\Poi\PoiListResponseItem\UsageType
 * @phpstan-import-type UserCommentShape from \Ocm\Poi\PoiListResponseItem\UserComment
 *
 * @phpstan-type PoiListResponseItemShape = array{
 *   addressInfo?: null|AddressInfo|AddressInfoShape,
 *   connections?: list<Connection|ConnectionShape>|null,
 *   dataProvider?: null|DataProvider|DataProviderShape,
 *   dataProviderID?: int|null,
 *   dataProvidersReference?: string|null,
 *   dataQualityLevel?: int|null,
 *   dateCreated?: \DateTimeInterface|null,
 *   dateLastConfirmed?: \DateTimeInterface|null,
 *   dateLastStatusUpdate?: \DateTimeInterface|null,
 *   dateLastVerified?: \DateTimeInterface|null,
 *   datePlanned?: \DateTimeInterface|null,
 *   generalComments?: string|null,
 *   id?: int|null,
 *   isRecentlyVerified?: bool|null,
 *   mediaItems?: list<MediaItem|MediaItemShape>|null,
 *   metadataValues?: list<mixed>|null,
 *   numberOfPoints?: int|null,
 *   operatorID?: int|null,
 *   operatorInfo?: null|OperatorInfo|OperatorInfoShape,
 *   operatorsReference?: string|null,
 *   parentChargePointID?: int|null,
 *   statusType?: null|StatusType|StatusTypeShape,
 *   statusTypeID?: int|null,
 *   submissionStatus?: null|SubmissionStatus|SubmissionStatusShape,
 *   submissionStatusTypeID?: int|null,
 *   usageCost?: string|null,
 *   usageType?: null|UsageType|UsageTypeShape,
 *   usageTypeID?: int|null,
 *   userComments?: list<UserComment|UserCommentShape>|null,
 *   uuid?: string|null,
 * }
 */
final class PoiListResponseItem implements BaseModel
{
    /** @use SdkModel<PoiListResponseItemShape> */
    use SdkModel;

    /**
     * Geographic position for site and (nearest) address component information.
     */
    #[Optional('AddressInfo')]
    public ?AddressInfo $addressInfo;

    /**
     * List of equipment summary information for this site.
     *
     * @var list<Connection>|null $connections
     */
    #[Optional('Connections', list: Connection::class)]
    public ?array $connections;

    /**
     * A Data Provider is the controller of the source data set used to construct the details for this POI. Data has been transformed and interpreted from it's original form. Each Data Provider provides data either by an explicit license or agreement.
     */
    #[Optional('DataProvider')]
    public ?DataProvider $dataProvider;

    /**
     * The reference ID for the Data Provider of this POI.
     */
    #[Optional('DataProviderID')]
    public ?int $dataProviderID;

    /**
     * If present, this is the Data Providers own key for this POI within their source data set.
     */
    #[Optional('DataProvidersReference')]
    public ?string $dataProvidersReference;

    /**
     * A metric applied during imports to indicate a quality level based on available information detail (5 == best). Largely unused currently.
     */
    #[Optional('DataQualityLevel')]
    public ?int $dataQualityLevel;

    /**
     * The date and time (UTC, ISO 8601) this POI was added to the Open Charge Map database.
     */
    #[Optional('DateCreated')]
    public ?\DateTimeInterface $dateCreated;

    /**
     * The date and time (UTC, ISO 8601) this POI was last confirmed according to the data provider or a user. See DateLastVerified for a dynamically computed date based on multiple signals.
     */
    #[Optional('DateLastConfirmed')]
    public ?\DateTimeInterface $dateLastConfirmed;

    /**
     * The date and time (UTC, ISO 8601) this POI or directly related child properties were updated.
     */
    #[Optional('DateLastStatusUpdate')]
    public ?\DateTimeInterface $dateLastStatusUpdate;

    /**
     * A dynamically computed value, the date and time (UTC, ISO 8601) this POI was last confirmed by a user edit or related user comment.
     */
    #[Optional('DateLastVerified')]
    public ?\DateTimeInterface $dateLastVerified;

    /**
     * The date and time (UTC, ISO 8601) this POI is or was planned for commissioning. In general planned POIs should not be presented to end users until confirmed operational.
     */
    #[Optional('DatePlanned')]
    public ?\DateTimeInterface $datePlanned;

    /**
     * General additional factual information for the POI. Users are discouraged from using this field for opinions on site quality etc.
     */
    #[Optional('GeneralComments')]
    public ?string $generalComments;

    /**
     * The OCM reference ID for this POI (Point of Interest).
     */
    #[Optional('ID')]
    public ?int $id;

    /**
     * A dynamically computed value indicating of any recently confirmation activity has taken place for this site (positive check-ins etc).
     */
    #[Optional('IsRecentlyVerified')]
    public ?bool $isRecentlyVerified;

    /**
     * A list of user submitted photos for this site.
     *
     * @var list<MediaItem>|null $mediaItems
     */
    #[Optional('MediaItems', list: MediaItem::class)]
    public ?array $mediaItems;

    /**
     * Optional array of metadata values. Generally used to indicate data attribution but is also intended for future use to indicate surrounding amenties, links or foreign key values into other data sets.
     *
     * @var list<mixed>|null $metadataValues
     */
    #[Optional('MetadataValues', list: 'mixed')]
    public ?array $metadataValues;

    /**
     * The number of bays or discreet stations available overall at this site. This indicates the limiting for number of simultaneous site users.
     */
    #[Optional('NumberOfPoints')]
    public ?int $numberOfPoints;

    /**
     * The reference ID of the equipment network operator or owner.
     */
    #[Optional('OperatorID')]
    public ?int $operatorID;

    /**
     * An Operator is the public organisation which controls a network of charging points.
     */
    #[Optional('OperatorInfo')]
    public ?OperatorInfo $operatorInfo;

    /**
     * The network operators own reference for this site (may be a site reference or a single equipment reference).
     */
    #[Optional('OperatorsReference')]
    public ?string $operatorsReference;

    /**
     * If present, this data in this POI supercedes information in another POI. Generally not relevant to consumers.
     */
    #[Optional('ParentChargePointID')]
    public ?int $parentChargePointID;

    /**
     * The Status Type of a site or equipment item indicates whether it is generally operational.
     */
    #[Optional('StatusType')]
    public ?StatusType $statusType;

    /**
     * The overall operational status type reference ID for this POI (i.e. Operational etc). 0 == Unknown.
     */
    #[Optional('StatusTypeID')]
    public ?int $statusTypeID;

    /**
     * Submission Status object, detailing the POI listing status.
     */
    #[Optional('SubmissionStatus')]
    public ?SubmissionStatus $submissionStatus;

    /**
     * The reference ID for the submission status type which applied to this POI.
     */
    #[Optional('SubmissionStatusTypeID')]
    public ?int $submissionStatusTypeID;

    /**
     * Free text description of likely usage costs associated with this site. Generally relates to parking charges whether network operates this site as Free.
     */
    #[Optional('UsageCost')]
    public ?string $usageCost;

    /**
     * The Usage Type of a site indicates the general restrictions on usage.
     */
    #[Optional('UsageType')]
    public ?UsageType $usageType;

    /**
     * The reference ID for the site Usage Type, 0 == Unknown.
     */
    #[Optional('UsageTypeID')]
    public ?int $usageTypeID;

    /**
     * A list of user comments or check-ins for this site.
     *
     * @var list<UserComment>|null $userComments
     */
    #[Optional('UserComments', list: UserComment::class)]
    public ?array $userComments;

    /**
     * A universally unique identifier used as surrogate key. ID and UUID must be preserved when submitting POI update information.
     */
    #[Optional('UUID')]
    public ?string $uuid;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AddressInfo|AddressInfoShape|null $addressInfo
     * @param list<Connection|ConnectionShape>|null $connections
     * @param DataProvider|DataProviderShape|null $dataProvider
     * @param list<MediaItem|MediaItemShape>|null $mediaItems
     * @param list<mixed>|null $metadataValues
     * @param OperatorInfo|OperatorInfoShape|null $operatorInfo
     * @param StatusType|StatusTypeShape|null $statusType
     * @param SubmissionStatus|SubmissionStatusShape|null $submissionStatus
     * @param UsageType|UsageTypeShape|null $usageType
     * @param list<UserComment|UserCommentShape>|null $userComments
     */
    public static function with(
        AddressInfo|array|null $addressInfo = null,
        ?array $connections = null,
        DataProvider|array|null $dataProvider = null,
        ?int $dataProviderID = null,
        ?string $dataProvidersReference = null,
        ?int $dataQualityLevel = null,
        ?\DateTimeInterface $dateCreated = null,
        ?\DateTimeInterface $dateLastConfirmed = null,
        ?\DateTimeInterface $dateLastStatusUpdate = null,
        ?\DateTimeInterface $dateLastVerified = null,
        ?\DateTimeInterface $datePlanned = null,
        ?string $generalComments = null,
        ?int $id = null,
        ?bool $isRecentlyVerified = null,
        ?array $mediaItems = null,
        ?array $metadataValues = null,
        ?int $numberOfPoints = null,
        ?int $operatorID = null,
        OperatorInfo|array|null $operatorInfo = null,
        ?string $operatorsReference = null,
        ?int $parentChargePointID = null,
        StatusType|array|null $statusType = null,
        ?int $statusTypeID = null,
        SubmissionStatus|array|null $submissionStatus = null,
        ?int $submissionStatusTypeID = null,
        ?string $usageCost = null,
        UsageType|array|null $usageType = null,
        ?int $usageTypeID = null,
        ?array $userComments = null,
        ?string $uuid = null,
    ): self {
        $self = new self;

        null !== $addressInfo && $self['addressInfo'] = $addressInfo;
        null !== $connections && $self['connections'] = $connections;
        null !== $dataProvider && $self['dataProvider'] = $dataProvider;
        null !== $dataProviderID && $self['dataProviderID'] = $dataProviderID;
        null !== $dataProvidersReference && $self['dataProvidersReference'] = $dataProvidersReference;
        null !== $dataQualityLevel && $self['dataQualityLevel'] = $dataQualityLevel;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateLastConfirmed && $self['dateLastConfirmed'] = $dateLastConfirmed;
        null !== $dateLastStatusUpdate && $self['dateLastStatusUpdate'] = $dateLastStatusUpdate;
        null !== $dateLastVerified && $self['dateLastVerified'] = $dateLastVerified;
        null !== $datePlanned && $self['datePlanned'] = $datePlanned;
        null !== $generalComments && $self['generalComments'] = $generalComments;
        null !== $id && $self['id'] = $id;
        null !== $isRecentlyVerified && $self['isRecentlyVerified'] = $isRecentlyVerified;
        null !== $mediaItems && $self['mediaItems'] = $mediaItems;
        null !== $metadataValues && $self['metadataValues'] = $metadataValues;
        null !== $numberOfPoints && $self['numberOfPoints'] = $numberOfPoints;
        null !== $operatorID && $self['operatorID'] = $operatorID;
        null !== $operatorInfo && $self['operatorInfo'] = $operatorInfo;
        null !== $operatorsReference && $self['operatorsReference'] = $operatorsReference;
        null !== $parentChargePointID && $self['parentChargePointID'] = $parentChargePointID;
        null !== $statusType && $self['statusType'] = $statusType;
        null !== $statusTypeID && $self['statusTypeID'] = $statusTypeID;
        null !== $submissionStatus && $self['submissionStatus'] = $submissionStatus;
        null !== $submissionStatusTypeID && $self['submissionStatusTypeID'] = $submissionStatusTypeID;
        null !== $usageCost && $self['usageCost'] = $usageCost;
        null !== $usageType && $self['usageType'] = $usageType;
        null !== $usageTypeID && $self['usageTypeID'] = $usageTypeID;
        null !== $userComments && $self['userComments'] = $userComments;
        null !== $uuid && $self['uuid'] = $uuid;

        return $self;
    }

    /**
     * Geographic position for site and (nearest) address component information.
     *
     * @param AddressInfo|AddressInfoShape $addressInfo
     */
    public function withAddressInfo(AddressInfo|array $addressInfo): self
    {
        $self = clone $this;
        $self['addressInfo'] = $addressInfo;

        return $self;
    }

    /**
     * List of equipment summary information for this site.
     *
     * @param list<Connection|ConnectionShape> $connections
     */
    public function withConnections(array $connections): self
    {
        $self = clone $this;
        $self['connections'] = $connections;

        return $self;
    }

    /**
     * A Data Provider is the controller of the source data set used to construct the details for this POI. Data has been transformed and interpreted from it's original form. Each Data Provider provides data either by an explicit license or agreement.
     *
     * @param DataProvider|DataProviderShape $dataProvider
     */
    public function withDataProvider(DataProvider|array $dataProvider): self
    {
        $self = clone $this;
        $self['dataProvider'] = $dataProvider;

        return $self;
    }

    /**
     * The reference ID for the Data Provider of this POI.
     */
    public function withDataProviderID(int $dataProviderID): self
    {
        $self = clone $this;
        $self['dataProviderID'] = $dataProviderID;

        return $self;
    }

    /**
     * If present, this is the Data Providers own key for this POI within their source data set.
     */
    public function withDataProvidersReference(
        string $dataProvidersReference
    ): self {
        $self = clone $this;
        $self['dataProvidersReference'] = $dataProvidersReference;

        return $self;
    }

    /**
     * A metric applied during imports to indicate a quality level based on available information detail (5 == best). Largely unused currently.
     */
    public function withDataQualityLevel(int $dataQualityLevel): self
    {
        $self = clone $this;
        $self['dataQualityLevel'] = $dataQualityLevel;

        return $self;
    }

    /**
     * The date and time (UTC, ISO 8601) this POI was added to the Open Charge Map database.
     */
    public function withDateCreated(\DateTimeInterface $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    /**
     * The date and time (UTC, ISO 8601) this POI was last confirmed according to the data provider or a user. See DateLastVerified for a dynamically computed date based on multiple signals.
     */
    public function withDateLastConfirmed(
        \DateTimeInterface $dateLastConfirmed
    ): self {
        $self = clone $this;
        $self['dateLastConfirmed'] = $dateLastConfirmed;

        return $self;
    }

    /**
     * The date and time (UTC, ISO 8601) this POI or directly related child properties were updated.
     */
    public function withDateLastStatusUpdate(
        \DateTimeInterface $dateLastStatusUpdate
    ): self {
        $self = clone $this;
        $self['dateLastStatusUpdate'] = $dateLastStatusUpdate;

        return $self;
    }

    /**
     * A dynamically computed value, the date and time (UTC, ISO 8601) this POI was last confirmed by a user edit or related user comment.
     */
    public function withDateLastVerified(
        \DateTimeInterface $dateLastVerified
    ): self {
        $self = clone $this;
        $self['dateLastVerified'] = $dateLastVerified;

        return $self;
    }

    /**
     * The date and time (UTC, ISO 8601) this POI is or was planned for commissioning. In general planned POIs should not be presented to end users until confirmed operational.
     */
    public function withDatePlanned(\DateTimeInterface $datePlanned): self
    {
        $self = clone $this;
        $self['datePlanned'] = $datePlanned;

        return $self;
    }

    /**
     * General additional factual information for the POI. Users are discouraged from using this field for opinions on site quality etc.
     */
    public function withGeneralComments(string $generalComments): self
    {
        $self = clone $this;
        $self['generalComments'] = $generalComments;

        return $self;
    }

    /**
     * The OCM reference ID for this POI (Point of Interest).
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A dynamically computed value indicating of any recently confirmation activity has taken place for this site (positive check-ins etc).
     */
    public function withIsRecentlyVerified(bool $isRecentlyVerified): self
    {
        $self = clone $this;
        $self['isRecentlyVerified'] = $isRecentlyVerified;

        return $self;
    }

    /**
     * A list of user submitted photos for this site.
     *
     * @param list<MediaItem|MediaItemShape> $mediaItems
     */
    public function withMediaItems(array $mediaItems): self
    {
        $self = clone $this;
        $self['mediaItems'] = $mediaItems;

        return $self;
    }

    /**
     * Optional array of metadata values. Generally used to indicate data attribution but is also intended for future use to indicate surrounding amenties, links or foreign key values into other data sets.
     *
     * @param list<mixed> $metadataValues
     */
    public function withMetadataValues(array $metadataValues): self
    {
        $self = clone $this;
        $self['metadataValues'] = $metadataValues;

        return $self;
    }

    /**
     * The number of bays or discreet stations available overall at this site. This indicates the limiting for number of simultaneous site users.
     */
    public function withNumberOfPoints(int $numberOfPoints): self
    {
        $self = clone $this;
        $self['numberOfPoints'] = $numberOfPoints;

        return $self;
    }

    /**
     * The reference ID of the equipment network operator or owner.
     */
    public function withOperatorID(int $operatorID): self
    {
        $self = clone $this;
        $self['operatorID'] = $operatorID;

        return $self;
    }

    /**
     * An Operator is the public organisation which controls a network of charging points.
     *
     * @param OperatorInfo|OperatorInfoShape $operatorInfo
     */
    public function withOperatorInfo(OperatorInfo|array $operatorInfo): self
    {
        $self = clone $this;
        $self['operatorInfo'] = $operatorInfo;

        return $self;
    }

    /**
     * The network operators own reference for this site (may be a site reference or a single equipment reference).
     */
    public function withOperatorsReference(string $operatorsReference): self
    {
        $self = clone $this;
        $self['operatorsReference'] = $operatorsReference;

        return $self;
    }

    /**
     * If present, this data in this POI supercedes information in another POI. Generally not relevant to consumers.
     */
    public function withParentChargePointID(int $parentChargePointID): self
    {
        $self = clone $this;
        $self['parentChargePointID'] = $parentChargePointID;

        return $self;
    }

    /**
     * The Status Type of a site or equipment item indicates whether it is generally operational.
     *
     * @param StatusType|StatusTypeShape $statusType
     */
    public function withStatusType(StatusType|array $statusType): self
    {
        $self = clone $this;
        $self['statusType'] = $statusType;

        return $self;
    }

    /**
     * The overall operational status type reference ID for this POI (i.e. Operational etc). 0 == Unknown.
     */
    public function withStatusTypeID(int $statusTypeID): self
    {
        $self = clone $this;
        $self['statusTypeID'] = $statusTypeID;

        return $self;
    }

    /**
     * Submission Status object, detailing the POI listing status.
     *
     * @param SubmissionStatus|SubmissionStatusShape $submissionStatus
     */
    public function withSubmissionStatus(
        SubmissionStatus|array $submissionStatus
    ): self {
        $self = clone $this;
        $self['submissionStatus'] = $submissionStatus;

        return $self;
    }

    /**
     * The reference ID for the submission status type which applied to this POI.
     */
    public function withSubmissionStatusTypeID(
        int $submissionStatusTypeID
    ): self {
        $self = clone $this;
        $self['submissionStatusTypeID'] = $submissionStatusTypeID;

        return $self;
    }

    /**
     * Free text description of likely usage costs associated with this site. Generally relates to parking charges whether network operates this site as Free.
     */
    public function withUsageCost(string $usageCost): self
    {
        $self = clone $this;
        $self['usageCost'] = $usageCost;

        return $self;
    }

    /**
     * The Usage Type of a site indicates the general restrictions on usage.
     *
     * @param UsageType|UsageTypeShape $usageType
     */
    public function withUsageType(UsageType|array $usageType): self
    {
        $self = clone $this;
        $self['usageType'] = $usageType;

        return $self;
    }

    /**
     * The reference ID for the site Usage Type, 0 == Unknown.
     */
    public function withUsageTypeID(int $usageTypeID): self
    {
        $self = clone $this;
        $self['usageTypeID'] = $usageTypeID;

        return $self;
    }

    /**
     * A list of user comments or check-ins for this site.
     *
     * @param list<UserComment|UserCommentShape> $userComments
     */
    public function withUserComments(array $userComments): self
    {
        $self = clone $this;
        $self['userComments'] = $userComments;

        return $self;
    }

    /**
     * A universally unique identifier used as surrogate key. ID and UUID must be preserved when submitting POI update information.
     */
    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
