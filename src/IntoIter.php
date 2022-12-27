<?php

declare(strict_types=1);

namespace Siketyan\PhpIter;

/**
 * @template TItem
 */
interface IntoIter
{
    /**
     * @return Iterator<TItem>
     */
    public function iter(): Iterator;
}
