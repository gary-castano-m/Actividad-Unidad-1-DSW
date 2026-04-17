CREATE TABLE IF NOT EXISTS users (
    id          VARCHAR(36)  NOT NULL,
    name        VARCHAR(100) NOT NULL,
    email       VARCHAR(150) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    role        VARCHAR(30)  NOT NULL,
    status      VARCHAR(30)  NOT NULL,
    created_at  DATETIME     NOT NULL,
    updated_at  DATETIME     NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uk_users_email (email)
);

CREATE TABLE IF NOT EXISTS asignatura (
    id VARCHAR(36) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    nombreCompleto VARCHAR(200) NOT NULL,
    descripcion TEXT,
    areaConocimiento VARCHAR(100),
    carrera VARCHAR(100),
    numeroCreditos INT NOT NULL,
    contenidoTematico TEXT,
    semestre INT,
    profesor VARCHAR(100)
);
