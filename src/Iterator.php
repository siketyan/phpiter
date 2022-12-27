<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

use Siketyan\PhpIter\Atom\Option;

/**
 * @template TItem
 */
interface Iterator
{
    /**
     * @return Option<TItem>
     */
    public function next(): Option;

    public function __private_extend_abstract_iterator(): void;
}
