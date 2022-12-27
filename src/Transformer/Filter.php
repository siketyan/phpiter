<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Transformer<TItem>
 */
class Filter extends AbstractIterator implements Transformer
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
    public function next(): Option
    {
        while (($value = $this->inner->next())->isSome()) {
            if ($this->fn->call($this, $value->unwrap())) {
                return $value;
            }
        }

        return Option::none();
    }
}
