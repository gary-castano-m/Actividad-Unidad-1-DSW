<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/UpdateAsignaturaUseCase.php';
require_once __DIR__ . '/../Ports/Out/UpdateAsignaturaPort.php';
require_once __DIR__ . '/../Ports/Out/GetAsignaturaByIdPort.php';
require_once __DIR__ . '/Mappers/AsignaturaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/AsignaturaNotFoundException.php';
require_once __DIR__ . '/../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../../Domain/ValueObjects/AsignaturaId.php';
require_once __DIR__ . '/../Dto/Commands/UpdateAsignaturaCommand.php';

final class UpdateAsignaturaService implements UpdateAsignaturaUseCase
{
    private UpdateAsignaturaPort $updateAsignaturaPort;
    private GetAsignaturaByIdPort $getAsignaturaByIdPort;

    public function __construct(UpdateAsignaturaPort $updateAsignaturaPort, GetAsignaturaByIdPort $getAsignaturaByIdPort)
    {
        $this->updateAsignaturaPort = $updateAsignaturaPort;
        $this->getAsignaturaByIdPort = $getAsignaturaByIdPort;
    }

    public function execute(UpdateAsignaturaCommand $command): AsignaturaModel
    {
        $asignaturaId = new AsignaturaId($command->getId());
        $currentAsignatura = $this->getAsignaturaByIdPort->getById($asignaturaId);

        if ($currentAsignatura === null) {
            throw AsignaturaNotFoundException::becauseIdWasNotFound($asignaturaId->value());
        }

        $asignaturaToUpdate = AsignaturaApplicationMapper::fromUpdateCommandToModel($command);
        return $this->updateAsignaturaPort->update($asignaturaToUpdate);
    }
}
