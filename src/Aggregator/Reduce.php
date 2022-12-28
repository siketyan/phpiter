<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, Option<TItem>>
 */
class Reduce implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     * @param \Closure(TItem, TItem): TItem $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function __invoke(): Option
    {
        $acc = Option::none();

        while (($value = $this->inner->next())->isSome()) {
            $acc = $acc->isSome()
                ? Option::some($this->fn->call($this, $acc->unwrap(), $value->unwrap()))
                : $value;
        }

        return $acc;
    }
}
