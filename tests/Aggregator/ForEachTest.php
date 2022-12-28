<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Aggregator;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class ForEachTest extends TestCase
{
    public function test(): void
    {
        $array = [];

        Iter::of(['a', 'b', 'c', 'd', 'e'])
            ->forEach(function (string $value) use (&$array): void {
                $array[] = $value;
            });

        $this->assertSame(['a', 'b', 'c', 'd', 'e'], $array);
    }
}
