<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Special\Number;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Aggregator\Product;
use Siketyan\PhpIter\Aggregator\Sum;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem of int|float|NumberLike
 * @extends AbstractIterator<TItem>
 * @implements Iterator<TItem>
 */
class NumberIterator extends AbstractIterator implements Iterator
{
    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        return $this->inner->next();
    }

    /**
     * @return TItem
     * @noinspection PhpDocSignatureInspection
     */
    public function product(): null|int|float|NumberLike
    {
        return (new Product($this))();
    }

    /**
     * @return TItem
     * @noinspection PhpDocSignatureInspection
     */
    public function sum(): null|int|float|NumberLike
    {
        return (new Sum($this))();
    }
}
