<?php

declare(strict_types=1);

final class AsignaturaNotFoundException extends DomainException
{
    public static function becauseIdWasNotFound(string $id): self
    {
        return new self('No se encontró una asignatura con el ID: ' . $id);
    }
}