<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class AllTest extends TestCase
{
    public function test(): void
    {
        $this->assertTrue(
            Iter::of([1, 2, 3, 4, 5])
                ->all(fn (int $value): bool => $value !== 0),
        );

        $this->assertTrue(
            Iter::of([1, 1, -1, -1, 1])
                ->all(fn (int $value): bool => $value !== 0),
        );

        $this->assertFalse(
            Iter::of([1, 2, 0, 4, 5])
                ->all(fn (int $value): bool => $value !== 0),
        );

        $this->assertFalse(
            Iter::of([0, 0, 0, 0, 0])
                ->all(fn (int $value): bool => $value !== 0),
        );
    }
}
