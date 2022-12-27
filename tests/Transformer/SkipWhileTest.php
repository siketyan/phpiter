<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;

use function Siketyan\PhpIter\iter;

class SkipWhileTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [6, 7, 8, 9, 10],
            iter([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
                ->skipWhile(fn (int $value): bool => $value < 6)
                ->collect()
                ->toArray(),
        );
    }
}
