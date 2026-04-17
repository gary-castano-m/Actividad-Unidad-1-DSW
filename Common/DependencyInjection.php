<?php

declare(strict_types=1);

require_once __DIR__ . '/ClassLoader.php';

final class DependencyInjection
{
    public static function boot(): void
    {
        ClassLoader::register();
    }
    public static function getConnection(): Connection
    {
        ClassLoader::loadClass('Connection');
        return new Connection(host: 'localhost', port: 3306, database: 'crud_usuarios', username: 'root', password: '', charset: 'utf8mb4');
    }
    public static function getPdo(): PDO
    {
        return self::getConnection()->createPdo();
    }
    public static function getUserPersistenceMapper(): UserPersistenceMapper
    {
        ClassLoader::loadClass('UserPersistenceMapper');
        return new UserPersistenceMapper();
    }
    public static function getUserRepository(): UserRepositoryMySQL
    {
        ClassLoader::loadClass('UserRepositoryMySQL');
        return new UserRepositoryMySQL(self::getPdo(), self::getUserPersistenceMapper());
    }
    public static function getCreateUserUseCase(): CreateUserUseCase
    {
        ClassLoader::loadClass('CreateUserService');
        $repo = self::getUserRepository();
        return new CreateUserService($repo, $repo);
    }
    public static function getUpdateUserUseCase(): UpdateUserUseCase
    {
        ClassLoader::loadClass('UpdateUserService');
        $repo = self::getUserRepository();
        return new UpdateUserService($repo, $repo, $repo);
    }
    public static function getDeleteUserUseCase(): DeleteUserUseCase
    {
        ClassLoader::loadClass('DeleteUserService');
        $repo = self::getUserRepository();
        return new DeleteUserService($repo, $repo);
    }
    public static function getGetUserByIdUseCase(): GetUserByIdUseCase
    {
        ClassLoader::loadClass('GetUserByIdService');
        return new GetUserByIdService(self::getUserRepository());
    }
    public static function getGetAllUsersUseCase(): GetAllUsersUseCase
    {
        ClassLoader::loadClass('GetAllUsersService');
        return new GetAllUsersService(self::getUserRepository());
    }
    public static function getLoginUseCase(): LoginUseCase
    {
        ClassLoader::loadClass('LoginService');
        return new LoginService(self::getUserRepository());
    }
    public static function getUserWebMapper(): UserWebMapper
    {
        ClassLoader::loadClass('UserWebMapper');
        return new UserWebMapper();
    }
    public static function getUserController(): UserController
    {
        ClassLoader::loadClass('UserController');
        return new UserController(
            self::getCreateUserUseCase(),
            self::getUpdateUserUseCase(),
            self::getGetUserByIdUseCase(),
            self::getGetAllUsersUseCase(),
            self::getDeleteUserUseCase(),
            self::getUserWebMapper()
        );
    }

    // Asignatura Services
    public static function getCreateAsignaturaUseCase(): CreateAsignaturaUseCase
    {
        ClassLoader::loadClass('CreateAsignaturaService');
        $repo = self::getAsignaturaRepository();
        return new CreateAsignaturaService($repo, $repo);
    }

    public static function getUpdateAsignaturaUseCase(): UpdateAsignaturaUseCase
    {
        ClassLoader::loadClass('UpdateAsignaturaService');
        $repo = self::getAsignaturaRepository();
        return new UpdateAsignaturaService($repo, $repo);
    }

    public static function getDeleteAsignaturaUseCase(): DeleteAsignaturaUseCase
    {
        ClassLoader::loadClass('DeleteAsignaturaService');
        $repo = self::getAsignaturaRepository();
        return new DeleteAsignaturaService($repo, $repo);
    }

    public static function getGetAsignaturaByIdUseCase(): GetAsignaturaByIdUseCase
    {
        ClassLoader::loadClass('GetAsignaturaByIdService');
        return new GetAsignaturaByIdService(self::getAsignaturaRepository());
    }

    public static function getGetAllAsignaturasUseCase(): GetAllAsignaturasUseCase
    {
        ClassLoader::loadClass('GetAllAsignaturasService');
        return new GetAllAsignaturasService(self::getAsignaturaRepository());
    }

    public static function getAsignaturaWebMapper(): AsignaturaWebMapper
    {
        ClassLoader::loadClass('AsignaturaWebMapper');
        return new AsignaturaWebMapper();
    }

    public static function getAsignaturaPersistenceMapper(): AsignaturaPersistenceMapper
    {
        ClassLoader::loadClass('AsignaturaPersistenceMapper');
        return new AsignaturaPersistenceMapper();
    }

    public static function getAsignaturaRepository(): AsignaturaRepositoryMySQL
    {
        ClassLoader::loadClass('AsignaturaRepositoryMySQL');
        return new AsignaturaRepositoryMySQL(self::getPdo(), self::getAsignaturaPersistenceMapper());
    }

    public static function getAsignaturaController(): AsignaturaController
    {
        ClassLoader::loadClass('AsignaturaController');
        return new AsignaturaController(
            self::getCreateAsignaturaUseCase(),
            self::getUpdateAsignaturaUseCase(),
            self::getGetAsignaturaByIdUseCase(),
            self::getGetAllAsignaturasUseCase(),
            self::getDeleteAsignaturaUseCase(),
            self::getAsignaturaWebMapper()
        );
    }
}
