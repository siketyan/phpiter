<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class FoldTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            25,
            Iter::of([1, 2, 3, 4, 5])
                ->fold(10, fn (int $acc, int $value): int => $acc + $value),
        );
        $this->assertSame(
            ['one', 'two', 'three', 'four', 'five'],
            Iter::of(['one', 'two', 'three', 'four', 'five'])
                ->fold([], fn (array $acc, string $value): array => [...$acc, $value]),
        );
    }
}
