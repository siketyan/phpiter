<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Special\Number\NumberLike;
use Siketyan\PhpIter\Special\Number\NumberIterator;

if (!function_exists('iter')) {
    /**
     * @template TItem
     * @param  TItem[]                $array
     * @return Initiator\Slice<TItem>
     */
    function iter(array $array): Initiator\Slice
    {
        return new Initiator\Slice($array);
    }
}

if (!function_exists('number_iter')) {
    /**
     * @template TItem of int|float|NumberLike
     * @param  Iterator<TItem>       $inner
     * @return NumberIterator<TItem>
     */
    function number_iter(Iterator $inner): NumberIterator
    {
        return new NumberIterator($inner);
    }
}
