<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Collection\ArrayCollection;

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
            (new ArrayCollection([1, 2, 3, 4, 5]))
                ->iter()
                ->zip((new ArrayCollection(['one', 'two', 'three', 'four', 'five']))->iter())
                ->collect()
                ->toArray(),
        );
    }
}
