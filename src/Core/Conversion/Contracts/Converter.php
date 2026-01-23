<?php

declare(strict_types=1);

namespace Ocm\Core\Conversion\Contracts;

use Ocm\Core\Conversion\CoerceState;
use Ocm\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
