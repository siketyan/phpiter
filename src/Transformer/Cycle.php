<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\AbstractIterator;

/**
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Transformer<TItem>
 */
class Cycle extends AbstractIterator implements Transformer
{
    /**
     * @var TItem[]
     */
    private array $buffer = [];

    private int $cursor = 0;

    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        if (($value = $this->inner->next())->isSome()) {
            $this->buffer[] = $value->unwrap();

            return $value;
        }

        if ($this->cursor >= count($this->buffer)) {
            $this->cursor = 0;
        }

        return Option::some($this->buffer[$this->cursor++]);
    }
}
