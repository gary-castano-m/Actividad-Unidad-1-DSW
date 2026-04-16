<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetAsignaturaByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAsignaturaByIdPort.php';
require_once __DIR__ . '/Mappers/AsignaturaApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/AsignaturaNotFoundException.php';
require_once __DIR__ . '/../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../Dto/Queries/GetAsignaturaByIdQuery.php';

final class GetAsignaturaByIdService implements GetAsignaturaByIdUseCase
{
    private GetAsignaturaByIdPort $getAsignaturaByIdPort;

    public function __construct(GetAsignaturaByIdPort $getAsignaturaByIdPort)
    {
        $this->getAsignaturaByIdPort = $getAsignaturaByIdPort;
    }

    public function execute(GetAsignaturaByIdQuery $query): AsignaturaModel
    {
        $asignaturaId = AsignaturaApplicationMapper::fromGetAsignaturaByIdQueryToAsignaturaId($query);
        $asignatura = $this->getAsignaturaByIdPort->getById($asignaturaId);

        if ($asignatura === null) {
            throw AsignaturaNotFoundException::becauseIdWasNotFound($asignaturaId->value());
        }

        return $asignatura;
    }
}
