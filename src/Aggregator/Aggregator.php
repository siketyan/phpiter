<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

/**
 * @template TItem
 * @template TOutput
 */
interface Aggregator
{
    /**
     * @return TOutput
     */
    public function __invoke(): mixed;
}
