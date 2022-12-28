<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class MapTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [123, 456, 789],
            Iter::of(['123', '456', '789'])
                ->map(fn (string $value): int => (int)$value)
                ->collect()
                ->toArray(),
        );
    }
}
