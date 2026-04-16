<?php

declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Queries/GetAllAsignaturasQuery.php';
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';

interface GetAllAsignaturasUseCase
{
    /** @return AsignaturaModel[] */ 
    public function execute(GetAllAsignaturasQuery $query): array;
}
