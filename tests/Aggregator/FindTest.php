<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class FindTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            2,
            Iter::of([1, 2, 3, 4, 5])
                ->find(fn (int $value): bool => $value % 2 === 0)
                ->unwrap(),
        );
    }
}
