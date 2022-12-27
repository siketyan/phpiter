<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @template TAnother
 * @extends AbstractIterator<array{TItem, TAnother}>
 * @implements Transformer<array{TItem, TAnother}>
 */
class Zip extends AbstractIterator implements Transformer
{
    /**
     * @param Iterator<TItem>    $left
     * @param Iterator<TAnother> $right
     */
    public function __construct(
        private readonly Iterator $left,
        private readonly Iterator $right,
    ) {
    }

    /**
     * @return Option<array{TItem, TAnother}>
     */
    public function next(): Option
    {
        if (($left = $this->left->next())->isNone() || ($right = $this->right->next())->isNone()) {
            return Option::none();
        }

        return Option::some([$left->unwrap(), $right->unwrap()]);
    }
}
