<?php

declare(strict_types=1);
require_once __DIR__ . '/../../Services/Dto/Commands/DeleteAsignaturaCommand.php';

interface DeleteAsignaturaUseCase
{
    public function execute(DeleteAsignaturaCommand $command): void;
}
