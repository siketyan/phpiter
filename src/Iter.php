<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Initiator\Iterator as IteratorInitiator;
use Siketyan\PhpIter\Initiator\Slice;
use Siketyan\PhpIter\Special\Monad\Monad;
use Siketyan\PhpIter\Special\Monad\MonadIterator;
use Siketyan\PhpIter\Special\Number\NumberIterator;
use Siketyan\PhpIter\Special\Number\NumberLike;

class Iter
{
    /**
     * @template TItem
     * @param  array<TItem>|\Iterator<mixed, TItem>  $values
     * @return Slice<TItem>|IteratorInitiator<TItem>
     */
    public static function of(array|\Iterator $values): Slice|IteratorInitiator
    {
        if ($values instanceof \Iterator) {
            return new IteratorInitiator($values);
        }

        return new Slice($values);
    }

    /**
     * @template TItem of float|int|NumberLike
     * @param  Iterator<TItem>       $iter
     * @return NumberIterator<TItem>
     */
    public static function number(Iterator $iter): NumberIterator
    {
        return new NumberIterator($iter);
    }

    /**
     * @template TItem of Monad<TInner>
     * @template TInner
     * @param  Iterator<TItem>              $iter
     * @return MonadIterator<TItem, TInner>
     */
    public static function monad(Iterator $iter): MonadIterator
    {
        return new MonadIterator($iter);
    }
}
