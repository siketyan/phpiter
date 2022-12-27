<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Initiator;

use Siketyan\PhpIter\AbstractIterator;
use Siketyan\PhpIter\Atom\Option;

/**
 * @extends AbstractIterator<int>
 * @implements Initiator<int>
 */
class Enumerate extends AbstractIterator implements Initiator
{
    private int $cursor;

    public function __construct(
        int $start = 0,
        private readonly ?int $end = null,
        private readonly ?int $endInclusive = null,
        private readonly int $step = 1,
    ) {
        $this->cursor = $start;
    }

    /**
     * @return Option<int>
     */
    public function next(): Option
    {
        if (($this->endInclusive !== null && $this->cursor > $this->endInclusive)
            || ($this->end !== null && $this->cursor >= $this->end)) {
            return Option::none();
        }

        $value = $this->cursor;
        $this->cursor += $this->step;

        return Option::some($value);
    }
}
