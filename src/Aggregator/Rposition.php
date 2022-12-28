<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\Transformer\Enumerate;

/**
 * @template TItem
 * @implements Aggregator<TItem, Option<int>>
 */
class Rposition implements Aggregator
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
     * @return Option<int>
     */
    public function __invoke(): Option
    {
        $predicate = $this->fn;
        $last = Option::none();

        (new Enumerate($this->inner))
            ->filter(fn (array $e) => $predicate->call($this, $e[1]))
            ->forEach(function (array $e) use (&$last): void {
                $last = Option::some($e[0]);
            });

        return $last;
    }
}
