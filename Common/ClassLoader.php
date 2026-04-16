<?php

declare(strict_types=1);
final class ClassLoader
{
    /** * @var array<string, string> */ private static array $classMap = array(
        // User Domain
        'InvalidUserEmailException' => 'Domain/Exceptions/InvalidUserEmailException.php',
        'InvalidUserIdException' => 'Domain/Exceptions/InvalidUserIdException.php',
        'InvalidUserNameException' => 'Domain/Exceptions/InvalidUserNameException.php',
        'InvalidUserPasswordException' => 'Domain/Exceptions/InvalidUserPasswordException.php',
        'InvalidUserRoleException' => 'Domain/Exceptions/InvalidUserRoleException.php',
        'InvalidUserStatusException' => 'Domain/Exceptions/InvalidUserStatusException.php',
        'UserAlreadyExistsException' => 'Domain/Exceptions/UserAlreadyExistsException.php',
        'UserNotFoundException' => 'Domain/Exceptions/UserNotFoundException.php',
        'InvalidCredentialsException' => 'Domain/Exceptions/InvalidCredentialsException.php',
        'UserRoleEnum' => 'Domain/Enums/UserRoleEnum.php',
        'UserStatusEnum' => 'Domain/Enums/UserStatusEnum.php',
        'AreaConocimientoEnum' => 'Domain/Enums/AreaConocimientoEnum.php',
        'UserId' => 'Domain/ValueObjects/UserId.php',
        'UserName' => 'Domain/ValueObjects/UserName.php',
        'UserEmail' => 'Domain/ValueObjects/UserEmail.php',
        'UserPassword' => 'Domain/ValueObjects/UserPassword.php',
        'UserModel' => 'Domain/Models/UserModel.php',
        // Asignatura Domain
        'InvalidAsignaturaIdException' => 'Domain/Exceptions/InvalidAsignaturaIdException.php',
        'InvalidAsignaturaNombreException' => 'Domain/Exceptions/InvalidAsignaturaNombreException.php',
        'InvalidAsignaturaNumeroCreditosException' => 'Domain/Exceptions/InvalidAsignaturaNumeroCreditosException.php',
        'InvalidAsignaturaSemestreException' => 'Domain/Exceptions/InvalidAsignaturaSemestreException.php',
        'AsignaturaAlreadyExistsException' => 'Domain/Exceptions/AsignaturaAlreadyExistsException.php',
        'AsignaturaNotFoundException' => 'Domain/Exceptions/AsignaturaNotFoundException.php',
        'IvalidAreaConocimientoException' => 'Domain/Exceptions/IvalidAreaConocimientoException.php',
        'AsignaturaId' => 'Domain/ValueObjects/AsignaturaId.php',
        'AsignaturaNombre' => 'Domain/ValueObjects/AsignaturaNombre.php',
        'AsignaturaNombreCompleto' => 'Domain/ValueObjects/AsignaturaNombreCompleto.php',
        'AsignaturaDescripcion' => 'Domain/ValueObjects/AsignaturaDescripcion.php',
        'AsignaturaAreaConocimiento' => 'Domain/ValueObjects/AsignaturaAreaConocimiento.php',
        'AsignaturaCarrera' => 'Domain/ValueObjects/AsignaturaCarrera.php',
        'AsignaturaNumeroCreditos' => 'Domain/ValueObjects/AsignaturaNumeroCreditos.php',
        'AsignaturaContenidoTematico' => 'Domain/ValueObjects/AsignaturaContenidoTematico.php',
        'AsignaturaSemestre' => 'Domain/ValueObjects/AsignaturaSemestre.php',
        'AsignaturaProfesor' => 'Domain/ValueObjects/AsignaturaProfesor.php',
        'AsignaturaModel' => 'Domain/Models/AsignaturaModel.php',
        'EventDomain' => 'Domain/Events/EventDomain.php',
        'UserCreatedDomainEvent' => 'Domain/Events/UserCreatedDomainEvent.php',
        'UserDeletedDomainEvent' => 'Domain/Events/UserDeletedDomainEvent.php',
        'UserUpdatedDomainEvent' => 'Domain/Events/UserUpdatedDomainEvent.php',
        'AsignaturaCreatedDomainEvent' => 'Domain/Events/AsignaturaCreatedDomainEvent.php',
        'AsignaturaDeletedDomainEvent' => 'Domain/Events/AsignaturaDeletedDomainEvent.php',
        'AsignaturaUpdatedDomainEvent' => 'Domain/Events/AsignaturaUpdatedDomainEvent.php',
        // User Application Ports and Services
        'CreateUserUseCase' => 'Application/Ports/In/CreateUserUseCase.php',
        'UpdateUserUseCase' => 'Application/Ports/In/UpdateUserUseCase.php',
        'GetUserByIdUseCase' => 'Application/Ports/In/GetUserByIdUseCase.php',
        'GetAllUsersUseCase' => 'Application/Ports/In/GetAllUsersUseCase.php',
        'DeleteUserUseCase' => 'Application/Ports/In/DeleteUserUseCase.php',
        'LoginUseCase' => 'Application/Ports/In/LoginUseCase.php',
        'SaveUserPort' => 'Application/Ports/Out/SaveUserPort.php',
        'UpdateUserPort' => 'Application/Ports/Out/UpdateUserPort.php',
        'GetUserByIdPort' => 'Application/Ports/Out/GetUserByIdPort.php',
        'GetUserByEmailPort' => 'Application/Ports/Out/GetUserByEmailPort.php',
        'GetAllUsersPort' => 'Application/Ports/Out/GetAllUsersPort.php',
        'DeleteUserPort' => 'Application/Ports/Out/DeleteUserPort.php',
        'CreateUserCommand' => 'Application/Services/Dto/Commands/CreateUserCommand.php',
        'UpdateUserCommand' => 'Application/Services/Dto/Commands/UpdateUserCommand.php',
        'DeleteUserCommand' => 'Application/Services/Dto/Commands/DeleteUserCommand.php',
        'LoginCommand' => 'Application/Services/Dto/Commands/LoginCommand.php',
        'GetUserByIdQuery' => 'Application/Services/Dto/Queries/GetUserByIdQuery.php',
        'GetAllUsersQuery' => 'Application/Services/Dto/Queries/GetAllUsersQuery.php',
        'CreateUserService' => 'Application/Services/CreateUserService.php',
        'UpdateUserService' => 'Application/Services/UpdateUserService.php',
        'GetUserByIdService' => 'Application/Services/GetUserByIdService.php',
        'GetAllUsersService' => 'Application/Services/GetAllUsersService.php',
        'DeleteUserService' => 'Application/Services/DeleteUserService.php',
        'LoginService' => 'Application/Services/LoginService.php',
        'UserApplicationMapper' => 'Application/Services/Mappers/UserApplicationMapper.php',
        // Asignatura Application Ports and Services
        'CreateAsignaturaUseCase' => 'Application/Ports/In/CreateAsignaturaUseCase.php',
        'UpdateAsignaturaUseCase' => 'Application/Ports/In/UpdateAsignaturaUseCase.php',
        'GetAsignaturaByIdUseCase' => 'Application/Ports/In/GetAsignaturaByIdUseCase.php',
        'GetAllAsignaturasUseCase' => 'Application/Ports/In/GetAllAsignaturasUseCase.php',
        'DeleteAsignaturaUseCase' => 'Application/Ports/In/DeleteAsignaturaUseCase.php',
        'SaveAsignaturaPort' => 'Application/Ports/Out/SaveAsignaturaPort.php',
        'UpdateAsignaturaPort' => 'Application/Ports/Out/UpdateAsignaturaPort.php',
        'GetAsignaturaByIdPort' => 'Application/Ports/Out/GetAsignaturaByIdPort.php',
        'GetAsignaturaByNombrePort' => 'Application/Ports/Out/GetAsignaturaByNombrePort.php',
        'GetAllAsignaturasPort' => 'Application/Ports/Out/GetAllAsignaturasPort.php',
        'DeleteAsignaturaPort' => 'Application/Ports/Out/DeleteAsignaturaPort.php',
        'CreateAsignaturaCommand' => 'Application/Services/Dto/Commands/CreateAsignaturaCommand.php',
        'UpdateAsignaturaCommand' => 'Application/Services/Dto/Commands/UpdateAsignaturaCommand.php',
        'DeleteAsignaturaCommand' => 'Application/Services/Dto/Commands/DeleteAsignaturaCommand.php',
        'GetAsignaturaByIdQuery' => 'Application/Services/Dto/Queries/GetAsignaturaByIdQuery.php',
        'GetAllAsignaturasQuery' => 'Application/Services/Dto/Queries/GetAllAsignaturasQuery.php',
        'AsignaturaApplicationMapper' => 'Application/Services/Mappers/AsignaturaApplicationMapper.php',
        'CreateAsignaturaService' => 'Application/Services/CreateAsignaturaService.php',
        'UpdateAsignaturaService' => 'Application/Services/UpdateAsignaturaService.php',
        'GetAsignaturaByIdService' => 'Application/Services/GetAsignaturaByIdService.php',
        'GetAllAsignaturasService' => 'Application/Services/GetAllAsignaturasService.php',
        'DeleteAsignaturaService' => 'Application/Services/DeleteAsignaturaService.php',
        // Infrastructure
        'Connection' => 'Infrastructure/Adapters/Persistence/MySQL/Config/Connection.php',
        'UserPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/UserPersistenceDto.php',
        'UserEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/UserEntity.php',
        'UserPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/UserPersistenceMapper.php',
        'UserRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/UserRepositoryMySQL.php',
        'CreateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateUserRequest.php',
        'UpdateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateUserWebRequest.php',
        'LoginWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/LoginWebRequest.php',
        'UserResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UserResponse.php',
        'CreateAsignaturaRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateAsignaturaRequest.php',
        'UpdateAsignaturaRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateAsignaturaRequest.php',
        'AsignaturaResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/AsignaturaResponse.php',
        'UserWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/UserWebMapper.php',
        'AsignaturaWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/AsignaturaWebMapper.php',
        'UserController' => 'Infrastructure/Entrypoints/Web/Controllers/UserController.php',
        'WebRoutes' => 'Infrastructure/Entrypoints/Web/Controllers/Config/WebRoutes.php',
        'View' => 'Infrastructure/Entrypoints/Web/Presentation/View.php',
        'Flash' => 'Infrastructure/Entrypoints/Web/Presentation/Flash.php',
        'DependencyInjection' => 'Common/DependencyInjection.php',
    );
    public static function register(): void
    {
        spl_autoload_register(array(self::class, 'loadClass'));
    }
    public static function loadClass(string $className): void
    {
        if (!isset(self::$classMap[$className])) {
            return;
        }
        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];
        if (!file_exists($filePath)) {
            throw new RuntimeException(sprintf('No se encontró el archivo para la clase %s en %s', $className, $filePath));
        }
        require_once $filePath;
    }
}
