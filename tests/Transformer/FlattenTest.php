<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iter;

class FlattenTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            [1, 2, 3],
            Iter::monad(Iter::of([Option::some(1), Option::none(), Option::some(2), Option::none(), Option::some(3)]))
                ->flatten()
                ->toArray(),
        );

        $this->assertSame(
            [1, 2],
            Iter::monad(Iter::of([Option::none(), Option::some(1), Option::none(), Option::some(2), Option::none()]))
                ->flatten()
                ->toArray(),
        );

        $this->assertSame(
            [],
            Iter::monad(Iter::of([Option::none(), Option::none(), Option::none()]))
                ->flatten()
                ->toArray(),
        );
    }
}
