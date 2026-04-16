<?php

declare(strict_types=1);
require_once __DIR__ . '/../Exceptions/InvalidAsignaturaIdException.php';

final class AsignaturaId
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw InvalidAsignaturaIdException::becauseValueIsEmpty();
        }
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(AsignaturaId $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
