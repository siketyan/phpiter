<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class NthTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            'c',
            Iter::of(['a', 'b', 'c', 'd', 'e'])
                ->nth(2)
                ->unwrap(),
        );
    }
}
