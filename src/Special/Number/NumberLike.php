<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Special\Number;

interface NumberLike
{
    public static function zero(): static;

    public static function one(): static;

    public static function add(self $another): static;

    public static function multiply(self $another): static;
}
