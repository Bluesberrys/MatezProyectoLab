-- Active: 1727189343099@@127.0.0.1@3306@mathez
CREATE DATABASE Mathez
DEFAULT CHARACTER SET = 'utf8mb4';

USE Mathez;

CREATE TABLE Alumnos (  
    numCta INT NOT NULL PRIMARY KEY,
    apellidoP VARCHAR(50) NOT NULL,
    apellidoM VARCHAR(50) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    passwd VARCHAR(50) NOT NULL
);

CREATE TABLE Administradores (  
    id_admin INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    apellidoP VARCHAR(50) NOT NULL,
    apellidoM VARCHAR(50) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    passwd VARCHAR(50) NOT NULL
);

CREATE TABLE Temas (  
    id_tema INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE inscripciones (
    id_inscripcion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_tema INT,
    numCta INT,
    estatus VARCHAR(100) NOT NULL,
    progreso DECIMAL,
    fecha_inscripcion DATE NOT NULL,
    fecha_final DATE NOT NULL,
    FOREIGN KEY (id_tema) REFERENCES Temas(id_tema),
    FOREIGN KEY (numCta) REFERENCES Alumnos(numCta)
);
CREATE TABLE Subtemas (
    id_subtema INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    id_tema INT,
    FOREIGN KEY (id_tema) REFERENCES Temas(id_tema)
);