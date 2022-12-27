<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\AbstractIterator;

/**
 * @template TSource
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Transformer<TItem>
 */
class Map extends AbstractIterator implements Transformer
{
    /**
     * @param Iterator<TSource> $inner
     * @param \Closure(TSource): TItem $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        return $this->inner->next()->map($this->fn);
    }
}
