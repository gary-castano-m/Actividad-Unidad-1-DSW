<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaNombre.php';

interface GetAsignaturaByNombrePort
{
    public function getByNombre(AsignaturaNombre $nombre): ?AsignaturaModel;
}
