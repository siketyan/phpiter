<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;
use Siketyan\PhpIter\Iterator;

class FuseTest extends TestCase
{
    public function test(): void
    {
        $createIter = fn () => new class () extends AbstractIterator implements Iterator {
            private int $count = 0;

            public function next(): Option
            {
                return $this->count++ % 2 === 0
                    ? Option::some('ok')
                    : Option::none();
            }
        };

        $iter = $createIter();

        $this->assertTrue($iter->next()->isSome());
        $this->assertTrue($iter->next()->isNone());
        $this->assertTrue($iter->next()->isSome());
        $this->assertTrue($iter->next()->isNone());
        $this->assertTrue($iter->next()->isSome());

        $iter = $createIter()->fuse();

        $this->assertTrue($iter->next()->isSome());
        $this->assertTrue($iter->next()->isNone());
        $this->assertTrue($iter->next()->isNone());
        $this->assertTrue($iter->next()->isNone());
        $this->assertTrue($iter->next()->isNone());
    }
}
