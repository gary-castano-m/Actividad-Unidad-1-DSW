<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../../Application/Ports/Out/SaveAsignaturaPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/UpdateAsignaturaPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetAsignaturaByIdPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetAsignaturaByNombrePort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/GetAllAsignaturasPort.php';
require_once __DIR__ . '/../../../../../Application/Ports/Out/DeleteAsignaturaPort.php';
require_once __DIR__ . '/../Mapper/AsignaturaPersistenceMapper.php';
require_once __DIR__ . '/../../../../../Domain/Models/AsignaturaModel.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaId.php';
require_once __DIR__ . '/../../../../../Domain/ValueObjects/AsignaturaNombre.php';

final class AsignaturaRepositoryMySQL implements SaveAsignaturaPort, UpdateAsignaturaPort, GetAsignaturaByIdPort, GetAsignaturaByNombrePort, GetAllAsignaturasPort, DeleteAsignaturaPort
{
    private PDO $pdo;
    private AsignaturaPersistenceMapper $mapper;

    public function __construct(PDO $pdo, AsignaturaPersistenceMapper $mapper)
    {
        $this->pdo = $pdo;
        $this->mapper = $mapper;
    }

    public function save(AsignaturaModel $asignatura): AsignaturaModel
    {
        $dto = $this->mapper->fromModelToDto($asignatura);
        $sql = '
            INSERT INTO asignaturas (
                id, nombre, nombreCompleto, descripcion, areaConocimiento,
                carrera, numeroCreditos, contenidoTematico, semestre, profesor,
                created_at, updated_at
            )
            VALUES (
                :id, :nombre, :nombreCompleto, :descripcion, :areaConocimiento,
                :carrera, :numeroCreditos, :contenidoTematico, :semestre, :profesor,
                NOW(), NOW()
            )
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id' => $dto->id(),
            ':nombre' => $dto->nombre(),
            ':nombreCompleto' => $dto->nombreCompleto(),
            ':descripcion' => $dto->descripcion(),
            ':areaConocimiento' => $dto->areaConocimiento(),
            ':carrera' => $dto->carrera(),
            ':numeroCreditos' => $dto->numeroCreditos(),
            ':contenidoTematico' => $dto->contenidoTematico(),
            ':semestre' => $dto->semestre(),
            ':profesor' => $dto->profesor()
        ));

        $savedAsignatura = $this->getById(new AsignaturaId($dto->id()));
        if ($savedAsignatura === null) {
            throw new RuntimeException('La asignatura no pudo ser recuperada después de guardar.');
        }
        return $savedAsignatura;
    }

    public function update(AsignaturaModel $asignatura): AsignaturaModel
    {
        $dto = $this->mapper->fromModelToDto($asignatura);
        $sql = '
            UPDATE asignaturas
            SET nombre = :nombre,
                nombreCompleto = :nombreCompleto,
                descripcion = :descripcion,
                areaConocimiento = :areaConocimiento,
                carrera = :carrera,
                numeroCreditos = :numeroCreditos,
                contenidoTematico = :contenidoTematico,
                semestre = :semestre,
                profesor = :profesor,
                updated_at = NOW()
            WHERE id = :id
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            ':id' => $dto->id(),
            ':nombre' => $dto->nombre(),
            ':nombreCompleto' => $dto->nombreCompleto(),
            ':descripcion' => $dto->descripcion(),
            ':areaConocimiento' => $dto->areaConocimiento(),
            ':carrera' => $dto->carrera(),
            ':numeroCreditos' => $dto->numeroCreditos(),
            ':contenidoTematico' => $dto->contenidoTematico(),
            ':semestre' => $dto->semestre(),
            ':profesor' => $dto->profesor()
        ));

        $updatedAsignatura = $this->getById(new AsignaturaId($dto->id()));
        if ($updatedAsignatura === null) {
            throw new RuntimeException('La asignatura no pudo ser recuperada después de actualizar.');
        }
        return $updatedAsignatura;
    }

    public function getById(AsignaturaId $asignaturaId): ?AsignaturaModel
    {
        $sql = '
            SELECT id, nombre, nombreCompleto, descripcion, areaConocimiento,
                   carrera, numeroCreditos, contenidoTematico, semestre, profesor,
                   created_at, updated_at
            FROM asignaturas
            WHERE id = :id
            LIMIT 1
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(':id' => $asignaturaId->value()));
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        return $this->mapper->fromRowToModel($row);
    }

    public function getByNombre(AsignaturaNombre $nombre): ?AsignaturaModel
    {
        $sql = '
            SELECT id, nombre, nombreCompleto, descripcion, areaConocimiento,
                   carrera, numeroCreditos, contenidoTematico, semestre, profesor,
                   created_at, updated_at
            FROM asignaturas
            WHERE nombre = :nombre
            LIMIT 1
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(':nombre' => $nombre->value()));
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        return $this->mapper->fromRowToModel($row);
    }

    /**
     * @return AsignaturaModel[]
     */
    public function getAll(): array
    {
        $sql = '
            SELECT id, nombre, nombreCompleto, descripcion, areaConocimiento,
                   carrera, numeroCreditos, contenidoTematico, semestre, profesor,
                   created_at, updated_at
            FROM asignaturas
            ORDER BY nombre ASC
        ';
        $statement = $this->pdo->query($sql);
        $rows = $statement->fetchAll();
        return $this->mapper->fromRowsToModels($rows);
    }

    public function delete(AsignaturaId $asignaturaId): void
    {
        $sql = 'DELETE FROM asignaturas WHERE id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(':id' => $asignaturaId->value()));
    }
}
