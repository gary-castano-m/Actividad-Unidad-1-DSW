<?php

declare(strict_types=1);

require_once __DIR__ . '/Mapper/AsignaturaWebMapper.php';
require_once __DIR__ . '/../../../../Application/Ports/In/CreateAsignaturaUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/UpdateAsignaturaUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetAsignaturaByIdUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetAllAsignaturasUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/DeleteAsignaturaUseCase.php';
require_once __DIR__ . '/../../../../Application/Services/Dto/Queries/GetAllAsignaturasQuery.php';

final class AsignaturaController
{
    private CreateAsignaturaUseCase $createAsignaturaUseCase;
    private UpdateAsignaturaUseCase $updateAsignaturaUseCase;
    private GetAsignaturaByIdUseCase $getAsignaturaByIdUseCase;
    private GetAllAsignaturasUseCase $getAllAsignaturasUseCase;
    private DeleteAsignaturaUseCase $deleteAsignaturaUseCase;
    private AsignaturaWebMapper $mapper;

    public function __construct(
        CreateAsignaturaUseCase $createAsignaturaUseCase,
        UpdateAsignaturaUseCase $updateAsignaturaUseCase,
        GetAsignaturaByIdUseCase $getAsignaturaByIdUseCase,
        GetAllAsignaturasUseCase $getAllAsignaturasUseCase,
        DeleteAsignaturaUseCase $deleteAsignaturaUseCase,
        AsignaturaWebMapper $mapper
    ) {
        $this->createAsignaturaUseCase = $createAsignaturaUseCase;
        $this->updateAsignaturaUseCase = $updateAsignaturaUseCase;
        $this->getAsignaturaByIdUseCase = $getAsignaturaByIdUseCase;
        $this->getAllAsignaturasUseCase = $getAllAsignaturasUseCase;
        $this->deleteAsignaturaUseCase = $deleteAsignaturaUseCase;
        $this->mapper = $mapper;
    }

    /**
     * @return AsignaturaResponse[]
     */
    public function index(): array
    {
        $asignaturas = $this->getAllAsignaturasUseCase->execute(new GetAllAsignaturasQuery());
        return $this->mapper->fromModelsToResponses($asignaturas);
    }

    public function show(string $id): AsignaturaResponse
    {
        $query = $this->mapper->fromIdToGetByIdQuery($id);
        $asignatura = $this->getAsignaturaByIdUseCase->execute($query);
        return $this->mapper->fromModelToResponse($asignatura);
    }

    public function store(CreateAsignaturaRequest $request): AsignaturaResponse
    {
        $command = $this->mapper->fromCreateRequestToCommand($request);
        $asignatura = $this->createAsignaturaUseCase->execute($command);
        return $this->mapper->fromModelToResponse($asignatura);
    }

    public function update(UpdateAsignaturaRequest $request): AsignaturaResponse
    {
        $command = $this->mapper->fromUpdateRequestToCommand($request);
        $asignatura = $this->updateAsignaturaUseCase->execute($command);
        return $this->mapper->fromModelToResponse($asignatura);
    }

    public function delete(string $id): void
    {
        $command = $this->mapper->fromIdToDeleteCommand($id);
        $this->deleteAsignaturaUseCase->execute($command);
    }
}
