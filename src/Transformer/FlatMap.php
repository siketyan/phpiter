<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @template TOutput
 * @extends AbstractIterator<TOutput>
 * @implements Transformer<TOutput>
 */
class FlatMap extends AbstractIterator implements Transformer
{
    /**
     * @var null|Iterator<TOutput>
     */
    private ?Iterator $buffer = null;

    /**
     * @param Iterator<TItem> $inner
     * @param \Closure(TItem): Iterator<TOutput> $fn
     */
    public function __construct(
        private readonly Iterator $inner,
        private readonly \Closure $fn,
    ) {
    }

    /**
     * @return Option<TOutput>
     */
    public function next(): Option
    {
        if ($this->buffer === null) {
            if (($next = $this->inner->next()->map($this->fn))->isNone()) {
                return Option::none();
            }

            $this->buffer = $next->unwrap();
        }

        if (($value = $this->buffer->next())->isNone()) {
            $this->buffer = null;

            return $this->next();
        }

        return $value;
    }
}
