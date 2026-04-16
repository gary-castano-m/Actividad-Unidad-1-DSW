<?php

declare(strict_types=1);
require_once __DIR__ . '/../ValueObjects/AsignaturaId.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaNombre.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaNombreCompleto.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaDescripcion.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaAreaConocimiento.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaCarrera.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaNumeroCreditos.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaContenidoTematico.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaSemestre.php';
require_once __DIR__ . '/../ValueObjects/AsignaturaProfesor.php';

final class AsignaturaModel
{
    private AsignaturaId $id;
    private AsignaturaNombre $nombre;
    private AsignaturaNombreCompleto $nombreCompleto;
    private AsignaturaDescripcion $descripcion;
    private AsignaturaAreaConocimiento $areaConocimiento;
    private AsignaturaCarrera $carrera;
    private AsignaturaNumeroCreditos $numeroCreditos;
    private AsignaturaContenidoTematico $contenidoTematico;
    private AsignaturaSemestre $semestre;
    private AsignaturaProfesor $profesor;

    public function __construct(
        AsignaturaId $id,
        AsignaturaNombre $nombre,
        AsignaturaNombreCompleto $nombreCompleto,
        AsignaturaDescripcion $descripcion,
        AsignaturaAreaConocimiento $areaConocimiento,
        AsignaturaCarrera $carrera,
        AsignaturaNumeroCreditos $numeroCreditos,
        AsignaturaContenidoTematico $contenidoTematico,
        AsignaturaSemestre $semestre,
        AsignaturaProfesor $profesor
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->nombreCompleto = $nombreCompleto;
        $this->descripcion = $descripcion;
        $this->areaConocimiento = $areaConocimiento;
        $this->carrera = $carrera;
        $this->numeroCreditos = $numeroCreditos;
        $this->contenidoTematico = $contenidoTematico;
        $this->semestre = $semestre;
        $this->profesor = $profesor;
    }

    public static function create(
        AsignaturaId $id,
        AsignaturaNombre $nombre,
        AsignaturaNombreCompleto $nombreCompleto,
        AsignaturaDescripcion $descripcion,
        AsignaturaAreaConocimiento $areaConocimiento,
        AsignaturaCarrera $carrera,
        AsignaturaNumeroCreditos $numeroCreditos,
        AsignaturaContenidoTematico $contenidoTematico,
        AsignaturaSemestre $semestre,
        AsignaturaProfesor $profesor
    ): self {
        return new self(
            $id,
            $nombre,
            $nombreCompleto,
            $descripcion,
            $areaConocimiento,
            $carrera,
            $numeroCreditos,
            $contenidoTematico,
            $semestre,
            $profesor
        );
    }

    public function id(): AsignaturaId
    {
        return $this->id;
    }

    public function nombre(): AsignaturaNombre
    {
        return $this->nombre;
    }

    public function nombreCompleto(): AsignaturaNombreCompleto
    {
        return $this->nombreCompleto;
    }

    public function descripcion(): AsignaturaDescripcion
    {
        return $this->descripcion;
    }

    public function areaConocimiento(): AsignaturaAreaConocimiento
    {
        return $this->areaConocimiento;
    }

    public function carrera(): AsignaturaCarrera
    {
        return $this->carrera;
    }

    public function numeroCreditos(): AsignaturaNumeroCreditos
    {
        return $this->numeroCreditos;
    }

    public function contenidoTematico(): AsignaturaContenidoTematico
    {
        return $this->contenidoTematico;
    }

    public function semestre(): AsignaturaSemestre
    {
        return $this->semestre;
    }

    public function profesor(): AsignaturaProfesor
    {
        return $this->profesor;
    }

    public function changeNombre(AsignaturaNombre $nombre): self
    {
        return new self(
            $this->id,
            $nombre,
            $this->nombreCompleto,
            $this->descripcion,
            $this->areaConocimiento,
            $this->carrera,
            $this->numeroCreditos,
            $this->contenidoTematico,
            $this->semestre,
            $this->profesor
        );
    }

    public function changeNombreCompleto(AsignaturaNombreCompleto $nombreCompleto): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $nombreCompleto,
            $this->descripcion,
            $this->areaConocimiento,
            $this->carrera,
            $this->numeroCreditos,
            $this->contenidoTematico,
            $this->semestre,
            $this->profesor
        );
    }

    public function changeDescripcion(AsignaturaDescripcion $descripcion): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $this->nombreCompleto,
            $descripcion,
            $this->areaConocimiento,
            $this->carrera,
            $this->numeroCreditos,
            $this->contenidoTematico,
            $this->semestre,
            $this->profesor
        );
    }

    public function changeAreaConocimiento(AsignaturaAreaConocimiento $areaConocimiento): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $this->nombreCompleto,
            $this->descripcion,
            $areaConocimiento,
            $this->carrera,
            $this->numeroCreditos,
            $this->contenidoTematico,
            $this->semestre,
            $this->profesor
        );
    }

    public function changeCarrera(AsignaturaCarrera $carrera): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $this->nombreCompleto,
            $this->descripcion,
            $this->areaConocimiento,
            $carrera,
            $this->numeroCreditos,
            $this->contenidoTematico,
            $this->semestre,
            $this->profesor
        );
    }

    public function changeNumeroCreditos(AsignaturaNumeroCreditos $numeroCreditos): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $this->nombreCompleto,
            $this->descripcion,
            $this->areaConocimiento,
            $this->carrera,
            $numeroCreditos,
            $this->contenidoTematico,
            $this->semestre,
            $this->profesor
        );
    }

    public function changeContenidoTematico(AsignaturaContenidoTematico $contenidoTematico): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $this->nombreCompleto,
            $this->descripcion,
            $this->areaConocimiento,
            $this->carrera,
            $this->numeroCreditos,
            $contenidoTematico,
            $this->semestre,
            $this->profesor
        );
    }

    public function changeSemestre(AsignaturaSemestre $semestre): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $this->nombreCompleto,
            $this->descripcion,
            $this->areaConocimiento,
            $this->carrera,
            $this->numeroCreditos,
            $this->contenidoTematico,
            $semestre,
            $this->profesor
        );
    }

    public function changeProfesor(AsignaturaProfesor $profesor): self
    {
        return new self(
            $this->id,
            $this->nombre,
            $this->nombreCompleto,
            $this->descripcion,
            $this->areaConocimiento,
            $this->carrera,
            $this->numeroCreditos,
            $this->contenidoTematico,
            $this->semestre,
            $profesor
        );
    }

    public function toArray(): array
    {
        return array(
            'id' => $this->id->value(),
            'nombre' => $this->nombre->value(),
            'nombreCompleto' => $this->nombreCompleto->value(),
            'descripcion' => $this->descripcion->value(),
            'areaConocimiento' => $this->areaConocimiento->value(),
            'carrera' => $this->carrera->value(),
            'numeroCreditos' => $this->numeroCreditos->value(),
            'contenidoTematico' => $this->contenidoTematico->value(),
            'semestre' => $this->semestre->value(),
            'profesor' => $this->profesor->value()
        );
    }
}
