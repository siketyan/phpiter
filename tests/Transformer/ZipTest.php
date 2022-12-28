<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class ZipTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [
                [1, 'one'],
                [2, 'two'],
                [3, 'three'],
                [4, 'four'],
                [5, 'five'],
            ],
            Iter::of([1, 2, 3, 4, 5])
                ->zip(Iter::of(['one', 'two', 'three', 'four', 'five']))
                ->collect()
                ->toArray(),
        );
    }
}
