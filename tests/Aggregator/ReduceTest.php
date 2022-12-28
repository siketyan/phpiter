<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class ReduceTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            15,
            Iter::of([1, 2, 3, 4, 5])
                ->reduce(fn (int $acc, int $value): int => $acc + $value)
                ->unwrap(),
        );

        $this->assertSame(
            'onetwothreefourfive',
            Iter::of(['one', 'two', 'three', 'four', 'five'])
                ->reduce(fn (string $acc, string $value): string => $acc . $value)
                ->unwrap(),
        );

        $this->assertTrue(
            Iter::of([])
                ->reduce(fn (string $acc, string $value): string => $acc . $value)
                ->isNone(),
        );
    }
}
