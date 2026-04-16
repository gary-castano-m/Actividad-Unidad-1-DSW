<?php

declare(strict_types=1);

final class InvalidAsignaturaSemestreException extends InvalidArgumentException
{
    public static function becauseValueIsOutOfRange(int $value): self
    {
        return new self('El semestre debe estar entre 1 y 12. Valor recibido: ' . $value);
    }
}
