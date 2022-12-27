<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Special\Number\NumberLike;

/**
 * @template TItem of int|float|NumberLike
 * @implements Aggregator<TItem, TItem>
 */
class Sum implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
    }

    /**
     * @return null|TItem
     */
    public function __invoke(): mixed
    {
        $sum = null;

        (new ForEach_($this->inner, function (mixed $value) use (&$sum): void {
            /** @var TItem $value */
            if ($sum === null) {
                /** @var TItem $init */
                $init = $value instanceof NumberLike
                    ? $value->init()
                    : (is_float($value) ? 0.0 : 0);

                $sum = $init;
            }

            if ($sum instanceof NumberLike) {
                assert($value instanceof NumberLike);
                $sum = $sum->add($value);
            } else {
                assert(is_float($value) || is_int($value));
                $sum = $sum + $value;
            }
        }))();

        /** @var null|TItem $sum */
        return $sum;
    }
}
