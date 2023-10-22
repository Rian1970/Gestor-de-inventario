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
    FOREIGN KEY (Salon_id) REFERENCES salon (Salon_id) 
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
    ('C-200', 'Laboratorio'),
    ('A-101', 'Salon'),
    ('B-202', 'Salon'),
    ('A-01', 'Laboratorio'),
    ('C-303', 'Salon'),
    ('A-02', 'Laboratorio'),
    ('D-404', 'Salon'),
    ('A-03', 'Laboratorio'),
    ('E-505', 'Salon'),
    ('A-04', 'Laboratorio'),
    ('F-606', 'Salon');

INSERT INTO usuario (Tipo_Cargo, Matricula, Nombre, ApellidoP, ApellidoM, Contrasenia)
VALUES
    ('Profesor', 2001, 'Juan', 'Perez', 'Gomez', 'contrasenia1'),
    ('Estudiante', 2002, 'Maria', 'Lopez', 'Rodriguez', 'contrasenia2'),
    ('Laboratorista', 2003, 'Carlos', 'Garcia', 'Fernandez', 'contrasenia3'),
    ('Profesor', 2004, 'Sofia', 'Jimenez', 'Vargas', 'contrasenia4'),
    ('Estudiante', 2005, 'Pedro', 'Gutierrez', 'Soto', 'contrasenia5'),
    ('Laboratorista', 2006, 'Lorena', 'Vargas', 'Mendoza', 'contrasenia6'),
    ('Profesor', 2007, 'Javier', 'Mendoza', 'Guerra', 'contrasenia7'),
    ('Estudiante', 2008, 'Andrea', 'Diaz', 'Luna', 'contrasenia8'),
    ('Laboratorista', 2009, 'Eduardo', 'Soto', 'Castillo', 'contrasenia9'),
    ('Profesor', 2010, 'Marta', 'Castillo', 'Paredes', 'contrasenia10'),
    ('Estudiante', 2011, 'Roberto', 'Luna', 'Rios', 'contrasenia11'),
    ('Laboratorista', 2012, 'Isabella', 'Rios', 'Guerrero', 'contrasenia12'),
    ('Profesor', 2013, 'Hector', 'Guerra', 'Silva', 'contrasenia13'),
    ('Estudiante', 2014, 'Adriana', 'Silva', 'Ortega', 'contrasenia14'),
    ('Laboratorista', 2015, 'Cesar', 'Ortega', 'Mora', 'contrasenia15'),
    ('Profesor', 2016, 'Claudia', 'Mora', 'Gomez', 'contrasenia16'),
    ('Estudiante', 2017, 'Ricardo', 'Gomez', 'Perez', 'contrasenia17'),
    ('Laboratorista', 2018, 'Beatriz', 'Perez', 'Fernandez', 'contrasenia18'),
    ('Profesor', 2019, 'Jorge', 'Fernandez', 'Martinez', 'contrasenia19'),
    ('Estudiante', 2020, 'Santiago', 'Martinez', 'Torres', 'contrasenia20'),
    ('Laboratorista', 2021, 'Monica', 'Torres', 'Ramirez', 'contrasenia21'),
    ('Profesor', 2022, 'Francisco', 'Ramirez', 'Lopez', 'contrasenia22'),
    ('Estudiante', 2023, 'Carmen', 'Lopez', 'Rodriguez', 'contrasenia23'),
    ('Laboratorista', 2024, 'Antonio', 'Rodriguez', 'Hernandez', 'contrasenia24'),
    ('Profesor', 2025, 'Valeria', 'Hernandez', 'Perez', 'contrasenia25'),
    ('Estudiante', 2026, 'Fernanda', 'Perez', 'Sanchez', 'contrasenia26'),
    ('Laboratorista', 2027, 'Raul', 'Sanchez', 'Garcia', 'contrasenia27'),
    ('Profesor', 2028, 'Patricia', 'Garcia', 'Fernandez', 'contrasenia28'),
    ('Estudiante', 2029, 'Diego', 'Fernandez', 'Lopez', 'contrasenia29'),
    ('Laboratorista', 2030, 'Elena', 'Lopez', 'Gomez', 'contrasenia30'),
    ('Profesor', 2031, 'Miguel', 'Gomez', 'Perez', 'contrasenia31'),
    ('Estudiante', 2032, 'Camila', 'Perez', 'Fernandez', 'contrasenia32'),
    ('Laboratorista', 2033, 'Alberto', 'Fernandez', 'Hernandez', 'contrasenia33'),
    ('Profesor', 2034, 'Lucia', 'Hernandez', 'Ramirez', 'contrasenia34'),
    ('Estudiante', 2035, 'Rodrigo', 'Ramirez', 'Torres', 'contrasenia35'),
    ('Laboratorista', 2036, 'Paola', 'Torres', 'Martinez', 'contrasenia36'),
    ('Profesor', 2037, 'Arturo', 'Martinez', 'Sanchez', 'contrasenia37'),
    ('Estudiante', 2038, 'Natalia', 'Sanchez', 'Garcia', 'contrasenia38'),
    ('Laboratorista', 2039, 'Sergio', 'Garcia', 'Fernandez', 'contrasenia39'),
    ('Profesor', 2040, 'Silvia', 'Fernandez', 'Lopez', 'contrasenia40');


INSERT INTO equipo (Estado_Equipo, Categoria, Salon_id, No_Serie, Nombre, FechaDeCompra)
VALUES
    ('Disponible', 'Equipo de espectroscopia', 1, 'ABC123', 'Spectronic 20', '2023-01-15'),
    ('Prestado', 'Equipo de electronica', 2, 'XYZ456', 'Multimetro', '2022-11-20'),
    ('Prestado', 'Equipo de laboratorio', 3, '123XYZ', 'Biopac', '2023-03-10'),
    ('Disponible', 'Equipo de espectroscopia', 4, 'EFG789', 'UV-Vis Spectrophotometer', '2023-02-05'),
    ('Disponible', 'Equipo de espectroscopia', 2, 'LMN456', 'Cromatógrafo de gases', '2023-04-18'),
    ('Disponible', 'Equipo de laboratorio', 1, 'PQR789', 'Microscopio electrónico', '2022-12-30'),
    ('Disponible', 'Equipo de electronica', 5, 'HIJ101', 'Osciloscopio', '2023-01-25'),
    ('Disponible', 'Equipo de laboratorio', 3, 'KLM456', 'Centrífuga', '2022-10-15'),
    ('Disponible', 'Equipo de laboratorio', 4, 'XYZ789', 'Incubadora', '2022-09-08'),
    ('Disponible', 'Equipo de laboratorio', 2, 'UVW101', 'Microscopio óptico', '2022-11-05'),
    ('Disponible', 'Equipo de espectroscopia', 3, 'UVW202', 'Espectrofotómetro UV-Vis', '2023-04-05'),
    ('Disponible', 'Equipo de electronica', 2, 'ABC222', 'Microscopio de fluorescencia', '2023-03-15'),
    ('Disponible', 'Equipo de laboratorio', 4, 'XYZ333', 'Generador de señales', '2023-05-20'),
    ('Disponible', 'Equipo de espectroscopia', 1, 'LMN444', 'Destilador de agua', '2023-06-12'),
    ('Disponible', 'Equipo de laboratorio', 5, 'PQR555', 'Horno de secado', '2023-07-30'),
    ('Disponible', 'Equipo de espectroscopia', 3, 'EFG666', 'Espectrofotómetro de absorción', '2023-08-22'),
    ('Disponible', 'Equipo de laboratorio', 2, 'HIJ777', 'Placa de Petri', '2023-09-10'),
    ('Disponible', 'Equipo de electronica', 4, 'KLM888', 'Centrífuga refrigerada', '2023-10-18'),
    ('Disponible', 'Equipo de espectroscopia', 5, 'UVW999', 'HPLC', '2023-11-05'),
    ('Disponible', 'Equipo de espectroscopia', 1, 'AOBC123', 'Espectrofotómetro FTIR', '2023-12-12'),
    ('Disponible', 'Equipo de electrónica', 2, 'XYZP456', 'Osciloscopio digital', '2023-11-20'),
    ('Disponible', 'Equipo de laboratorio', 3, '123XTYZ', 'Agitador magnético', '2024-01-25'),
    ('Disponible', 'Equipo de laboratorio', 4, 'EFGG789', 'Medidor de densidad', '2024-02-10'),
    ('Disponible', 'Equipo de espectroscopia', 2, 'LFMN456', 'Espectrofotómetro UV-Vis', '2024-03-08'),
    ('Disponible', 'Equipo de electronica', 1, 'PQRK789', 'Centrífuga de mesa', '2024-04-30'),
    ('Disponible', 'Equipo de laboratorio', 5, 'HIJI101', 'Generador de ondas', '2024-05-15'),
    ('Disponible', 'Equipo de espectroscopia', 3, 'KLPM456', 'Microscopio electrónico', '2024-06-20'),
    ('Disponible', 'Equipo de laboratorio', 4, 'XYZ7829', 'Agitador orbital', '2024-07-25'),
    ('Disponible', 'Equipo de laboratorio', 2, 'UVW100', 'Microscopio estereoscópico', '2024-08-10'),
    ('Disponible', 'Equipo de electrónica', 3, 'EFG202', 'Generador de funciones', '2024-09-05');

INSERT INTO prestamo (Usuario_id, Equipo_id, Fecha_P)
VALUES
    (2, 2, '2023-08-05'),
    (3, 3, '2023-08-10');

INSERT INTO gestion (Usuario_id, Salon_id) 
VALUES 
(1, 1),
(3, 2),
(2, 3),
(2, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10);
