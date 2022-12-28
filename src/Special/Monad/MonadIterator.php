<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Special\Monad;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Transformer\Flatten;

/**
 * @template TItem of Monad<TInner>
 * @template TInner
 * @extends AbstractIterator<TItem>
 * @implements Iterator<TItem>
 */
class MonadIterator extends AbstractIterator implements Iterator
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
        return $this->inner->next();
    }

    /**
     * @return Flatten<TItem, TInner>
     */
    public function flatten(): Flatten
    {
        return new Flatten($this);
    }
}
