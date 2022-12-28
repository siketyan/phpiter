<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class ClonedTest extends TestCase
{
    public function test(): void
    {
        $source = [new \stdClass(), new \stdClass(), new \stdClass()];
        $actual = Iter::of($source)
            ->cloned()
            ->collect()
            ->toArray();

        $this->assertCount(count($source), $actual);

        for ($i = 0; $i < count($actual); ++$i) {
            $this->assertInstanceOf(\stdClass::class, $actual[$i]);
            $this->assertNotSame($source[$i], $actual[$i]);
        }
    }
}
