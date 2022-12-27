<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;

use function Siketyan\PhpIter\iter;
use function Siketyan\PhpIter\number_iter;

class SumTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            15,
            number_iter(iter([1, 2, 3, 4, 5]))
                ->sum(),
        );

        $this->assertNull(
            number_iter(iter([]))
                ->sum(),
        );
    }
}
