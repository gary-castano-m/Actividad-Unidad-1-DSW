<?php

declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Queries/GetAsignaturaByIdQuery.php';
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';

interface GetAsignaturaByIdUseCase
{
    public function execute(GetAsignaturaByIdQuery $query): AsignaturaModel;
}
