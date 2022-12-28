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
class Fuse extends AbstractIterator implements Transformer
{
    private bool $consumed = false;

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
        if ($this->consumed) {
            return Option::none();
        }

        if (($value = $this->inner->next())->isNone()) {
            $this->consumed = true;
        }

        return $value;
    }
}
