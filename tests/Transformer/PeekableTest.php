<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\Iter;

class PeekableTest extends TestCase
{
    public function test(): void
    {
        $iter = Iter::of([1, 2, 3])
            ->peekable();

        $this->assertSame(1, $iter->peek()->unwrap());
        $this->assertSame(1, $iter->next()->unwrap());
        $this->assertSame(2, $iter->next()->unwrap());
        $this->assertSame(3, $iter->peek()->unwrap());
        $this->assertSame(3, $iter->peek()->unwrap());
        $this->assertSame(3, $iter->next()->unwrap());
        $this->assertTrue($iter->peek()->isNone());
        $this->assertTrue($iter->next()->isNone());
    }
}
