<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class EqTest extends TestCase
{
    public function test(): void
    {
        $this->assertTrue(
            Iter::of([1, 2, 3, 4, 5])
                ->eq(Iter::of([1, 2, 3, 4, 5])),
        );

        $this->assertTrue(
            Iter::of(['one', 'two', 'three', 'four', 'five'])
                ->eq(Iter::of(['one', 'two', 'three', 'four', 'five'])),
        );

        $this->assertFalse(
            Iter::of([1, 2, 3, 4, 5])
                ->eq(Iter::of([1, 2, 5, 4, 3])),
        );

        $this->assertFalse(
            Iter::of([1, 2, 3, 4, 5])
                ->eq(Iter::of([1, 2, 3, 4])),
        );
    }
}
