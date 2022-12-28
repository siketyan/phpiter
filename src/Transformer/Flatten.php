<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;
use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Special\Monad\Monad;

/**
 * @template TMonad of Monad<TItem>
 * @template TItem
 * @extends AbstractIterator<TItem>
 * @implements Transformer<TItem>
 */
class Flatten extends AbstractIterator implements Transformer
{
    /**
     * @param Iterator<TMonad> $inner
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
        $self = $this;

        /** @var Option<TItem> $value */
        $value = $this->inner->next() // phpcs:ignore
            ->andThen(
                fn (Monad $monad): Option => $monad->canUnwrap()
                    ? Option::some($monad->unwrap())
                    : $self->next(),
            );

        assert($value instanceof Option);

        return $value;
    }
}
