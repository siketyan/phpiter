<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Initiator\Slice;
use Siketyan\PhpIter\Iterator;

use function Siketyan\PhpIter\iter;

class FlatMapTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame(
            ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
            iter(['123', '456', '789'])
                ->flatMap(fn (string $value): Iterator => new Slice(str_split($value)))
                ->collect()
                ->toArray(),
        );
    }
}
