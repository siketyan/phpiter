<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class CycleTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [1, 2, 3, 1, 2, 3, 1, 2],
            Iter::of([1, 2, 3])
                ->cycle()
                ->take(8)
                ->toArray(),
        );
    }
}
