<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, array{}>
 */
class ForEach_ implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     * @param \Closure(TItem): void $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return array{}
     */
    public function __invoke(): array
    {
        while (($value = $this->inner->next())->isSome()) {
            $this->fn->call($this, $value->unwrap());
        }

        return [];
    }
}
