<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class ChainTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            Iter::of([1, 2, 3, 4, 5])
                ->chain(Iter::of([6, 7, 8, 9, 10]))
                ->collect()
                ->toArray(),
        );
    }
}
