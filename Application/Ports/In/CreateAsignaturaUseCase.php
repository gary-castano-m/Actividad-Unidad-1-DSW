<?php

declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Commands/CreateAsignaturaCommand.php';
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';

interface CreateAsignaturaUseCase
{
    public function execute(CreateAsignaturaCommand $command): AsignaturaModel;
}
