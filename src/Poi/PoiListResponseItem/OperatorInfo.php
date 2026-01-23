<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Attributes\Required;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Poi\PoiListResponseItem\OperatorInfo\AddressInfo;

/**
 * An Operator is the public organisation which controls a network of charging points.
 *
 * @phpstan-import-type AddressInfoShape from \Ocm\Poi\PoiListResponseItem\OperatorInfo\AddressInfo
 *
 * @phpstan-type OperatorInfoShape = array{
 *   id: int,
 *   addressInfo?: null|\Ocm\Poi\PoiListResponseItem\OperatorInfo\AddressInfo|AddressInfoShape,
 *   bookingURL?: string|null,
 *   comments?: string|null,
 *   contactEmail?: string|null,
 *   faultReportEmail?: string|null,
 *   isPrivateIndividual?: bool|null,
 *   isRestrictedEdit?: bool|null,
 *   phonePrimaryContact?: string|null,
 *   phoneSecondaryContact?: string|null,
 *   title?: string|null,
 *   websiteURL?: string|null,
 * }
 */
final class OperatorInfo implements BaseModel
{
    /** @use SdkModel<OperatorInfoShape> */
    use SdkModel;

    /**
     * Id.
     */
    #[Required('ID')]
    public int $id;

    /**
     * Geographic position for site and (nearest) address component information.
     */
    #[Optional('AddressInfo')]
    public ?AddressInfo $addressInfo;

    #[Optional('BookingURL')]
    public ?string $bookingURL;

    #[Optional('Comments')]
    public ?string $comments;

    #[Optional('ContactEmail')]
    public ?string $contactEmail;

    /**
     * Used to send automated notification to network operator if a user submits a fault report comment/check-in.
     */
    #[Optional('FaultReportEmail')]
    public ?string $faultReportEmail;

    /**
     * @deprecated
     *
     * If true, this operator represents a private individual
     */
    #[Optional('IsPrivateIndividual')]
    public ?bool $isPrivateIndividual;

    /**
     * If true, this network restricts community edits for OCM data.
     */
    #[Optional('IsRestrictedEdit')]
    public ?bool $isRestrictedEdit;

    /**
     * Primary contact number for network users.
     */
    #[Optional('PhonePrimaryContact')]
    public ?string $phonePrimaryContact;

    /**
     * Secondary contact number.
     */
    #[Optional('PhoneSecondaryContact')]
    public ?string $phoneSecondaryContact;

    /**
     * Title.
     */
    #[Optional('Title')]
    public ?string $title;

    /**
     * Website for more information about this network.
     */
    #[Optional('WebsiteURL')]
    public ?string $websiteURL;

    /**
     * `new OperatorInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OperatorInfo::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OperatorInfo)->withID(...)
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
     * @param AddressInfo|AddressInfoShape|null $addressInfo
     */
    public static function with(
        int $id,
        AddressInfo|array|null $addressInfo = null,
        ?string $bookingURL = null,
        ?string $comments = null,
        ?string $contactEmail = null,
        ?string $faultReportEmail = null,
        ?bool $isPrivateIndividual = null,
        ?bool $isRestrictedEdit = null,
        ?string $phonePrimaryContact = null,
        ?string $phoneSecondaryContact = null,
        ?string $title = null,
        ?string $websiteURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $addressInfo && $self['addressInfo'] = $addressInfo;
        null !== $bookingURL && $self['bookingURL'] = $bookingURL;
        null !== $comments && $self['comments'] = $comments;
        null !== $contactEmail && $self['contactEmail'] = $contactEmail;
        null !== $faultReportEmail && $self['faultReportEmail'] = $faultReportEmail;
        null !== $isPrivateIndividual && $self['isPrivateIndividual'] = $isPrivateIndividual;
        null !== $isRestrictedEdit && $self['isRestrictedEdit'] = $isRestrictedEdit;
        null !== $phonePrimaryContact && $self['phonePrimaryContact'] = $phonePrimaryContact;
        null !== $phoneSecondaryContact && $self['phoneSecondaryContact'] = $phoneSecondaryContact;
        null !== $title && $self['title'] = $title;
        null !== $websiteURL && $self['websiteURL'] = $websiteURL;

        return $self;
    }

    /**
     * Id.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Geographic position for site and (nearest) address component information.
     *
     * @param AddressInfo|AddressInfoShape $addressInfo
     */
    public function withAddressInfo(
        AddressInfo|array $addressInfo
    ): self {
        $self = clone $this;
        $self['addressInfo'] = $addressInfo;

        return $self;
    }

    public function withBookingURL(string $bookingURL): self
    {
        $self = clone $this;
        $self['bookingURL'] = $bookingURL;

        return $self;
    }

    public function withComments(string $comments): self
    {
        $self = clone $this;
        $self['comments'] = $comments;

        return $self;
    }

    public function withContactEmail(string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    /**
     * Used to send automated notification to network operator if a user submits a fault report comment/check-in.
     */
    public function withFaultReportEmail(string $faultReportEmail): self
    {
        $self = clone $this;
        $self['faultReportEmail'] = $faultReportEmail;

        return $self;
    }

    /**
     * If true, this operator represents a private individual.
     */
    public function withIsPrivateIndividual(bool $isPrivateIndividual): self
    {
        $self = clone $this;
        $self['isPrivateIndividual'] = $isPrivateIndividual;

        return $self;
    }

    /**
     * If true, this network restricts community edits for OCM data.
     */
    public function withIsRestrictedEdit(bool $isRestrictedEdit): self
    {
        $self = clone $this;
        $self['isRestrictedEdit'] = $isRestrictedEdit;

        return $self;
    }

    /**
     * Primary contact number for network users.
     */
    public function withPhonePrimaryContact(string $phonePrimaryContact): self
    {
        $self = clone $this;
        $self['phonePrimaryContact'] = $phonePrimaryContact;

        return $self;
    }

    /**
     * Secondary contact number.
     */
    public function withPhoneSecondaryContact(
        string $phoneSecondaryContact
    ): self {
        $self = clone $this;
        $self['phoneSecondaryContact'] = $phoneSecondaryContact;

        return $self;
    }

    /**
     * Title.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Website for more information about this network.
     */
    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }
}
