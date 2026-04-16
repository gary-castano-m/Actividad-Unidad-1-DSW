<?php

declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaId.php';

interface GetAsignaturaByIdPort
{
    public function getById(AsignaturaId $asignaturaId): ?AsignaturaModel;
}
