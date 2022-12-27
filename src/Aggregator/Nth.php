<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Transformer\Skip;

/**
 * @template TItem
 * @implements Aggregator<TItem, Option<TItem>>
 */
class Nth implements Aggregator
{
    /**
     * @var Skip<TItem>
     */
    private readonly Skip $inner;

    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        Iterator $inner,
        int $n,
    ) {
        $this->inner = new Skip($inner, $n);
    }

    /**
     * @return Option<TItem>
     */
    public function __invoke(): Option
    {
        return $this->inner->next();
    }
}
