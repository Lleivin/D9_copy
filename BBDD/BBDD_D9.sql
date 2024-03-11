CREATE TABLE `campos` (
  `idCampo` int(100) NOT NULL AUTO_INCREMENT,
  `nombreCampo` varchar(255),
  `pais` varchar(255),
  `ciudad` varchar(255),
  `direccion` varchar(255),
  `telefono` int(9),
  PRIMARY KEY (`idCampo`)
);


CREATE TABLE `partidas` (
  `idPartida` int(255) NOT NULL AUTO_INCREMENT,
  `idCampo` int(100) NOT NULL,
  `nombreCampo` varchar(255),
  `nombrePartida` varchar(255),
  `fecha` date,
  `precioPartida` decimal(5,2),
  `numeroJugadores` int check (numeroJugadores >= 1 AND numeroJugadores <= 70),
  `descripcionPartida` varchar(255),
  `estadoPartida` varchar(50) DEFAULT "Pendiente", 
  PRIMARY KEY (`idPartida`)
);

CREATE TABLE `jugadores` (
  `dniJugador` varchar(9) NOT NULL,
  `nickJugador` varchar(255),
  `nombreJugador` varchar(50),
  `apellido1Jugador` varchar(50),
  `apellido2Jugador` varchar(50),
  `contrasenaJugador` varchar(50),
  `telefonoJugador` int(9),
  `email` varchar(255),
  `estadoJugador` varchar(50) DEFAULT 'Activo',
  PRIMARY KEY (`dniJugador`)
);

CREATE TABLE `reservas` (
  `idCobro` int(255) NOT NULL AUTO_INCREMENT,
  `idPartida` int(255),
  `dniJugador` varchar(9),
  `nombreJugador` varchar(50),
  `apellido1Jugador` varchar(50),
  `apellido2Jugador` varchar(50),
  `telefonoJugador` int(9),
  `precioPartida` decimal(5,2),
  `email` varchar(255),
  `fechaCobro` dateTime,
  PRIMARY KEY (`idCobro`)
);


CREATE TABLE `administrador` (
  `dniAdmin` varchar(9) NOT NULL,
  `nickAdmin` varchar(50),
  `nombreAdmin` varchar(50),
  `apellido1Admin` varchar(50),
  `apellido2Admin` varchar(50),
  `contrasenaAdmin` varchar(50),
  `telefonoAdmin` int(9),
  `emailAdmin` varchar(255),
  PRIMARY KEY (`dniAdmin`)
);


CREATE TABLE `newsletter` (
  `email` varchar(255),
  PRIMARY KEY (`email`)
);

-- ESTÁ CORRECTO
ALTER TABLE partidas ADD CONSTRAINT `campos_partidas_fk` FOREIGN KEY (`idCampo`) REFERENCES `campos` (`idCampo`) 
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE reservas ADD CONSTRAINT `partidas_pagos_fk` FOREIGN KEY (`idPartida`) REFERENCES `partidas` (`idPartida`);

ALTER TABLE reservas ADD CONSTRAINT `jugadores_pagos_fk` FOREIGN KEY (`dniJugador`) REFERENCES `jugadores` (`dniJugador`);




INSERT INTO `campos` ( idCampo, nombreCampo, pais, ciudad, direccion, telefono) VALUES 
(1, "Distrito9", "España", "Madrid", "C. Níquel, s/n, 28970 Humanes de Madrid, Madrid", 650967876),
(2, "Enclave", "España", "Madrid", "C. Regordoño, 7, 28936 Móstoles, Madrid", 650967876);

INSERT INTO `partidas` ( idPartida, idCampo, nombreCampo, nombrePartida, fecha, 
precioPartida, numeroJugadores, descripcionPartida ) VALUES 
(506, 1, "Distrito 9", "Extracción en Gaza",'2024/05/12', 15.00, 70, "partida de prueba1"),
(869, 2, "El Enclave", "Alta Tnesión",'2024/09/25', 15.00, 70, "partida de prueba2");

INSERT INTO `jugadores` (dniJugador, nickJugador, nombreJugador, apellido1Jugador, apellido2Jugador, 
contrasenaJugador, telefonoJugador, email ) VALUES 
("50995037N", "Lleivin", 'Javier', "lopez", "horno", "alumno", 662504617, "javiredessociales@hotmail.com"),
("50505050L", "Nataxa", 'Natalia', "izquierdo", "horno", "alumno", 605698745, "nataxa@hotmail.com"),
("50954043G", "Felix", 'Felipe', "brazo", "tieso", "alumno", 656565897, "feliperedessociales@hotmail.com");

INSERT INTO `administrador` (dniAdmin, nickAdmin, nombreAdmin, apellido1Admin, apellido2Admin, contrasenaAdmin,
 telefonoAdmin, emailAdmin) VALUES 
("50995037N", "Lleivin", 'Javier', "lopez","horno", "alumno", 662504617, "javiredessociales@hotmail.com"),
("54545454N", "Arconte", 'Victor', "lopez","horno", "arconte", 656565654, "arconte@hotmail.com");

INSERT INTO `reservas` (idCobro, idPartida, dniJugador, 
nombreJugador, apellido1Jugador, apellido2Jugador, telefonoJugador, precioPartida, email, fechaCobro ) VALUES 
(0001, 506, "50995037N", 'Javier', "lopez", "horno", 662504617, 15.00, "javiredessociales@hotmail.com", '2024-10-25 20:00:00');



