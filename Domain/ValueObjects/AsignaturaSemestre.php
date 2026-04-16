<?php

declare(strict_types=1);
require_once __DIR__ . '/../Exceptions/InvalidAsignaturaSemestreException.php';

final class AsignaturaSemestre
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value <= 0 || $value > 12) {
            throw InvalidAsignaturaSemestreException::becauseValueIsOutOfRange($value);
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(AsignaturaSemestre $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
