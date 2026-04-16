<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/CreateAsignaturaUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveAsignaturaPort.php';
require_once __DIR__ . '/../Ports/Out/GetAsignaturaByNombrePort.php';
require_once __DIR__ . '/Mappers/AsignaturaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/AsignaturaAlreadyExistsException.php';
require_once __DIR__ . '/../../Domain/ValueObjects/AsignaturaNombre.php';

final class CreateAsignaturaService implements CreateAsignaturaUseCase
{
    private SaveAsignaturaPort $saveAsignaturaPort;
    private GetAsignaturaByNombrePort $getAsignaturaByNombrePort;

    public function __construct(SaveAsignaturaPort $saveAsignaturaPort, GetAsignaturaByNombrePort $getAsignaturaByNombrePort)
    {
        $this->saveAsignaturaPort = $saveAsignaturaPort;
        $this->getAsignaturaByNombrePort = $getAsignaturaByNombrePort;
    }

    public function execute(CreateAsignaturaCommand $command): AsignaturaModel
    {
        $nombre = new AsignaturaNombre($command->getNombre());
        $existingAsignatura = $this->getAsignaturaByNombrePort->getByNombre($nombre);

        if ($existingAsignatura !== null) {
            throw AsignaturaAlreadyExistsException::becauseNombreAlreadyExists($nombre->value());
        }

        $asignatura = AsignaturaApplicationMapper::fromCreateCommandToModel($command);
        return $this->saveAsignaturaPort->save($asignatura);
    }
}
