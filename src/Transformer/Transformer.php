<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @extends Iterator<TItem>
 */
interface Transformer extends Iterator
{
}
