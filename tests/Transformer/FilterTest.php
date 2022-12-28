<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class FilterTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [1, 3, 5, 7, 9],
            Iter::of([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
                ->filter(fn (int $value): bool => $value % 2 !== 0)
                ->collect()
                ->toArray(),
        );
    }
}
