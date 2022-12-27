<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Collection;

use Siketyan\PhpIter\IntoIter;

/**
 * @template TItem
 * @extends IntoIter<TItem>
 */
interface Collection extends IntoIter
{
    /**
     * @return TItem[]
     */
    public function toArray(): array;
}
