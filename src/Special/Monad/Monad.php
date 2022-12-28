<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Special\Monad;

/**
 * @template TItem
 */
interface Monad
{
    public function canUnwrap(): bool;

    /**
     * @return TItem
     */
    public function unwrap(): mixed;
}
