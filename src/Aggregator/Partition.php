<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, array{TItem[], TItem[]}>
 */
class Partition implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     * @param \Closure(TItem): bool $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return array{TItem[], TItem[]}
     */
    public function __invoke(): array
    {
        $left = [];
        $right = [];

        while (($value = $this->inner->next())->isSome()) {
            if ($this->fn->call($this, $value->unwrap())) {
                $left[] = $value->unwrap();
            } else {
                $right[] = $value->unwrap();
            }
        }

        return [$left, $right];
    }
}
