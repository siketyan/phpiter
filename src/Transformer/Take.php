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
class Take extends AbstractIterator implements Transformer
{
    private int $cursor = 0;

    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly int $count,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        if ($this->cursor++ >= $this->count) {
            return Option::none();
        }

        return $this->inner->next();
    }
}
