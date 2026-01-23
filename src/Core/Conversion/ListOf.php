<?php

declare(strict_types=1);

namespace Ocm\Core\Conversion;

use Ocm\Core\Conversion\Concerns\ArrayOf;
use Ocm\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
