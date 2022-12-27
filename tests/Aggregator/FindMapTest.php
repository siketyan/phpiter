<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Atom\Option;

use function Siketyan\PhpIter\iter;

class FindMapTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            20,
            iter([1, 2, 3, 4, 5])
                ->findMap(fn (int $value): Option => $value % 2 === 0 ? Option::some($value * 10) : Option::none())
                ->unwrap(),
        );
    }
}
