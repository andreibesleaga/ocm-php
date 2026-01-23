<?php

declare(strict_types=1);

namespace Ocm\Poi\PoiListResponseItem;

use Ocm\Core\Attributes\Optional;
use Ocm\Core\Concerns\SdkModel;
use Ocm\Core\Contracts\BaseModel;
use Ocm\Poi\PoiListResponseItem\Connection\ConnectionType;
use Ocm\Poi\PoiListResponseItem\Connection\CurrentType;
use Ocm\Poi\PoiListResponseItem\Connection\Level;
use Ocm\Poi\PoiListResponseItem\Connection\StatusType;

/**
 * Details on the equipment type and power capability.
 *
 * If calling the API in verbose mode related models are also included in the result (e.g. ConnectionType, Level, StatusType, CurrentType)
 *
 * @phpstan-import-type ConnectionTypeShape from \Ocm\Poi\PoiListResponseItem\Connection\ConnectionType
 * @phpstan-import-type CurrentTypeShape from \Ocm\Poi\PoiListResponseItem\Connection\CurrentType
 * @phpstan-import-type LevelShape from \Ocm\Poi\PoiListResponseItem\Connection\Level
 * @phpstan-import-type StatusTypeShape from \Ocm\Poi\PoiListResponseItem\Connection\StatusType
 *
 * @phpstan-type ConnectionShape = array{
 *   amps?: int|null,
 *   comments?: string|null,
 *   connectionType?: null|ConnectionType|ConnectionTypeShape,
 *   connectionTypeID?: int|null,
 *   currentType?: null|CurrentType|CurrentTypeShape,
 *   currentTypeID?: int|null,
 *   id?: int|null,
 *   level?: null|Level|LevelShape,
 *   levelID?: int|null,
 *   powerKw?: float|null,
 *   quantity?: int|null,
 *   reference?: string|null,
 *   statusType?: null|\Ocm\Poi\PoiListResponseItem\Connection\StatusType|StatusTypeShape,
 *   statusTypeID?: int|null,
 *   voltage?: float|null,
 * }
 */
final class Connection implements BaseModel
{
    /** @use SdkModel<ConnectionShape> */
    use SdkModel;

    /**
     * EVSE supply max current in Amps.
     */
    #[Optional('Amps')]
    public ?int $amps;

    #[Optional('Comments')]
    public ?string $comments;

    /**
     * The type of end-user connection an EVSE supports.
     */
    #[Optional('ConnectionType')]
    public ?ConnectionType $connectionType;

    #[Optional('ConnectionTypeID')]
    public ?int $connectionTypeID;

    /**
     * Indicates the EVSE power supply type e.g. DC (Direct Current), AC (Single Phase), AC (3 Phase).
     */
    #[Optional('CurrentType')]
    public ?CurrentType $currentType;

    /**
     * The supply type reference ID (e.g. DC etc).
     */
    #[Optional('CurrentTypeID')]
    public ?int $currentTypeID;

    #[Optional('ID')]
    public ?int $id;

    /**
     * A general category for equipment power capability. Deprecated for general use. Currently computed automatically based on equipment power.
     */
    #[Optional('Level')]
    public ?Level $level;

    /**
     * @deprecated
     *
     * A general category for power capability. Depreceated in favour of documenting specific equipment power in kW.
     */
    #[Optional('LevelID')]
    public ?int $levelID;

    /**
     * Peak available power in kW.
     */
    #[Optional('PowerKW')]
    public ?float $powerKw;

    /**
     * Optional summary number of equipment items available with this specification.
     */
    #[Optional('Quantity')]
    public ?int $quantity;

    /**
     * Optional operators reference for this connection/port.
     */
    #[Optional('Reference')]
    public ?string $reference;

    /**
     * The Status Type of a site or equipment item indicates whether it is generally operational.
     */
    #[Optional('StatusType')]
    public ?StatusType $statusType;

    /**
     * Status Type reference ID. 0 = Unknown.
     */
    #[Optional('StatusTypeID')]
    public ?int $statusTypeID;

    /**
     * EVSE supply voltage.
     */
    #[Optional('Voltage')]
    public ?float $voltage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConnectionType|ConnectionTypeShape|null $connectionType
     * @param CurrentType|CurrentTypeShape|null $currentType
     * @param Level|LevelShape|null $level
     * @param StatusType|StatusTypeShape|null $statusType
     */
    public static function with(
        ?int $amps = null,
        ?string $comments = null,
        ConnectionType|array|null $connectionType = null,
        ?int $connectionTypeID = null,
        CurrentType|array|null $currentType = null,
        ?int $currentTypeID = null,
        ?int $id = null,
        Level|array|null $level = null,
        ?int $levelID = null,
        ?float $powerKw = null,
        ?int $quantity = null,
        ?string $reference = null,
        StatusType|array|null $statusType = null,
        ?int $statusTypeID = null,
        ?float $voltage = null,
    ): self {
        $self = new self;

        null !== $amps && $self['amps'] = $amps;
        null !== $comments && $self['comments'] = $comments;
        null !== $connectionType && $self['connectionType'] = $connectionType;
        null !== $connectionTypeID && $self['connectionTypeID'] = $connectionTypeID;
        null !== $currentType && $self['currentType'] = $currentType;
        null !== $currentTypeID && $self['currentTypeID'] = $currentTypeID;
        null !== $id && $self['id'] = $id;
        null !== $level && $self['level'] = $level;
        null !== $levelID && $self['levelID'] = $levelID;
        null !== $powerKw && $self['powerKw'] = $powerKw;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $reference && $self['reference'] = $reference;
        null !== $statusType && $self['statusType'] = $statusType;
        null !== $statusTypeID && $self['statusTypeID'] = $statusTypeID;
        null !== $voltage && $self['voltage'] = $voltage;

        return $self;
    }

    /**
     * EVSE supply max current in Amps.
     */
    public function withAmps(int $amps): self
    {
        $self = clone $this;
        $self['amps'] = $amps;

        return $self;
    }

    public function withComments(string $comments): self
    {
        $self = clone $this;
        $self['comments'] = $comments;

        return $self;
    }

    /**
     * The type of end-user connection an EVSE supports.
     *
     * @param ConnectionType|ConnectionTypeShape $connectionType
     */
    public function withConnectionType(
        ConnectionType|array $connectionType
    ): self {
        $self = clone $this;
        $self['connectionType'] = $connectionType;

        return $self;
    }

    public function withConnectionTypeID(int $connectionTypeID): self
    {
        $self = clone $this;
        $self['connectionTypeID'] = $connectionTypeID;

        return $self;
    }

    /**
     * Indicates the EVSE power supply type e.g. DC (Direct Current), AC (Single Phase), AC (3 Phase).
     *
     * @param CurrentType|CurrentTypeShape $currentType
     */
    public function withCurrentType(CurrentType|array $currentType): self
    {
        $self = clone $this;
        $self['currentType'] = $currentType;

        return $self;
    }

    /**
     * The supply type reference ID (e.g. DC etc).
     */
    public function withCurrentTypeID(int $currentTypeID): self
    {
        $self = clone $this;
        $self['currentTypeID'] = $currentTypeID;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A general category for equipment power capability. Deprecated for general use. Currently computed automatically based on equipment power.
     *
     * @param Level|LevelShape $level
     */
    public function withLevel(Level|array $level): self
    {
        $self = clone $this;
        $self['level'] = $level;

        return $self;
    }

    /**
     * A general category for power capability. Depreceated in favour of documenting specific equipment power in kW.
     */
    public function withLevelID(int $levelID): self
    {
        $self = clone $this;
        $self['levelID'] = $levelID;

        return $self;
    }

    /**
     * Peak available power in kW.
     */
    public function withPowerKw(float $powerKw): self
    {
        $self = clone $this;
        $self['powerKw'] = $powerKw;

        return $self;
    }

    /**
     * Optional summary number of equipment items available with this specification.
     */
    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Optional operators reference for this connection/port.
     */
    public function withReference(string $reference): self
    {
        $self = clone $this;
        $self['reference'] = $reference;

        return $self;
    }

    /**
     * The Status Type of a site or equipment item indicates whether it is generally operational.
     *
     * @param StatusType|StatusTypeShape $statusType
     */
    public function withStatusType(
        StatusType|array $statusType
    ): self {
        $self = clone $this;
        $self['statusType'] = $statusType;

        return $self;
    }

    /**
     * Status Type reference ID. 0 = Unknown.
     */
    public function withStatusTypeID(int $statusTypeID): self
    {
        $self = clone $this;
        $self['statusTypeID'] = $statusTypeID;

        return $self;
    }

    /**
     * EVSE supply voltage.
     */
    public function withVoltage(float $voltage): self
    {
        $self = clone $this;
        $self['voltage'] = $voltage;

        return $self;
    }
}
