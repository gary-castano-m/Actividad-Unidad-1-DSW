<?php

declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Commands/UpdateAsignaturaCommand.php';
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';

interface UpdateAsignaturaUseCase
{
    public function execute(UpdateAsignaturaCommand $command): AsignaturaModel;
}
