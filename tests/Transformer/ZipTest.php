<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;

use function Siketyan\PhpIter\iter;

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
            iter([1, 2, 3, 4, 5])
                ->zip(iter(['one', 'two', 'three', 'four', 'five']))
                ->collect()
                ->toArray(),
        );
    }
}
