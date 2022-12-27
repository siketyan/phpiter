<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Aggregator;

use Siketyan\PhpIter\Collection\ArrayCollection;
use Siketyan\PhpIter\Iterator;

/**
 * @template TItem
 * @implements Aggregator<TItem, ArrayCollection<TItem>>
 */
class Collect implements Aggregator
{
    /**
     * @param Iterator<TItem> $inner
     */
    public function __construct(
        private readonly Iterator $inner,
    ) {
    }

    /**
     * @return ArrayCollection<TItem>
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function __invoke(): ArrayCollection
    {
        /**
         * @var TItem[] $values
         * @noinspection PhpRedundantVariableDocTypeInspection
         */
        $values = [];

        while (($value = $this->inner->next())->isSome()) {
            /** @noinspection PhpUnhandledExceptionInspection */
            $values[] = $value->unwrap();
        }

        return new ArrayCollection($values);
    }
}
