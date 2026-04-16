<?php

declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';

interface UpdateAsignaturaPort
{
    public function update(AsignaturaModel $asignatura): AsignaturaModel;
}
