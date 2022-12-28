<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @template TAcc
 * @implements Aggregator<TItem, TAcc>
 */
class Fold implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     * @param TAcc            $init
     * @param \Closure(TAcc, TItem): TAcc $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly mixed $init,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return TAcc
     */
    public function __invoke(): mixed
    {
        $acc = $this->init;

        while (($value = $this->inner->next())->isSome()) {
            $acc = $this->fn->call($this, $acc, $value->unwrap());
        }

        return $acc;
    }
}
