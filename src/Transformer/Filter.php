<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\AbstractIterator;
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
     * @return null|TItem
     */
    public function next(): mixed
    {
        while (($value = $this->inner->next()) !== null) {
            if ($this->fn->call($this, $value)) {
                return $value;
            }
        }

        return null;
    }
}
