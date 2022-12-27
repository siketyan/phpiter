<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

/**
 * @template TItem
 */
interface Iterator
{
    /**
     * @return null|TItem
     */
    public function next(): mixed;

    public function __private_extend_abstract_iterator(): void;
}
