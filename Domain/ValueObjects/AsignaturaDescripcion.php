<?php

declare(strict_types=1);
require_once __DIR__ . '/../Exceptions/InvalidAsignaturaNombreException.php';

final class AsignaturaDescripcion
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw InvalidAsignaturaNombreException::becauseValueIsEmpty();
        }
        if (mb_strlen($normalized) < 10) {
            throw InvalidAsignaturaNombreException::becauseLengthIsTooShort(10);
        }
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(AsignaturaDescripcion $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
