<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

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
     * @return null|TItem
     */
    public function next(): mixed
    {
        $input = $this->inner->next();
        if ($input === null) {
            return null;
        }

        return $this->fn->call($this, $input);
    }
}
