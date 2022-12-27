<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Aggregator\Any;
use Siketyan\PhpIter\Aggregator\Collect;
use Siketyan\PhpIter\Aggregator\Count;
use Siketyan\PhpIter\Aggregator\Every;
use Siketyan\PhpIter\Aggregator\ForEach_;
use Siketyan\PhpIter\Aggregator\Nth;
use Siketyan\PhpIter\Aggregator\Some;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Collection\ArrayCollection;
use Siketyan\PhpIter\Transformer\Enumerate;
use Siketyan\PhpIter\Transformer\Filter;
use Siketyan\PhpIter\Transformer\FlatMap;
use Siketyan\PhpIter\Transformer\Map;
use Siketyan\PhpIter\Transformer\Skip;
use Siketyan\PhpIter\Transformer\SkipWhile;
use Siketyan\PhpIter\Transformer\Take;
use Siketyan\PhpIter\Transformer\TakeWhile;
use Siketyan\PhpIter\Transformer\Zip;

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
     * @return Enumerate<TItem>
     */
    public function enumerate(): Enumerate
    {
        return new Enumerate($this);
    }

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
     * @param \Closure(TItem): Iterator<TOut> $fn
     * @return FlatMap<TItem, TOut>
     */
    public function flatMap(\Closure $fn): FlatMap
    {
        return new FlatMap($this, $fn);
    }

    /**
     * @template TOut
     * @param \Closure(TItem): TOut $fn
     * @return Map<TItem, TOut>
     */
    public function map(\Closure $fn): Map
    {
        return new Map($this, $fn);
    }

    /**
     * @return Skip<TItem>
     */
    public function skip(int $count): Skip
    {
        return new Skip($this, $count);
    }

    /**
     * @param \Closure(TItem): bool $fn
     * @return SkipWhile<TItem>
     */
    public function skipWhile(\Closure $fn): SkipWhile
    {
        return new SkipWhile($this, $fn);
    }

    /**
     * @return Take<TItem>
     */
    public function take(int $count): Take
    {
        return new Take($this, $count);
    }

    /**
     * @param \Closure(TItem): bool $fn
     * @return TakeWhile<TItem>
     */
    public function takeWhile(\Closure $fn): TakeWhile
    {
        return new TakeWhile($this, $fn);
    }

    /**
     * @template TAnother
     * @param  Iterator<TAnother>   $another
     * @return Zip<TItem, TAnother>
     */
    public function zip(Iterator $another): Zip
    {
        return new Zip($this, $another);
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

    public function count(): int
    {
        return (new Count($this))();
    }

    /**
     * @param \Closure(TItem): bool $fn
     */
    public function every(\Closure $fn): bool
    {
        return (new Every($this, $fn))();
    }

    /**
     * @param \Closure(TItem): void $fn
     */
    public function forEach(\Closure $fn): void
    {
        (new ForEach_($this, $fn))();
    }

    /**
     * @return Option<TItem>
     */
    public function nth(int $n): Option
    {
        return (new Nth($this, $n))();
    }

    /**
     * @param null|\Closure(TItem): bool $fn
     */
    public function some(?\Closure $fn = null): bool
    {
        return (new Some($fn === null ? $this : new Filter($this, $fn)))();
    }

    /**
     * @return TItem[]
     */
    public function toArray(): array
    {
        return $this->collect()->toArray();
    }

    // endregion Aggregators
}
