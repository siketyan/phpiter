<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Aggregator\Collect;
use Siketyan\PhpIter\Collection\ArrayCollection;
use Siketyan\PhpIter\Transformer\Map;

/**
 * @template TItem
 * @implements Iterator<TItem>
 */
abstract class AbstractIterator implements Iterator
{
    public function __private_extend_abstract_iterator(): void
    {
    }

    /**
     * @template TOut
     * @param  \Closure(TItem): TOut $fn
     * @return Map<TItem, TOut>
     */
    public function map(\Closure $fn): Map
    {
        return new Map($this, $fn);
    }

    /**
     * @return ArrayCollection<TItem>
     */
    public function collect(): ArrayCollection
    {
        return (new Collect($this))();
    }
}
