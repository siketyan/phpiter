<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Initiator;

use Siketyan\PhpIter\AbstractIterator;

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
     * @return null|TItem
     */
    public function next(): mixed
    {
        if ($this->cursor >= count($this->inner)) {
            return null;
        }

        return $this->inner[$this->cursor++];
    }
}
