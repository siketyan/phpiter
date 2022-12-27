<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Transformer\FilterMap;

/**
 * @template TItem
 * @template TOutput
 * @implements Aggregator<TItem, Option<TOutput>>
 */
class FindMap implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     * @param \Closure(TItem): Option<TOutput> $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return Option<TOutput>
     */
    public function __invoke(): Option
    {
        return (new FilterMap($this->inner, $this->fn))->next();
    }
}
