<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Collection\ArrayCollection;

class SimpleTest extends TestCase
{
    public function test(): void
    {
        $collection = new ArrayCollection([
            '123',
            '456',
            '789',
        ]);

        $actual = $collection
            ->iter()
            ->map(fn (string $value) => (int)$value)
            ->collect()
            ->toArray();

        $this->assertSame(
            [
                123,
                456,
                789,
            ],
            $actual,
        );
    }
}
