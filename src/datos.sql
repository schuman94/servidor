DROP TABLE IF EXISTS departamentos CASCADE;
DROP TABLE IF EXISTS empleados CASCADE;

CREATE TABLE departamentos (
    id           BIGSERIAL    PRIMARY KEY,
    codigo       VARCHAR(2)   NOT NULL UNIQUE,
    denominacion VARCHAR(255) NOT NULL,
    localidad    VARCHAR(255)
);

CREATE TABLE empleados (
    id              BIGSERIAL    PRIMARY KEY,
    numero          VARCHAR(4)   NOT NULL UNIQUE,
    nombre          VARCHAR(255) NOT NULL,
    apellidos       VARCHAR(255) NOT NULL,
    departamento_id BIGINT       NOT NULL 
                                 REFERENCES departamentos(id)
);


INSERT INTO departamentos (codigo, denominacion, localidad)
VALUES ('10', 'Informática', 'Sanlúcar'),
       ('20', 'Administración', NULL),
       ('30', 'Matemáticas', 'Chipiona');


INSERT INTO empleados (numero, nombre, apellidos, departamento_id)
VALUES ('10', 'Antonio', 'Jiménez López', '1'),
       ('20', 'Silvia', 'Mantel Mora', '2'),
       ('30', 'Jesús', 'García García', '1'); 


