-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-10-2019 a las 12:50:48
-- Versión del servidor: 10.1.41-MariaDB
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuatrofp_erronkagrupo4bd`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spDeleteUsuario` (IN `pidUsuario` INT(11))  NO SQL
DELETE FROM usuarios WHERE usuarios.idUsuario = pidUsuario$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spDeleteVehiculo` (IN `pidVehiculo` INT(11))  NO SQL
DELETE FROM vehiculos WHERE vehiculos.idVehiculo = pidVehiculo$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spInsertUsuario` (IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(80), IN `ptelefono` VARCHAR(12), IN `pdni` VARCHAR(9), IN `ptipo` VARCHAR(40))  NO SQL
INSERT INTO usuarios (usuarios.nombre, usuarios.apellido, usuarios.telefono, usuarios.dni, usuarios.tipo) VALUES (pnombre, papellido, ptelefono, pdni, ptipo)$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spInsertVehiculo` (IN `pnombre` VARCHAR(40), IN `pmodelo` VARCHAR(40), IN `ppotencia` VARCHAR(40), IN `pimg` VARCHAR(100), IN `ptipo` VARCHAR(50))  NO SQL
INSERT INTO vehiculos (vehiculos.nombre, vehiculos.modelo, vehiculos.potencia, vehiculos.img, vehiculos.tipo) VALUES (pnombre, pmodelo, ppotencia, pimg, ptipo)$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spSelectAllReservas` ()  NO SQL
SELECT * FROM reservas$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spSelectAllUsuarios` ()  NO SQL
SELECT * FROM usuarios$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spSelectAllVehiculos` ()  NO SQL
SELECT * FROM vehiculos$$

$$

$$

$$

$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spSelectVehiculosPorTipo` (IN `ptipo` VARCHAR(50))  NO SQL
SELECT * FROM vehiculos WHERE vehiculos.tipo = ptipo$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spUpdateUsuario` (IN `pidUsuario` INT(11), IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(80), IN `ptelefono` VARCHAR(12), IN `pdni` VARCHAR(9), IN `ptipo` VARCHAR(40))  NO SQL
UPDATE usuarios SET usuarios.nombre = pnombre, usuarios.apellido = papellido, usuarios.telefono = ptelefono, usuarios.dni = pdni, usuarios.tipo = ptipo WHERE usuarios.idUsuario = pidUsuario$$

CREATE DEFINER=`cuatrofp_erronka`@`localhost` PROCEDURE `spUpdateVehiculo` (IN `pidVehiculo` INT(11), IN `pnombre` VARCHAR(40), IN `pmodelo` VARCHAR(40), IN `ppotencia` VARCHAR(40), IN `pimg` VARCHAR(100), IN `ptipo` VARCHAR(50))  NO SQL
UPDATE vehiculos SET vehiculos.nombre = pnombre, vehiculos.modelo = pmodelo, vehiculos.potencia = ppotencia, vehiculos.img = pimg, vehiculos.tipo = ptipo$$

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
  `potencia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`idVehiculo`, `nombre`, `modelo`, `potencia`, `img`, `tipo`) VALUES
(1, 'XULONG', 'E202', '1000w', 'https://images-na.ssl-images-amazon.com/images/I/61UnVWlFS3L._SL1500_.jpg', 'Monopatin'),
(2, 'ECOXTREM', 'Sparrow', '1600w', 'https://images-na.ssl-images-amazon.com/images/I/416d3wIEi8L.jpg', 'Monopatin'),
(3, 'Ecogyro', 'S9', '250w', 'https://images-na.ssl-images-amazon.com/images/I/61-qdX3X4FL._SL1500_.jpg', 'Monopatin'),
(4, 'TOEU', 'Hoverboard', '250w', 'https://images-na.ssl-images-amazon.com/images/I/61q%2BaEeB52L._SL1000_.jpg', 'Monopatin'),
(5, 'RCB', 'Longboard', '400w', 'https://images-na.ssl-images-amazon.com/images/I/717yFVig2xL._SL1500_.jpg', 'Patinete'),
(6, 'Hiboy', 'S11', '200w', 'https://images-na.ssl-images-amazon.com/images/I/61Vi46FX7dL._SL1200_.jpg', 'Patinete'),
(7, 'Spadger', 'D5X plus', '900w', 'https://images-na.ssl-images-amazon.com/images/I/81CFaiLOQNL._SL1500_.jpg', 'Patinete'),
(8, 'Teamgee', 'H8', '480w', 'https://images-na.ssl-images-amazon.com/images/I/71M81rBHpML._SL1500_.jpg', 'Patinete'),
(9, 'NCM', 'Moscow', '250w', 'https://images-na.ssl-images-amazon.com/images/I/91lGbaQG9cL._SL1500_.jpg', 'Bicicleta'),
(10, 'Moma', 'BikeE', '250w', 'https://images-na.ssl-images-amazon.com/images/I/81N0yvd7JLL._SL1500_.jpg', 'Bicicleta'),
(11, 'Xiaomi', 'Qicycle', '250w', 'https://images-na.ssl-images-amazon.com/images/I/71HM90eCFiL._SL1500_.jpg', 'Bicicleta'),
(12, 'NCM', 'Milano', '250w', 'https://images-na.ssl-images-amazon.com/images/I/719ng2UDN%2BL._SL1500_.jpg', 'Bicicleta'),
(13, 'Hyundai', 'Kona EV', '64kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2018/10/19/140393/hyundai-kona-electrico-6_g.jpg', 'coche'),
(17, 'Jaguar', 'I-Pace', '100kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2018/03/01/118655/jaguar-pace-68_g.jpg', 'coche'),
(18, 'Kia', 'e-Niro', '70kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2018/10/02/138767/niro-8_g.jpg', 'coche'),
(19, 'Renault', 'Zoe', '75kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2017/01/03/79182/renault-2017-prueba-19_g.jpg', 'coche');

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
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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