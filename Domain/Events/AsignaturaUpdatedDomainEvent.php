<?php

declare(strict_types=1);
require_once __DIR__ . '/EventDomain.php';
require_once __DIR__ . '/../Models/AsignaturaModel.php';

final class AsignaturaUpdatedDomainEvent extends DomainEvent
{
    private AsignaturaModel $asignatura;

    public function __construct(AsignaturaModel $asignatura)
    {
        parent::__construct('asignatura.updated');
        $this->asignatura = $asignatura;
    }

    public function asignatura(): AsignaturaModel
    {
        return $this->asignatura;
    }

    public function payload(): array
    {
        return array(
            'id' => $this->asignatura->id()->value(),
            'nombre' => $this->asignatura->nombre()->value(),
            'nombreCompleto' => $this->asignatura->nombreCompleto()->value(),
            'descripcion' => $this->asignatura->descripcion()->value(),
            'areaConocimiento' => $this->asignatura->areaConocimiento()->value(),
            'carrera' => $this->asignatura->carrera()->value(),
            'numeroCreditos' => $this->asignatura->numeroCreditos()->value(),
            'contenidoTematico' => $this->asignatura->contenidoTematico()->value(),
            'semestre' => $this->asignatura->semestre()->value(),
            'profesor' => $this->asignatura->profesor()->value()
        );
    }
}
