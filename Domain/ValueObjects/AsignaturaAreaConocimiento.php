<?php

declare(strict_types=1);
require_once __DIR__ . '/../Enums/AreaConocimientoEnum.php';

final class AsignaturaAreaConocimiento
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        AreaConocimientoEnum::ensureIsValid($normalized);
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(AsignaturaAreaConocimiento $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
