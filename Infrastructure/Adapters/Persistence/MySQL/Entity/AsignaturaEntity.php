<?php

declare(strict_types=1);

final class AsignaturaEntity
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
    private ?string $createdAt;
    private ?string $updatedAt;

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
        string $profesor,
        ?string $createdAt = null,
        ?string $updatedAt = null
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
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }

    public function nombreCompleto(): string
    {
        return $this->nombreCompleto;
    }

    public function descripcion(): string
    {
        return $this->descripcion;
    }

    public function areaConocimiento(): string
    {
        return $this->areaConocimiento;
    }

    public function carrera(): string
    {
        return $this->carrera;
    }

    public function numeroCreditos(): int
    {
        return $this->numeroCreditos;
    }

    public function contenidoTematico(): string
    {
        return $this->contenidoTematico;
    }

    public function semestre(): int
    {
        return $this->semestre;
    }

    public function profesor(): string
    {
        return $this->profesor;
    }

    public function createdAt(): ?string
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?string
    {
        return $this->updatedAt;
    }
}
