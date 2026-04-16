<?php

declare(strict_types=1);
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';

interface GetAllAsignaturasPort
{
    /** @return AsignaturaModel[] */ 
    public function getAll(): array;
}
