DROP DATABASE IF EXISTS InventarioLab;
CREATE DATABASE InventarioLab;
USE InventarioLab;

CREATE TABLE salon (
    Salon_id INT NOT NULL AUTO_INCREMENT,
    Tipo_Salon CHAR(50) NOT NULL,
    Num_Salon CHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (Salon_id)
) engine=innoDB;

CREATE TABLE usuario (
    Usuario_id INT NOT NULL AUTO_INCREMENT,
    Tipo_Cargo CHAR(50) NOT NULL ,
    Matricula CHAR(50) UNIQUE NOT NULL,
    Nombre CHAR(120) NOT NULL,
    ApellidoP CHAR(120) NOT NULL,
    ApellidoM CHAR(120) NOT NULL,
    Contrasenia CHAR(120) NOT NULL,
    PRIMARY KEY (Usuario_id)
) engine=innoDB;

CREATE TABLE equipo (
    Equipo_id INT NOT NULL AUTO_INCREMENT,
    Estado_Equipo CHAR(50) NOT NULL,
    Categoria CHAR(50) NOT NULL,
    Salon_id INT NULL,
    No_Serie CHAR(100) UNIQUE NOT NULL,
    Nombre CHAR(120) NOT NULL,
    FechaDeCompra CHAR(50) NOT NULL,
    PRIMARY KEY (Equipo_id),
    FOREIGN KEY (Salon_id) REFERENCES salon (Salon_id) ON DELETE NO ACTION
) engine=innoDB;

CREATE TABLE prestamo (
    Prestamo_id INT NOT NULL AUTO_INCREMENT,
    Usuario_id INT NOT NULL,
    Equipo_id INT NOT NULL,
    Fecha_P CHAR(50) NOT NULL,
    PRIMARY KEY (Prestamo_id),
    FOREIGN KEY (Usuario_id) REFERENCES usuario (Usuario_id) ON DELETE CASCADE,
    FOREIGN KEY (Equipo_id) REFERENCES equipo (Equipo_id) ON DELETE CASCADE
) engine=innoDB;

CREATE TABLE gestion (
    Gestion_id INT NOT NULL AUTO_INCREMENT,
    Usuario_id INT NOT NULL,
    Salon_id INT NOT NULL,
    PRIMARY KEY (Gestion_id),
    FOREIGN KEY (Usuario_id) REFERENCES usuario (Usuario_id) ON DELETE CASCADE,
    FOREIGN KEY (Salon_id) REFERENCES salon (Salon_id) ON UPDATE CASCADE
) engine=innoDB;

INSERT INTO salon (Num_Salon, Tipo_Salon)
VALUES 
    ('R-300', 'Bodega'),
    ('T-002', 'Salon'),
    ('R-120', 'Laboratorio'),
    ('B-301', 'Salon'),
    ('C-200', 'Laboratorio');

INSERT INTO usuario (Tipo_Cargo, Matricula, Nombre, ApellidoP, ApellidoM, Contrasenia)
VALUES
    ('Profesor', 12345, 'Juan', 'Perez', 'Gomez', 'clave123'),
    ('Estudiante', 54321, 'Maria', 'Gonzalez', 'Lopez', 'contrasenia123'),
    ('Laboratorista', 98765, 'Pedro', 'Rodriguez', 'Martinez', 'pass123');

INSERT INTO equipo (Estado_Equipo, Categoria, Salon_id, No_Serie, Nombre, FechaDeCompra)
VALUES
    ('Disponible', 'Equipo de espectroscopia', 1, 'ABC123', 'Spectronic 20', '2023-01-15'),
    ('Mantenimiento', 'Equipo de electronica', 2, 'XYZ456', 'Multimetro', '2022-11-20'),
    ('Prestado', 'Equipo de laboratorio', 3, '123XYZ', 'Biopac', '2023-03-10');

INSERT INTO prestamo (Usuario_id, Equipo_id, Fecha_P)
VALUES
    (2, 2, '2023-08-05'),
    (3, 3, '2023-08-10');

INSERT INTO gestion (Usuario_id, Salon_id) 
VALUES 
(1, 1),
(3, 2),
(2, 3),
(2, 4);
