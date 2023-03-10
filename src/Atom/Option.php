<?php

declare(strict_types=1);

namespace Siketyan\PhpIter\Atom;

use Siketyan\PhpIter\Special\Monad\Monad;

/**
 * @template TItem
 */
class Option implements Monad
{
    /**
     * @param TItem $value
     */
    private function __construct(
        private readonly mixed $value,
        private readonly bool $isSome,
    ) {
    }

    /**
     * @template TValue
     * @param  TValue         $value
     * @return Option<TValue>
     */
    public static function some(mixed $value): self
    {
        return new self($value, true);
    }

    public static function none(): self
    {
        return new self(null, false);
    }

    public function isSome(): bool
    {
        return $this->isSome;
    }

    public function isNone(): bool
    {
        return !$this->isSome();
    }

    /**
     * @template TOut
     * @param \Closure(TItem): Option<TOut> $fn
     * @return Option<TOut>
     */
    public function andThen(\Closure $fn): self
    {
        return $this->isSome()
            ? $fn->call($this, $this->unwrap())
            : self::none();
    }

    /**
     * @param \Closure(): Option<TItem> $fn
     * @return Option<TItem>
     */
    public function orElse(\Closure $fn): self
    {
        return $this->isSome()
            ? $this
            : $fn->call($this);
    }

    /**
     * @template TOut
     * @param \Closure(TItem): TOut $fn
     * @return Option<TOut>
     */
    public function map(\Closure $fn): self
    {
        return $this->isSome()
            ? self::some($fn->call($this, $this->value))
            : self::none();
    }

    public function canUnwrap(): bool
    {
        return $this->isSome();
    }

    /**
     * @return TItem
     * @throws Panic
     */
    public function unwrap(): mixed
    {
        if (!$this->isSome()) {
            throw new Panic('the Option has no value');
        }

        return $this->value;
    }

    /**
     * @param  TItem $default
     * @return TItem
     */
    public function unwrapOr(mixed $default): mixed
    {
        return $this->isSome() ? $this->value : $default;
    }

    /**
     * @param \Closure(): TItem $fn
     * @return TItem
     */
    public function unwrapOrElse(\Closure $fn): mixed
    {
        return $this->isSome() ? $this->value : $fn();
    }
}
