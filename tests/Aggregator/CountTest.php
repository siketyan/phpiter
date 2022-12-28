<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class CountTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            5,
            Iter::of(['a', 'b', 'c', 'd', 'e'])
                ->count(),
        );
    }
}
