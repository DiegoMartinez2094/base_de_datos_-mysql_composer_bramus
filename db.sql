CREATE DATABASE prueba;
USE prueba;
CREATE TABLE Person (
    id INT(11) NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(80) NOT NULL,
    Apellido1 VARCHAR(100) NOT NULL,
    Apellido2 VARCHAR(100),
    DNI VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE Coche (
    Matricula VARCHAR(7) NOT NULL PRIMARY KEY,
    Marca VARCHAR(45) NOT NULL,
    Modelo VARCHAR(45),
    Caballos INT(11) NOT NULL
);

CREATE TABLE Coche_VS_Persona(
Coche_Matricula VARCHAR(7) NOT NULL,
persona_id INT(11) NOT NULL
);

ALTER TABLE Coche_VS_Persona
ADD CONSTRAINT Coche_Matricula
FOREIGN KEY (Coche_Matricula) REFERENCES Coche(Matricula);

ALTER TABLE Coche_VS_Persona
ADD CONSTRAINT Persona_id
FOREIGN KEY (Persona_id) REFERENCES Person(id);
