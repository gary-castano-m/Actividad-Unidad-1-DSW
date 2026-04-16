<?php

declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaId.php';

interface DeleteAsignaturaPort
{
    public function delete(AsignaturaId $asignaturaId): void;
}
