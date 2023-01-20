<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Initiator;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator as IteratorInterface;

/**
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements IteratorInterface<TItem>
 */
class Iterator extends AbstractIterator implements IteratorInterface
{
    /**
     * @param \Iterator<mixed, TItem> $iterator
     */
    public function __construct(
        private readonly \Iterator $iterator,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        if (!$this->iterator->valid()) {
            return Option::none();
        }

        $current = $this->iterator->current();
        $this->iterator->next();

        return Option::some($current);
    }
}
