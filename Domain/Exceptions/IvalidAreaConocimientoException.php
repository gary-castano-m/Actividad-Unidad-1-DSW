<?php

final class InvalidAreaConocimientoException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid($value)
    {
        return new self('El área de conocimiento es inválida: ' . $value);
    }
}