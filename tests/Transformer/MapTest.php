<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Collection\ArrayCollection;

class MapTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [123, 456, 789],
            (new ArrayCollection(['123', '456', '789']))
                ->iter()
                ->map(fn (string $value): int => (int)$value)
                ->collect()
                ->toArray(),
        );
    }
}
