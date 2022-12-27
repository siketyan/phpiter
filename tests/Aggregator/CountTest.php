<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;

use function Siketyan\PhpIter\iter;

class CountTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            5,
            iter(['a', 'b', 'c', 'd', 'e'])
                ->count(),
        );
    }
}
