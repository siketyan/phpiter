<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, bool>
 */
class Eq implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     * @param Iterator<TItem> $another
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly Iterator $another,
    ) {
    }

    public function __invoke(): bool
    {
        while (($value = $this->inner->next())->isSome()) {
            if (($another = $this->another->next())->isNone() || $another->unwrap() !== $value->unwrap()) {
                return false;
            }
        }

        return $this->another->next()->isNone();
    }
}
