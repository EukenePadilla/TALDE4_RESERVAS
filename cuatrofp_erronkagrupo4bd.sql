-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2019 a las 14:53:39
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `spComprobarNickname` (IN `pUsuario` VARCHAR(30))  NO SQL
select * from usuarios where usuarios.usuario=pUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spComprobarReservas` (IN `pFechaReservada` VARCHAR(40), IN `pRango` INT, IN `pIdVehiculo` INT)  NO SQL
select * from reservas where reservas.fechaReservada=pFechaReservada && reservas.idVehiculo=pIdVehiculo && reservas.rango = pRango$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spComprobarUser` (IN `spUsuario` VARCHAR(40), IN `spContrasena` VARCHAR(40))  NO SQL
select * from usuarios where usuarios.usuario=spUsuario and usuarios.contrasena=spContrasena$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteReserva` (IN `pIdReserva` INT)  NO SQL
DELETE FROM reservas WHERE reservas.idReserva = pIdReserva$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteUsuario` (IN `pidUsuario` INT(11))  NO SQL
DELETE FROM usuarios WHERE usuarios.idUsuario = pidUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteVehiculo` (IN `pidVehiculo` INT(11))  NO SQL
DELETE FROM vehiculos WHERE vehiculos.idVehiculo = pidVehiculo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spFindUsuario` (IN `pid` INT)  NO SQL
select * from usuarios where usuarios.idUsuario=pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertReservas` (IN `pFechaReserva` VARCHAR(30), IN `pFechaReservada` VARCHAR(30), IN `pRango` INT, IN `pPrecio` DOUBLE, IN `pIdUsuario` INT, IN `pIdVehiculo` INT)  NO SQL
INSERT INTO reservas (reservas.fechaReserva, reservas.fechaReservada, reservas.rango, reservas.precio, reservas.idUsuario, reservas.idVehiculo) VALUES (pFechaReserva, pFechaReservada, pRango, pPrecio, pIdUsuario, pIdVehiculo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertUsuario` (IN `pusuario` VARCHAR(40), IN `pcontrasena` VARCHAR(40), IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(80), IN `ptelefono` VARCHAR(12), IN `pdni` VARCHAR(9), IN `ptipo` VARCHAR(40))  NO SQL
INSERT INTO usuarios (usuarios.usuario, usuarios.contrasena, usuarios.nombre, usuarios.apellido, usuarios.telefono, usuarios.dni, usuarios.tipo) VALUES (pusuario,pcontrasena,pnombre, papellido, ptelefono, pdni, ptipo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertVehiculo` (IN `pnombre` VARCHAR(40), IN `pmodelo` VARCHAR(40), IN `ppotencia` VARCHAR(40), IN `pimg` VARCHAR(100), IN `ptipo` VARCHAR(50))  NO SQL
INSERT INTO vehiculos (vehiculos.nombre, vehiculos.modelo, vehiculos.potencia, vehiculos.img, vehiculos.tipo) VALUES (pnombre, pmodelo, ppotencia, pimg, ptipo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectAllReservas` ()  NO SQL
SELECT * FROM reservas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectAllUsuarios` ()  NO SQL
SELECT * FROM usuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectAllVehiculos` ()  NO SQL
SELECT * FROM `vehiculos` order by vehiculos.tipo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectTipos` ()  NO SQL
SELECT DISTINCT vehiculos.tipo FROM vehiculos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateReservas` (IN `pIdReserva` INT, IN `pFechaReserva` VARCHAR(30), IN `pFechaReservada` VARCHAR(30), IN `pRango` INT, IN `pPrecio` DOUBLE, IN `pIdUsuario` INT, IN `pIdVehiculo` INT)  NO SQL
UPDATE `reservas` SET `idReserva`=pIdReserva,`fechaReserva`=pFechaReserva,`fechaReservada`=pFechaReservada,`rango`=pRango,`precio`=pPrecio,`idUsuario`=pIdUsuario,`idVehiculo`=pIdVehiculo WHERE `idReserva`=pIdReserva$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUsuario` (IN `pidUsuario` INT(11), IN `pusuario` VARCHAR(40), IN `pcontrasena` VARCHAR(40), IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(80), IN `ptelefono` VARCHAR(12), IN `pdni` VARCHAR(9), IN `ptipo` INT(1))  NO SQL
UPDATE `usuarios` SET `usuario`=pusuario,`contrasena`=pcontrasena,`nombre`=pnombre,`apellido`=papellido,`telefono`=ptelefono,`dni`=pdni,`tipo`=ptipo WHERE usuarios.idUsuario=pidUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateVehiculo` (IN `pidVehiculo` INT(11), IN `pnombre` VARCHAR(40), IN `pmodelo` VARCHAR(40), IN `ppotencia` VARCHAR(40), IN `pimg` VARCHAR(100), IN `ptipo` VARCHAR(50))  NO SQL
UPDATE `vehiculos` SET `idVehiculo`=pidVehiculo,`nombre`=pnombre,`modelo`=pmodelo,`potencia`=ppotencia,`img`=pimg,`tipo`=ptipo WHERE `idVehiculo`= pidVehiculo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `fechaReserva` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaReservada` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rango` int(11) NOT NULL,
  `precio` double NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `fechaReserva`, `fechaReservada`, `rango`, `precio`, `idUsuario`, `idVehiculo`) VALUES
(13, '2019-10-31', '2019-11-07', 1, 30, 1, 10),
(15, '2019-10-31', '2023-05-18', 1, 30, 2, 2),
(17, '2019-11-07', '2019-11-07', 2, 30, 1, 11),
(18, '2019-11-20', '2019-11-20', 2, 30, 1, 8),
(19, '2019-11-29', '2019-11-30', 1, 30, 1, 5),
(23, '2019-11-25', '2019-11-25', 1, 30, 2, 3),
(24, '2019-11-25', '2019-11-25', 1, 30, 2, 3),
(25, '2019-11-13', '2019-11-14', 1, 30, 2, 6),
(26, '2019-11-11', '2019-11-13', 1, 30, 1, 13),
(27, '2019-11-13', '2019-11-19', 1, 30, 1, 12),
(28, '2019-11-23', '2019-11-23', 1, 30, 1, 12),
(29, '2019-11-29', '2019-11-23', 1, 30, 1, 12),
(30, '2019-11-12', '2019-11-24', 1, 30, 1, 12),
(31, '2019-11-12', '2019-11-21', 1, 30, 1, 12),
(32, '2019-11-12', '2019-11-21', 2, 30, 1, 12),
(33, '2019-11-19', '2019-11-06', 2, 30, 2, 12),
(34, '2019-11-21', '2019-11-29', 2, 30, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `contrasena`, `nombre`, `apellido`, `telefono`, `dni`, `tipo`) VALUES
(1, 'xarles', 'xarles', 'xarles', 'goitiz', '676767679', '46366000M', 2),
(2, 'patxi', 'patxi', 'patxi', 'elizaburu', '666555444', '46366666M', 1),
(3, 'eukene', 'eukene', 'EUKENE', 'PADILLA', '678812323', '12343245E', 1);

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
(10, 'Moma', 'BikeE_xd', '250w', 'https://images-na.ssl-images-amazon.com/images/I/81N0yvd7JLL._SL1500_.jpg', 'Bicicleta'),
(11, 'Xiaomi', 'Qicycle', '250w', 'https://images-na.ssl-images-amazon.com/images/I/71HM90eCFiL._SL1500_.jpg', 'Bicicleta'),
(12, 'NCM', 'Milano', '250w', 'https://images-na.ssl-images-amazon.com/images/I/719ng2UDN%2BL._SL1500_.jpg', 'Bicicleta'),
(13, 'Hyundai', 'Kona EV', '64kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2018/10/19/140393/hyundai-kona-electrico-6_g.jpg', 'Coche'),
(17, 'Jaguar', 'I-Pace', '100kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2018/03/01/118655/jaguar-pace-68_g.jpg', 'Coche'),
(18, 'Kia', 'e-Niro', '70kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2018/10/02/138767/niro-8_g.jpg', 'Coche'),
(19, 'Renault', 'Zoe', '75kw', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2017/01/03/79182/renault-2017-prueba-19_g.jpg', 'Coche');

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
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
