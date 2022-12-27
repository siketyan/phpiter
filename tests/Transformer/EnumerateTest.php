<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Collection\ArrayCollection;

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
            (new ArrayCollection(['zero', 'one', 'two', 'three', 'four']))
                ->iter()
                ->enumerate()
                ->collect()
                ->toArray(),
        );
    }
}
