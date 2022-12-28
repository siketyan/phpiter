<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class PartitionTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [
                [2, 4, 6, 8, 10],
                [1, 3, 5, 7, 9],
            ],
            Iter::of([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
                ->partition(fn (int $value): bool => $value % 2 === 0),
        );

        $this->assertSame(
            [[], []],
            Iter::of([])
                ->partition(fn (int $value): bool => true),
        );
    }
}
