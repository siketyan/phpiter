<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Transformer;

use Siketyan\PhpIter\Initiator;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @extends Zip<int, TItem>
 */
class Enumerate extends Zip
{
    public function __construct(
        Iterator $inner,
    ) {
        parent::__construct(new Initiator\Enumerate(), $inner);
    }
}
