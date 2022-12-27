<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, int>
 */
class Count implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
    }

    public function __invoke(): int
    {
        $count = 0;

        while ($this->inner->next()->isSome()) {
            ++$count;
        }

        return $count;
    }
}
