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
class Chain extends AbstractIterator implements Transformer
{
    /**
     * @param Iterator<TItem> $first
     * @param Iterator<TItem> $second
     */
    public function __construct(
        private readonly Iterator $first,
        private readonly Iterator $second,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        $second = $this->second;

        return $this->first->next()->orElse(function () use ($second) {
            return $second->next();
        });
    }
}
