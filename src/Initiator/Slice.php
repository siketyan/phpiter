<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Initiator;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;

/**
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Initiator<TItem>
 */
class Slice extends AbstractIterator implements Initiator
{
    /**
     * @param TItem[] $inner
     */
    public function __construct(
        private readonly array $inner,
        private int $cursor = 0,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        if ($this->cursor >= count($this->inner)) {
            return Option::none();
        }

        return Option::some($this->inner[$this->cursor++]);
    }
}
