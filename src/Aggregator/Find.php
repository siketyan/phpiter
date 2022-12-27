<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Transformer\Filter;

/**
 * @template TItem
 * @implements Aggregator<TItem, Option<TItem>>
 */
class Find implements Aggregator
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
     * @return Option<TItem>
     */
    public function __invoke(): Option
    {
        return (new Filter($this->inner, $this->fn))->next();
    }
}
