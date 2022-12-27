<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Collection\ArrayCollection;

class SomeTest extends TestCase
{
    public function test(): void
    {
        $this->assertTrue(
            (new ArrayCollection([0, 0, 0, 1, 0]))
                ->iter()
                ->some(fn (int $value): bool => $value !== 0),
        );

        $this->assertTrue(
            (new ArrayCollection([3, 0, 0, 1, 2]))
                ->iter()
                ->some(fn (int $value): bool => $value !== 0),
        );

        $this->assertTrue(
            (new ArrayCollection([1, 2, 3, 4, 5]))
                ->iter()
                ->some(fn (int $value): bool => $value !== 0),
        );

        $this->assertFalse(
            (new ArrayCollection([0, 0, 0, 0, 0]))
                ->iter()
                ->some(fn (int $value): bool => $value !== 0),
        );
    }
}
