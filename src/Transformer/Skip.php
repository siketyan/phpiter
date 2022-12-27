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
class Skip extends AbstractIterator implements Transformer
{
    private bool $consumed = false;

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
        if ($this->consumed) {
            return $this->inner->next();
        }

        for ($i = 0; $i < $this->count; ++$i) {
            $this->inner->next();
        }

        $this->consumed = true;

        return $this->next();
    }
}
