<?php
class AsignaturaNotFoundException extends DomainException
{
    public static function becauseIdWasNotFound($id)
    {
        return new self('No se encontró una asignatura con el ID: ' . $id);
    }
}