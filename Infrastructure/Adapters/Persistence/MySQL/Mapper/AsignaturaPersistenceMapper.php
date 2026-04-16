<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/AsignaturaPersistenceDto.php';
require_once __DIR__ . '/../Entity/AsignaturaEntity.php';
require_once __DIR__ . '/../../../../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaId.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaNombre.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaNombreCompleto.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaDescripcion.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaAreaConocimiento.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaCarrera.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaNumeroCreditos.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaContenidoTematico.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaSemestre.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaProfesor.php';

final class AsignaturaPersistenceMapper
{
    public function fromModelToDto(AsignaturaModel $asignatura): AsignaturaPersistenceDto
    {
        return new AsignaturaPersistenceDto(
            $asignatura->id()->value(),
            $asignatura->nombre()->value(),
            $asignatura->nombreCompleto()->value(),
            $asignatura->descripcion()->value(),
            $asignatura->areaConocimiento()->value(),
            $asignatura->carrera()->value(),
            $asignatura->numeroCreditos()->value(),
            $asignatura->contenidoTematico()->value(),
            $asignatura->semestre()->value(),
            $asignatura->profesor()->value()
        );
    }

    public function fromDtoToEntity(AsignaturaPersistenceDto $dto): AsignaturaEntity
    {
        return new AsignaturaEntity(
            $dto->id(),
            $dto->nombre(),
            $dto->nombreCompleto(),
            $dto->descripcion(),
            $dto->areaConocimiento(),
            $dto->carrera(),
            $dto->numeroCreditos(),
            $dto->contenidoTematico(),
            $dto->semestre(),
            $dto->profesor()
        );
    }

    public function fromRowToEntity(array $row): AsignaturaEntity
    {
        return new AsignaturaEntity(
            (string) $row['id'],
            (string) $row['nombre'],
            (string) $row['nombreCompleto'],
            (string) $row['descripcion'],
            (string) $row['areaConocimiento'],
            (string) $row['carrera'],
            (int) $row['numeroCreditos'],
            (string) $row['contenidoTematico'],
            (int) $row['semestre'],
            (string) $row['profesor'],
            isset($row['created_at']) ? (string) $row['created_at'] : null,
            isset($row['updated_at']) ? (string) $row['updated_at'] : null
        );
    }

    public function fromEntityToModel(AsignaturaEntity $entity): AsignaturaModel
    {
        return new AsignaturaModel(
            new AsignaturaId($entity->id()),
            new AsignaturaNombre($entity->nombre()),
            new AsignaturaNombreCompleto($entity->nombreCompleto()),
            new AsignaturaDescripcion($entity->descripcion()),
            new AsignaturaAreaConocimiento($entity->areaConocimiento()),
            new AsignaturaCarrera($entity->carrera()),
            new AsignaturaNumeroCreditos($entity->numeroCreditos()),
            new AsignaturaContenidoTematico($entity->contenidoTematico()),
            new AsignaturaSemestre($entity->semestre()),
            new AsignaturaProfesor($entity->profesor())
        );
    }

    public function fromRowToModel(array $row): AsignaturaModel
    {
        return $this->fromEntityToModel($this->fromRowToEntity($row));
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     * @return AsignaturaModel[]
     */
    public function fromRowsToModels(array $rows): array
    {
        $models = array();
        foreach ($rows as $row) {
            $models[] = $this->fromRowToModel($row);
        }
        return $models;
    }
}
