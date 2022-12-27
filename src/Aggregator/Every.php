<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, bool>
 */
class Every implements Aggregator
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

    public function __invoke(): bool
    {
        while (($value = $this->inner->next())->isSome()) {
            /** @noinspection PhpUnhandledExceptionInspection */
            if (!$this->fn->call($this, $value->unwrap())) {
                return false;
            }
        }

        return true;
    }
}
