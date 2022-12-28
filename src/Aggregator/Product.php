<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Special\Number\NumberLike;

/**
 * @template TItem of int|float|NumberLike
 * @implements Aggregator<TItem, TItem>
 */
class Product implements Aggregator
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
        $product = null;

        (new ForEach_($this->inner, function (mixed $value) use (&$product): void {
            /** @var TItem $value */
            if ($product === null) {
                /** @var TItem $one */
                $one = $value instanceof NumberLike
                    ? $value->one()
                    : (is_float($value) ? 1.0 : 1);

                $product = $one;
            }

            if ($product instanceof NumberLike) {
                assert($value instanceof NumberLike);
                $product = $product->multiply($value);
            } else {
                assert(is_float($value) || is_int($value));
                $product = $product * $value;
            }
        }))();

        /** @var null|TItem $product */
        return $product;
    }
}
