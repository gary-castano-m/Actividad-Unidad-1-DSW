<?php
class InvalidAsignaturaIdException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty()
    {
        return new self('El ID de la asignatura no puede estar vacío.');
    }
}