<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class PositionTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            2,
            Iter::of(['zero', 'one', 'two', 'three', 'four'])
                ->position(fn (string $value): bool => str_starts_with($value, 't'))
                ->unwrap(),
        );

        $this->assertTrue(
            Iter::of(['zero', 'one', 'two', 'three', 'four'])
                ->position(fn (string $value): bool => str_starts_with($value, 's'))
                ->isNone(),
        );

        $this->assertTrue(
            Iter::of([])
                ->position(fn (string $value): bool => true)
                ->isNone(),
        );
    }
}
