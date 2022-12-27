<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;

use function Siketyan\PhpIter\iter;

class AnyTest extends TestCase
{
    public function test(): void
    {
        $this->assertFalse(
            iter([0, 0, 0, 1, 0])
                ->any(fn (int $value): bool => $value !== 0),
        );

        $this->assertFalse(
            iter([3, 0, 0, 1, 2])
                ->any(fn (int $value): bool => $value !== 0),
        );

        $this->assertFalse(
            iter([1, 2, 3, 4, 5])
                ->any(fn (int $value): bool => $value !== 0),
        );

        $this->assertTrue(
            iter([0, 0, 0, 0, 0])
                ->any(fn (int $value): bool => $value !== 0),
        );
    }
}
