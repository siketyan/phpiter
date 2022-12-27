<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Aggregator\Any;
use Siketyan\PhpIter\Aggregator\Collect;
use Siketyan\PhpIter\Aggregator\Every;
use Siketyan\PhpIter\Aggregator\Some;
use Siketyan\PhpIter\Collection\ArrayCollection;
use Siketyan\PhpIter\Transformer\Filter;
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

    // region Transformers

    /**
     * @param \Closure(TItem): bool $fn
     * @return Filter<TItem>
     */
    public function filter(\Closure $fn): Filter
    {
        return new Filter($this, $fn);
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

    // endregion Transformers
    // region Aggregators

    /**
     * @param null|\Closure(TItem): bool $fn
     */
    public function any(?\Closure $fn = null): bool
    {
        return (new Any($fn === null ? $this : new Filter($this, $fn)))();
    }

    /**
     * @return ArrayCollection<TItem>
     */
    public function collect(): ArrayCollection
    {
        return (new Collect($this))();
    }

    /**
     * @param \Closure(TItem): bool $fn
     */
    public function every(\Closure $fn): bool
    {
        return (new Every($this, $fn))();
    }

    /**
     * @param null|\Closure(TItem): bool $fn
     */
    public function some(?\Closure $fn = null): bool
    {
        return (new Some($fn === null ? $this : new Filter($this, $fn)))();
    }

    // endregion Aggregators
}
