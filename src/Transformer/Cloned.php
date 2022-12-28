<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\AbstractIterator;

/**
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Transformer<TItem>
 */
class Cloned extends AbstractIterator implements Transformer
{
    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        return $this->inner->next()->map(fn ($item) => clone $item);
    }
}
