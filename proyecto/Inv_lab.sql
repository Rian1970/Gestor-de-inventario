CREATE DATABASE InventarioLab;
USE InventarioLab;

CREATE TABLE salon (
    Salon_id INT NOT NULL AUTO_INCREMENT,
    Tipo_Salon CHAR(50) NOT NULL,
    Num_Salon CHAR(50) NOT NULL,
    PRIMARY KEY (Salon_id)
) engine=innoDB;

CREATE TABLE usuario (
    Usuario_id INT NOT NULL AUTO_INCREMENT,
    Tipo_Cargo CHAR(50) NOT NULL ,
    Matricula INT NOT NULL,
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
    Salon_id INT NOT NULL,
    No_Serie CHAR(100) NULL,
    Nombre CHAR(120) NOT NULL,
    FechaDeCompra DATE NOT NULL,
    PRIMARY KEY (Equipo_id),
    FOREIGN KEY (Salon_id) REFERENCES salon (Salon_id) ON DELETE NO ACTION
) engine=innoDB;

CREATE TABLE documentacion_tecnica (
    Doc_id INT NOT NULL AUTO_INCREMENT,
    Equipo_id INT NOT NULL,
    Descripcion TEXT DEFAULT NULL,
    PRIMARY KEY (Doc_id),
    FOREIGN KEY (Equipo_id) REFERENCES equipo (Equipo_id) ON DELETE CASCADE
) engine=innoDB;

CREATE TABLE registro_mantenimiento (
    Mantenimiento_id INT NOT NULL AUTO_INCREMENT,
    Equipo_id INT NOT NULL,
    Tipo_Mantenimiento CHAR(50) NOT NULL,
    Estado_Mantenimiento CHAR(50) NOT NULL,
    Costo INT NOT NULL,
    Fecha_Inicio_M DATE NOT NULL,
    Fecha_Fin_M DATE NULL,
    PRIMARY KEY (Mantenimiento_id),
    FOREIGN KEY (Equipo_id) REFERENCES equipo (Equipo_id) ON DELETE CASCADE
) engine=innoDB;

CREATE TABLE prestamo (
    Prestamo_id INT NOT NULL AUTO_INCREMENT,
    Usuario_id INT NOT NULL,
    Equipo_id INT NOT NULL,
    Fecha_Inicio_P DATE NOT NULL,
    Fecha_Fin_P DATE NULL,
    PRIMARY KEY (Prestamo_id),
    FOREIGN KEY (Usuario_id) REFERENCES usuario (Usuario_id),
    FOREIGN KEY (Equipo_id) REFERENCES equipo (Equipo_id)
) engine=innoDB;

CREATE TABLE gestion (
    Usuario_id INT NOT NULL,
    Salon_id INT NOT NULL,
    PRIMARY KEY (Usuario_id, Salon_id),
    FOREIGN KEY (Usuario_id) REFERENCES usuario (Usuario_id) ON UPDATE CASCADE,
    FOREIGN KEY (Salon_id) REFERENCES salon (Salon_id) 
) engine=innoDB;

INSERT INTO salon (Num_Salon, Tipo_Salon)
VALUES 
    ('T-002', 'Salon'),
    ('R-120', 'Laboratorio'),
    ('B-301', 'Salon'),
    ('C-200', 'Laboratorio');

INSERT INTO usuario (Tipo_Cargo, Matricula, Nombre, ApellidoP, ApellidoM, Contrasenia)
VALUES
    ('Profesor', 12345, 'Juan', 'Perez', 'Gomez', 'clave123'),
    ('Estudiante', 54321, 'Maria', 'Gonzalez', 'Lopez', 'contraseña123'),
    ('Laboratorista', 98765, 'Pedro', 'Rodriguez', 'Martinez', 'pass123');

INSERT INTO equipo (Estado_Equipo, Categoria, Salon_id, No_Serie, Nombre, FechaDeCompra)
VALUES
    ('Disponible', 'Equipo de espectroscopia', 1, 'ABC123', 'Spectronic 20', '2023-01-15'),
    ('Mantenimiento', 'Equipo de electronica', 2, 'XYZ456', 'Multimetro', '2022-11-20'),
    ('Prestado', 'Equipo de laboratorio', 3, '123XYZ', 'Biopac', '2023-03-10');

INSERT INTO documentacion_tecnica (Equipo_id, Descripcion)
VALUES
    (1, 'Manual de usuario'),
    (2, 'Guía de instalacion'),
    (3, 'Documentación técnica');

INSERT INTO registro_mantenimiento (Equipo_id, Tipo_Mantenimiento, Estado_Mantenimiento, Costo, Fecha_Inicio_M, Fecha_Fin_M)
VALUES
    (1, 'Reparacion', 'En proceso', 200, '2023-05-10', '2023-05-15'),
    (2, 'Calibracion', 'En cola', 300, '2023-06-20', '2023-06-25'),
    (3, 'Ajuste', 'Finalizado', 250, '2023-07-15', '2023-07-20');

INSERT INTO prestamo (Usuario_id, Equipo_id, Fecha_Inicio_P, Fecha_Fin_P)
VALUES
    (1, 1, '2023-08-01', '2023-08-15'),
    (2, 2, '2023-08-05', '2023-08-20'),
    (3, 3, '2023-08-10', '2023-08-25');

INSERT INTO gestion VALUES (1, 1);
INSERT INTO gestion VALUES (3, 2);
INSERT INTO gestion VALUES (2, 3);
INSERT INTO gestion VALUES (2, 1);
