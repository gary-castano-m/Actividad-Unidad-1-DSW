<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/DeleteAsignaturaUseCase.php';
require_once __DIR__ . '/../Ports/Out/DeleteAsignaturaPort.php';
require_once __DIR__ . '/../Ports/Out/GetAsignaturaByIdPort.php';
require_once __DIR__ . '/Mappers/AsignaturaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/AsignaturaNotFoundException.php';
require_once __DIR__ . '/../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../Dto/Commands/DeleteAsignaturaCommand.php';

final class DeleteAsignaturaService implements DeleteAsignaturaUseCase
{
    private DeleteAsignaturaPort $deleteAsignaturaPort;
    private GetAsignaturaByIdPort $getAsignaturaByIdPort;

    public function __construct(DeleteAsignaturaPort $deleteAsignaturaPort, GetAsignaturaByIdPort $getAsignaturaByIdPort)
    {
        $this->deleteAsignaturaPort = $deleteAsignaturaPort;
        $this->getAsignaturaByIdPort = $getAsignaturaByIdPort;
    }

    public function execute(DeleteAsignaturaCommand $command): void
    {
        $asignaturaId = AsignaturaApplicationMapper::fromDeleteCommandToAsignaturaId($command);
        $existingAsignatura = $this->getAsignaturaByIdPort->getById($asignaturaId);

        if ($existingAsignatura === null) {
            throw AsignaturaNotFoundException::becauseIdWasNotFound($asignaturaId->value());
        }

        $this->deleteAsignaturaPort->delete($asignaturaId);
    }
}
