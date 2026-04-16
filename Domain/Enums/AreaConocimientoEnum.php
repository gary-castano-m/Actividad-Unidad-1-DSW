<?php

declare(strict_types=1);
require_once __DIR__ . '/../Exceptions/InvalidAreaConocimientoException.php';

final class AreaConocimientoEnum
{
    public const HUMANIDADES = 'HUMANIDADES';
    public const INGENIERIAS = 'INGENIERIAS';

    public static function values(): array
    {
        return array(self::HUMANIDADES, self::INGENIERIAS);
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw InvalidAreaConocimientoException::becauseValueIsInvalid($value);
        }
    }
}