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
class Inspect extends AbstractIterator implements Transformer
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
     * @return Option<TItem>
     */
    public function next(): Option
    {
        if (($value = $this->inner->next())->isSome()) {
            $this->fn->call($this, $value->unwrap());
        }

        return $value;
    }
}
