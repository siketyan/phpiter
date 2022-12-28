<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Initiator\Slice;
use Siketyan\PhpIter\Special\Number\NumberIterator;
use Siketyan\PhpIter\Special\Number\NumberLike;

class Iter
{
    /**
     * @template TItem
     * @param  TItem[]      $values
     * @return Slice<TItem>
     */
    public static function of(array $values): Slice
    {
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
}
