<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Initiator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Initiator\Enumerate;

class EnumerateTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [0, 1, 2, 3, 4, 5],
            (new Enumerate(end: 6))->collect()->toArray(),
        );

        $this->assertSame(
            [1, 2, 3, 4, 5],
            (new Enumerate(1, 6))->collect()->toArray(),
        );

        $this->assertSame(
            [1, 2, 3, 4, 5, 6],
            (new Enumerate(1, endInclusive: 6))->collect()->toArray(),
        );

        $this->assertSame(
            [0, 2, 4, 6, 8, 10],
            (new Enumerate(endInclusive: 10, step: 2))->collect()->toArray(),
        );

        $this->assertSame(
            [1, 3, 5, 7, 9],
            (new Enumerate(1, 10, step: 2))->collect()->toArray(),
        );
    }
}
