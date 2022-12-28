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
class Peekable extends AbstractIterator implements Transformer
{
    /**
     * @var Option<TItem>
     */
    private Option $buffer;

    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
        $this->buffer = Option::none();
    }

    /**
     * @return Option<TItem>
     */
    public function next(): Option
    {
        if (($buffer = $this->buffer)->isSome()) {
            $this->buffer = Option::none();

            return $buffer;
        }

        return $this->inner->next();
    }

    /**
     * @return Option<TItem>
     */
    public function peek(): Option
    {
        return ($buffer = $this->buffer)->isSome()
            ? $buffer
            : $this->buffer = $this->next();
    }
}
