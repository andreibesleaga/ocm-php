<?php

declare(strict_types=1);

namespace Ocm\Referencedata\ReferencedataGetResponse;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Referencedata\ReferencedataGetResponse\DataProvider\DataProviderStatusType;

/**
 * A Data Provider is the controller of the source data set used to construct the details for this POI. Data has been transformed and interpreted from it's original form. Each Data Provider provides data either by an explicit license or agreement.
 *
 * @phpstan-import-type DataProviderStatusTypeShape from \Ocm\Referencedata\ReferencedataGetResponse\DataProvider\DataProviderStatusType
 *
 * @phpstan-type DataProviderShape = array{
 *   id: int,
 *   isRestrictedEdit: bool,
 *   comments?: string|null,
 *   dataProviderStatusType?: null|DataProviderStatusType|DataProviderStatusTypeShape,
 *   dateLastImported?: \DateTimeInterface|null,
 *   isApprovedImport?: bool|null,
 *   isOpenDataLicensed?: bool|null,
 *   license?: string|null,
 *   title?: string|null,
 *   websiteURL?: string|null,
 * }
 */
final class DataProvider implements BaseModel
{
    /** @use SdkModel<DataProviderShape> */
    use SdkModel;

    /**
     * The reference ID for this Data Provider.
     */
    #[Required('ID')]
    public int $id;

    /**
     * Currently not implemented. Indicates a potential editing restriction.
     */
    #[Required('IsRestrictedEdit')]
    public bool $isRestrictedEdit;

    /**
     * General public comments with information about this Data Provider.
     */
    #[Optional('Comments')]
    public ?string $comments;

    /**
     * Status object describing whether this data provider is currently enabled and the type of source (manual entry, imported etc).
     */
    #[Optional('DataProviderStatusType')]
    public ?DataProviderStatusType $dataProviderStatusType;

    /**
     * Date and time (UTC) the last import was performed for this data provider (if an import).
     */
    #[Optional('DateLastImported')]
    public ?\DateTimeInterface $dateLastImported;

    /**
     * If false, data may not be imported for this provider.
     */
    #[Optional('IsApprovedImport')]
    public ?bool $isApprovedImport;

    /**
     * If true, data provider uses an Open Data license.
     */
    #[Optional('IsOpenDataLicensed')]
    public ?bool $isOpenDataLicensed;

    /**
     * Summary of the licensing which applies for this Data Provider. Each Data Provider has one specific license or agreement. Usage of the data requires acceptance of the given license.
     */
    #[Optional('License')]
    public ?string $license;

    /**
     * The Title for this Data Provider.
     */
    #[Optional('Title')]
    public ?string $title;

    /**
     * Website URL for this data provider.
     */
    #[Optional('WebsiteURL')]
    public ?string $websiteURL;

    /**
     * `new DataProvider()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DataProvider::with(id: ..., isRestrictedEdit: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DataProvider)->withID(...)->withIsRestrictedEdit(...)
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
     * @param DataProviderStatusType|DataProviderStatusTypeShape|null $dataProviderStatusType
     */
    public static function with(
        int $id,
        bool $isRestrictedEdit = false,
        ?string $comments = null,
        DataProviderStatusType|array|null $dataProviderStatusType = null,
        ?\DateTimeInterface $dateLastImported = null,
        ?bool $isApprovedImport = null,
        ?bool $isOpenDataLicensed = null,
        ?string $license = null,
        ?string $title = null,
        ?string $websiteURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['isRestrictedEdit'] = $isRestrictedEdit;

        null !== $comments && $self['comments'] = $comments;
        null !== $dataProviderStatusType && $self['dataProviderStatusType'] = $dataProviderStatusType;
        null !== $dateLastImported && $self['dateLastImported'] = $dateLastImported;
        null !== $isApprovedImport && $self['isApprovedImport'] = $isApprovedImport;
        null !== $isOpenDataLicensed && $self['isOpenDataLicensed'] = $isOpenDataLicensed;
        null !== $license && $self['license'] = $license;
        null !== $title && $self['title'] = $title;
        null !== $websiteURL && $self['websiteURL'] = $websiteURL;

        return $self;
    }

    /**
     * The reference ID for this Data Provider.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Currently not implemented. Indicates a potential editing restriction.
     */
    public function withIsRestrictedEdit(bool $isRestrictedEdit): self
    {
        $self = clone $this;
        $self['isRestrictedEdit'] = $isRestrictedEdit;

        return $self;
    }

    /**
     * General public comments with information about this Data Provider.
     */
    public function withComments(string $comments): self
    {
        $self = clone $this;
        $self['comments'] = $comments;

        return $self;
    }

    /**
     * Status object describing whether this data provider is currently enabled and the type of source (manual entry, imported etc).
     *
     * @param DataProviderStatusType|DataProviderStatusTypeShape $dataProviderStatusType
     */
    public function withDataProviderStatusType(
        DataProviderStatusType|array $dataProviderStatusType
    ): self {
        $self = clone $this;
        $self['dataProviderStatusType'] = $dataProviderStatusType;

        return $self;
    }

    /**
     * Date and time (UTC) the last import was performed for this data provider (if an import).
     */
    public function withDateLastImported(
        \DateTimeInterface $dateLastImported
    ): self {
        $self = clone $this;
        $self['dateLastImported'] = $dateLastImported;

        return $self;
    }

    /**
     * If false, data may not be imported for this provider.
     */
    public function withIsApprovedImport(bool $isApprovedImport): self
    {
        $self = clone $this;
        $self['isApprovedImport'] = $isApprovedImport;

        return $self;
    }

    /**
     * If true, data provider uses an Open Data license.
     */
    public function withIsOpenDataLicensed(bool $isOpenDataLicensed): self
    {
        $self = clone $this;
        $self['isOpenDataLicensed'] = $isOpenDataLicensed;

        return $self;
    }

    /**
     * Summary of the licensing which applies for this Data Provider. Each Data Provider has one specific license or agreement. Usage of the data requires acceptance of the given license.
     */
    public function withLicense(string $license): self
    {
        $self = clone $this;
        $self['license'] = $license;

        return $self;
    }

    /**
     * The Title for this Data Provider.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Website URL for this data provider.
     */
    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }
}
