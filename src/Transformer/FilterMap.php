<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

/**
 * @template TSource
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Transformer<TItem>
 */
class FilterMap extends AbstractIterator implements Transformer
{
    /**
     * @param Iterator<TSource> $inner
     * @param \Closure(TSource): Option<TItem> $fn
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
            $mapped = $this->fn->call($this, $value->unwrap());
            assert($mapped instanceof Option);

            if ($mapped->isSome()) {
                return $mapped;
            }
        }

        return Option::none();
    }
}
