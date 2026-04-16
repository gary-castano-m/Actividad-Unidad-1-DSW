<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/Commands/CreateAsignaturaCommand.php';
require_once __DIR__ . '/../Dto/Commands/UpdateAsignaturaCommand.php';
require_once __DIR__ . '/../Dto/Commands/DeleteAsignaturaCommand.php';
require_once __DIR__ . '/../Dto/Queries/GetAsignaturaByIdQuery.php';
require_once __DIR__ . '/../../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaNombre.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaNombreCompleto.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaDescripcion.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaAreaConocimiento.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaCarrera.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaNumeroCreditos.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaContenidoTematico.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaSemestre.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/AsignaturaProfesor.php';

final class AsignaturaApplicationMapper
{
    public static function fromCreateCommandToModel(CreateAsignaturaCommand $command): AsignaturaModel
    {
        return AsignaturaModel::create(
            new AsignaturaId($command->getId()),
            new AsignaturaNombre($command->getNombre()),
            new AsignaturaNombreCompleto($command->getNombreCompleto()),
            new AsignaturaDescripcion($command->getDescripcion()),
            new AsignaturaAreaConocimiento($command->getAreaConocimiento()),
            new AsignaturaCarrera($command->getCarrera()),
            new AsignaturaNumeroCreditos($command->getNumeroCreditos()),
            new AsignaturaContenidoTematico($command->getContenidoTematico()),
            new AsignaturaSemestre($command->getSemestre()),
            new AsignaturaProfesor($command->getProfesor())
        );
    }

    public static function fromUpdateCommandToModel(UpdateAsignaturaCommand $command): AsignaturaModel
    {
        return AsignaturaModel::create(
            new AsignaturaId($command->getId()),
            new AsignaturaNombre($command->getNombre()),
            new AsignaturaNombreCompleto($command->getNombreCompleto()),
            new AsignaturaDescripcion($command->getDescripcion()),
            new AsignaturaAreaConocimiento($command->getAreaConocimiento()),
            new AsignaturaCarrera($command->getCarrera()),
            new AsignaturaNumeroCreditos($command->getNumeroCreditos()),
            new AsignaturaContenidoTematico($command->getContenidoTematico()),
            new AsignaturaSemestre($command->getSemestre()),
            new AsignaturaProfesor($command->getProfesor())
        );
    }

    public static function fromGetAsignaturaByIdQueryToAsignaturaId(GetAsignaturaByIdQuery $query): AsignaturaId
    {
        return new AsignaturaId($query->getId());
    }

    public static function fromDeleteCommandToAsignaturaId(DeleteAsignaturaCommand $command): AsignaturaId
    {
        return new AsignaturaId($command->getId());
    }

    /**
     * @return array<string, string|int>
     */
    public static function fromModelToArray(AsignaturaModel $asignatura): array
    {
        return array(
            'id' => $asignatura->id()->value(),
            'nombre' => $asignatura->nombre()->value(),
            'nombreCompleto' => $asignatura->nombreCompleto()->value(),
            'descripcion' => $asignatura->descripcion()->value(),
            'areaConocimiento' => $asignatura->areaConocimiento()->value(),
            'carrera' => $asignatura->carrera()->value(),
            'numeroCreditos' => $asignatura->numeroCreditos()->value(),
            'contenidoTematico' => $asignatura->contenidoTematico()->value(),
            'semestre' => $asignatura->semestre()->value(),
            'profesor' => $asignatura->profesor()->value()
        );
    }

    /**
     * @param AsignaturaModel[] $asignaturas
     * @return array<int, array<string, string|int>>
     */
    public static function fromModelsToArray(array $asignaturas): array
    {
        $result = array();
        foreach ($asignaturas as $asignatura) {
            $result[] = self::fromModelToArray($asignatura);
        }
        return $result;
    }
}
