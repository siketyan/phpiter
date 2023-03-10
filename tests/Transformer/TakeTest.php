<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class TakeTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [1, 2, 3, 4, 5],
            Iter::of([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
                ->take(5)
                ->collect()
                ->toArray(),
        );
    }
}
