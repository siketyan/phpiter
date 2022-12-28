<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class SumTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            15,
            Iter::number(Iter::of([1, 2, 3, 4, 5]))
                ->sum(),
        );

        $this->assertNull(
            Iter::number(Iter::of([]))
                ->sum(),
        );
    }
}
