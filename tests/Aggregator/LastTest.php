<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class LastTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            'e',
            Iter::of(['a', 'b', 'c', 'd', 'e'])
                ->last()
                ->unwrap(),
        );

        $this->assertTrue(
            Iter::of([])
                ->last()
                ->isNone(),
        );
    }
}
