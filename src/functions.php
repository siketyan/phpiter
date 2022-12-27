<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

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
