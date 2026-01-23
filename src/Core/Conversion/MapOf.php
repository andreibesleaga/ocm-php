<?php

declare(strict_types=1);

namespace Ocm\Core\Conversion;

use Ocm\Core\Conversion\Concerns\ArrayOf;
use Ocm\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
