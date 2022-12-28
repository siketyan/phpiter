<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Transformer\Enumerate;

/**
 * @template TItem
 * @implements Aggregator<TItem, Option<int>>
 */
class Position implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     * @param \Closure(TItem): bool $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return Option<int>
     */
    public function __invoke(): Option
    {
        $predicate = $this->fn;

        return (new Enumerate($this->inner))
            ->find(fn (array $e) => $predicate->call($this, $e[1]))
            ->map(fn (array $e) => $e[0]);
    }
}
