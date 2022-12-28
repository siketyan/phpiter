<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iter;

class FilterMapTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [10, 30, 50, 70, 90],
            Iter::of([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
                ->filterMap(fn (int $value): Option => $value % 2 !== 0 ? Option::some($value * 10) : Option::none())
                ->collect()
                ->toArray(),
        );
    }
}
