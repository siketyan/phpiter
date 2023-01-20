<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Initiator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class IteratorTest extends TestCase
{
    public function test(): void
    {
        $generator = function (): \Generator {
            foreach ([1, 2, 3, 4, 5] as $i) {
                yield $i;
            }
        };

        $this->assertSame(
            [1, 2, 3, 4, 5],
            Iter::of($generator())
                ->take(5)
                ->toArray(),
        );
    }
}
