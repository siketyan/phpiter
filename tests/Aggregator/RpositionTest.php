<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class RpositionTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            3,
            Iter::of(['zero', 'one', 'two', 'three', 'four'])
                ->rposition(fn (string $value): bool => str_starts_with($value, 't'))
                ->unwrap(),
        );

        $this->assertTrue(
            Iter::of(['zero', 'one', 'two', 'three', 'four'])
                ->rposition(fn (string $value): bool => str_starts_with($value, 's'))
                ->isNone(),
        );

        $this->assertTrue(
            Iter::of([])
                ->rposition(fn (string $value): bool => true)
                ->isNone(),
        );
    }
}
