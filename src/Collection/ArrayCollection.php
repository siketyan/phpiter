<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Collection;

use Siketyan\PhpIter\Initiator\Slice;

/**
 * @template TItem
 * @implements Collection<TItem>
 */
class ArrayCollection implements Collection
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

    /**
     * @return TItem[]
     */
    public function toArray(): array
    {
        return $this->inner;
    }
}
