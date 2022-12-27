<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Special\Number;

interface NumberLike
{
    public static function init(): static;

    public static function add(self $another): static;
}
