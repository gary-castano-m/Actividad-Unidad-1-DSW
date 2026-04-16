<?php
class InvalidAsignaturaNombreException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty()
    {
        return new self('El nombre de la asignatura no puede estar vacío.');
    }

    public static function becauseLengthIsTooShort($min)
    {
        return new self('El nombre de la asignatura debe tener al menos ' . $min . ' caracteres.');
    }
}