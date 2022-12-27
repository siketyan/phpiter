<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Collection;

use Siketyan\PhpIter\Initiator\Slice;
use Siketyan\PhpIter\IntoIter;

/**
 * @template TItem
 * @implements IntoIter<TItem>
 */
class ArrayCollection implements IntoIter
{
    /**
     * @param TItem[] $inner
     */
    public function __construct(
        private readonly array $inner,
    ) {
    }

    /**
     * @return Slice<TItem>
     */
    public function iter(): Slice
    {
        return new Slice($this->inner);
    }
}
