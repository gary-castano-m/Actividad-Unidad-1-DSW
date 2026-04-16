<?php

declare(strict_types=1);
require_once __DIR__ . '/../Exceptions/InvalidAsignaturaNumeroCreditosException.php';

final class AsignaturaNumeroCreditos
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw InvalidAsignaturaNumeroCreditosException::becauseValueIsNotPositive($value);
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(AsignaturaNumeroCreditos $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
