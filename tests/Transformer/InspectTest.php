<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class InspectTest extends TestCase
{
    public function test(): void
    {
        $source = [1, 2, 3, 4, 5];
        $actual = [];

        $this->assertSame(
            $source,
            Iter::of($source)
                ->inspect(function (int $value) use (&$actual): void {
                    $actual[] = $value;
                })
                ->toArray(),
        );

        $this->assertSame($source, $actual);
    }
}
