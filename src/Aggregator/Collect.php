<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, TItem[]>
 */
class Collect implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
    }

    /**
     * @return TItem[]
     */
    public function __invoke(): array
    {
        $values = [];

        while (($value = $this->inner->next()) !== null) {
            $values[] = $value;
        }

        return $values;
    }
}
