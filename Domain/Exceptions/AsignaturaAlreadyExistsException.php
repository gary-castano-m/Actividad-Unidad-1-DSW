<?php
class AsignaturaAlreadyExistsException extends DomainException
{
    public static function becauseNombreAlreadyExists($nombre)
    {
        return new self('Ya existe una asignatura con el nombre: ' . $nombre);
    }
}