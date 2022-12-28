<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Aggregator\All;
use Siketyan\PhpIter\Aggregator\Any;
use Siketyan\PhpIter\Aggregator\Collect;
use Siketyan\PhpIter\Aggregator\Count;
use Siketyan\PhpIter\Aggregator\Eq;
use Siketyan\PhpIter\Aggregator\Find;
use Siketyan\PhpIter\Aggregator\FindMap;
use Siketyan\PhpIter\Aggregator\Fold;
use Siketyan\PhpIter\Aggregator\ForEach_;
use Siketyan\PhpIter\Aggregator\Last;
use Siketyan\PhpIter\Aggregator\Nth;
use Siketyan\PhpIter\Aggregator\Partition;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Collection\ArrayCollection;
use Siketyan\PhpIter\Transformer\Chain;
use Siketyan\PhpIter\Transformer\Cloned;
use Siketyan\PhpIter\Transformer\Cycle;
use Siketyan\PhpIter\Transformer\Enumerate;
use Siketyan\PhpIter\Transformer\Filter;
use Siketyan\PhpIter\Transformer\FilterMap;
use Siketyan\PhpIter\Transformer\FlatMap;
use Siketyan\PhpIter\Transformer\Inspect;
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
     * @param  Iterator<TItem> $another
     * @return Chain<TItem>
     */
    public function chain(Iterator $another): Chain
    {
        return new Chain($this, $another);
    }

    /**
     * @return Cloned<TItem>
     */
    public function cloned(): Cloned
    {
        return new Cloned($this);
    }

    /**
     * @return Cycle<TItem>
     */
    public function cycle(): Cycle
    {
        return new Cycle($this);
    }

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
     * @param \Closure(TItem): Option<TOut> $fn
     * @return FilterMap<TItem, TOut>
     */
    public function filterMap(\Closure $fn): FilterMap
    {
        return new FilterMap($this, $fn);
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
     * @param \Closure(TItem): void $fn
     * @return Inspect<TItem>
     */
    public function inspect(\Closure $fn): Inspect
    {
        return new Inspect($this, $fn);
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
    public function all(\Closure $fn): bool
    {
        return (new All($this, $fn))();
    }

    /**
     * @param null|\Closure(TItem): bool $fn
     */
    public function any(?\Closure $fn = null): bool
    {
        return (new Any($fn === null ? $this : new Filter($this, $fn)))();
    }

    /**
     * @param Iterator<TItem> $another
     */
    public function eq(Iterator $another): bool
    {
        return (new Eq($this, $another))();
    }

    /**
     * @param \Closure(TItem): bool $fn
     * @return Option<TItem>
     */
    public function find(\Closure $fn): Option
    {
        return (new Find($this, $fn))();
    }

    /**
     * @template TOut
     * @param \Closure(TItem): Option<TOut> $fn
     * @return Option<TOut>
     */
    public function findMap(\Closure $fn): Option
    {
        return (new FindMap($this, $fn))();
    }

    /**
     * @template TAcc
     * @param TAcc $init
     * @param \Closure(TAcc, TItem): TAcc $fn
     * @return TAcc
     */
    public function fold(mixed $init, \Closure $fn): mixed
    {
        return (new Fold($this, $init, $fn))();
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
    public function last(): Option
    {
        return (new Last($this))();
    }

    /**
     * @return Option<TItem>
     */
    public function nth(int $n): Option
    {
        return (new Nth($this, $n))();
    }

    /**
     * @param \Closure(TItem): bool $fn
     * @return array{TItem[], TItem[]}
     */
    public function partition(\Closure $fn): array
    {
        return (new Partition($this, $fn))();
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
