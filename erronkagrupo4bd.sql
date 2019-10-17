-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2019 a las 12:57:34
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erronkagrupo4bd`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarUsuario` (IN `pidUsuario` INT(11), IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(80), IN `ptelefono` VARCHAR(12), IN `pdni` VARCHAR(9), IN `ptipo` VARCHAR(40))  NO SQL
UPDATE usuarios SET usuarios.nombre = pnombre, usuarios.apellido = papellido, usuarios.telefono = ptelefono, usuarios.dni = pdni, usuarios.tipo = ptipo WHERE usuarios.idUsuario = pidUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarVehiculo` (IN `pidVehiculo` VARCHAR(11), IN `pnombre` VARCHAR(40), IN `pmodelo` VARCHAR(40), IN `ppotencia` VARCHAR(40))  NO SQL
UPDATE vehiculos SET vehiculos.nombre = pnombre, vehiculos.modelo = pmodelo, vehiculos.potencia = ppotencia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `añadirReserva` (IN `pfechaReserva` DATE, IN `pfechaReservada` DATE, IN `phoraInicio` TIMESTAMP, IN `phoraFin` TIMESTAMP, IN `pidUsuario` INT(11), IN `pidVehiculo` INT(11))  NO SQL
INSERT INTO reservas (reservas.fechaReserva, reservas.fechaReservada, reservas.horaInicio, reservas.horaFin, reservas.idUsuario, reservas.idVehiculo) VALUES (pfechaReserva, pfechaReservada, phoraInicio, phoraFin, pidUsuario, pidVehiculo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `añadirUsuario` (IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(80), IN `ptelefono` VARCHAR(12), IN `pdni` VARCHAR(9), IN `ptipo` VARCHAR(40))  NO SQL
INSERT INTO usuarios (usuarios.nombre, usuarios.apellido, usuarios.telefono, usuarios.dni, usuarios.tipo) VALUES (pnombre, papellido, ptelefono, pdni, ptipo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `añadirVehiculo` (IN `pnombre` VARCHAR(40), IN `pmodelo` VARCHAR(40), IN `ppotencia` VARCHAR(40))  NO SQL
INSERT INTO vehiculos (vehiculos.nombre, vehiculos.modelo, vehiculos.potencia) VALUES (pnombre, pmodelo, ppotencia)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarReserva` (IN `pidReserva` INT)  NO SQL
DELETE FROM reservas WHERE reservas.idReserva = pidReserva$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarUsuario` (IN `pusuario` INT)  NO SQL
DELETE FROM usuarios WHERE usuarios.idUsuario = pusuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarVehiculo` (IN `pidVehiculo` INT(11))  NO SQL
DELETE FROM vehiculos WHERE vehiculos.idVehiculo = pidVehiculo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `fechaReserva` date NOT NULL,
  `fechaReservada` date NOT NULL,
  `horaInicio` date NOT NULL,
  `horaFin` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `idVehiculo` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potencia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idVehiculo` (`idVehiculo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`idVehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
