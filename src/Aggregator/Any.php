<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

/**
 * @template TItem
 * @extends Some<TItem>
 */
class Any extends Some
{
    public function __invoke(): bool
    {
        return !parent::__invoke();
    }
}
