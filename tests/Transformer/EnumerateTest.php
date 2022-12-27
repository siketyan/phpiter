<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;

use function Siketyan\PhpIter\iter;

class EnumerateTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [
                [0, 'zero'],
                [1, 'one'],
                [2, 'two'],
                [3, 'three'],
                [4, 'four'],
            ],
            iter(['zero', 'one', 'two', 'three', 'four'])
                ->enumerate()
                ->collect()
                ->toArray(),
        );
    }
}
