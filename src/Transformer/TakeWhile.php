<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Transformer<TItem>
 */
class TakeWhile extends AbstractIterator implements Transformer
{
    private bool $consumed = false;

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
     * @return Option<TItem>
     */
    public function next(): Option
    {
        if ($this->consumed || ($take = ($value = $this->inner->next())->map($this->fn))->isSome() && !$take->unwrap()) {
            $this->consumed = true;

            return Option::none();
        }

        return $value;
    }
}
