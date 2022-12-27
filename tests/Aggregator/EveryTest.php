<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Collection\ArrayCollection;

class EveryTest extends TestCase
{
    public function test(): void
    {
        $this->assertTrue(
            (new ArrayCollection([1, 2, 3, 4, 5]))
                ->iter()
                ->every(fn (int $value): bool => $value !== 0),
        );

        $this->assertTrue(
            (new ArrayCollection([1, 1, -1, -1, 1]))
                ->iter()
                ->every(fn (int $value): bool => $value !== 0),
        );

        $this->assertFalse(
            (new ArrayCollection([1, 2, 0, 4, 5]))
                ->iter()
                ->every(fn (int $value): bool => $value !== 0),
        );

        $this->assertFalse(
            (new ArrayCollection([0, 0, 0, 0, 0]))
                ->iter()
                ->every(fn (int $value): bool => $value !== 0),
        );
    }
}
