<?php

declare(strict_types=1);

final class CreateAsignaturaCommand
{
    private string $id;
    private string $nombre;
    private string $nombreCompleto;
    private string $descripcion;
    private string $areaConocimiento;
    private string $carrera;
    private int $numeroCreditos;
    private string $contenidoTematico;
    private int $semestre;
    private string $profesor;

    public function __construct(
        string $id,
        string $nombre,
        string $nombreCompleto,
        string $descripcion,
        string $areaConocimiento,
        string $carrera,
        int $numeroCreditos,
        string $contenidoTematico,
        int $semestre,
        string $profesor
    ) {
        $this->id = trim($id);
        $this->nombre = trim($nombre);
        $this->nombreCompleto = trim($nombreCompleto);
        $this->descripcion = trim($descripcion);
        $this->areaConocimiento = trim($areaConocimiento);
        $this->carrera = trim($carrera);
        $this->numeroCreditos = $numeroCreditos;
        $this->contenidoTematico = trim($contenidoTematico);
        $this->semestre = $semestre;
        $this->profesor = trim($profesor);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombreCompleto;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getAreaConocimiento(): string
    {
        return $this->areaConocimiento;
    }

    public function getCarrera(): string
    {
        return $this->carrera;
    }

    public function getNumeroCreditos(): int
    {
        return $this->numeroCreditos;
    }

    public function getContenidoTematico(): string
    {
        return $this->contenidoTematico;
    }

    public function getSemestre(): int
    {
        return $this->semestre;
    }

    public function getProfesor(): string
    {
        return $this->profesor;
    }
}
