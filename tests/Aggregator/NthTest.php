<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;

use function Siketyan\PhpIter\iter;

class NthTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            'c',
            iter(['a', 'b', 'c', 'd', 'e'])
                ->nth(2)
                ->unwrap(),
        );
    }
}
