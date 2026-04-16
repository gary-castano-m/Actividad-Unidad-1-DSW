<?php

declare(strict_types=1);

final class AsignaturaAlreadyExistsException extends DomainException
{
    public static function becauseNombreAlreadyExists(string $nombre): self
    {
        return new self('Ya existe una asignatura con el nombre: ' . $nombre);
    }
}