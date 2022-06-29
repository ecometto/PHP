-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2022 a las 11:31:07
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_movimiento`
--

CREATE TABLE `detalles_movimiento` (
  `det_id` tinyint(4) NOT NULL,
  `det_movid` mediumint(8) DEFAULT NULL,
  `det_itemid` tinyint(4) DEFAULT NULL,
  `det_cantidad` int(10) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles_movimiento`
--

INSERT INTO `detalles_movimiento` (`det_id`, `det_movid`, `det_itemid`, `det_cantidad`, `observaciones`) VALUES
(2, 19, 14, 10, '12131313'),
(3, 19, 15, 12, '1323135153'),
(4, 20, 16, 8, '21231 idhfiodahsif dasñhf  shd'),
(5, 20, 13, 55, 'fao afoaoa ggreggre'),
(6, 20, 23, 30, 'vmas gadgtgj eqtqregtre'),
(7, 21, 14, 3, 'nada'),
(8, 21, 15, 2, 'nada 2'),
(9, 21, 21, 100, ' ndcnds'),
(10, 22, 13, -20, '12123'),
(11, 22, 21, -100, 'ninguna'),
(12, 23, 20, -100, 'ninguna'),
(13, 23, 21, -100, 'ninguna'),
(14, 24, 14, -2, '1213121'),
(15, 24, 22, -150, '1213213'),
(16, 25, 22, -20, '120336'),
(17, 25, 13, -10, '123'),
(18, 26, 13, 100, 'primera'),
(19, 26, 14, 10, 'primera'),
(20, 26, 15, 10, 'primera'),
(21, 27, 13, -10, 'ot 2020'),
(22, 27, 14, -1, 'ot 1523'),
(23, 28, 22, 40, '2 latas de 20 litros'),
(24, 28, 23, 20, 'marca galgo'),
(25, 29, 25, 100, 'oc 2020'),
(26, 29, 13, 50, 'oc'),
(27, 30, 21, 100, 'richeta legajo 1'),
(28, 30, 20, 100, 'riche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `mov_id` mediumint(8) NOT NULL,
  `mov_fecha` date DEFAULT NULL,
  `mov_tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`mov_id`, `mov_fecha`, `mov_tipo`) VALUES
(2, '2022-02-24', 'Entrada'),
(3, '2022-02-24', 'Entrada'),
(4, '2022-02-24', 'Entrada'),
(5, '2022-02-24', 'Entrada'),
(6, '2022-02-24', 'Entrada'),
(7, '2022-02-24', 'Entrada'),
(8, '2022-02-24', 'Entrada'),
(9, '2022-02-24', 'Entrada'),
(10, '2022-02-24', 'Entrada'),
(11, '2022-02-24', 'Entrada'),
(12, '2022-02-24', 'Entrada'),
(13, '2022-02-24', 'Entrada'),
(14, '2022-02-24', 'Entrada'),
(15, '2022-02-24', 'Entrada'),
(16, '2022-02-24', 'Entrada'),
(17, '2022-02-24', 'Entrada'),
(18, '2022-02-24', 'Entrada'),
(19, '2022-02-24', 'Entrada'),
(20, '2022-02-24', 'Entrada'),
(21, '2022-03-03', 'Entrada'),
(22, '2022-03-03', 'Entrada'),
(23, '2022-03-03', 'Entrada'),
(24, '2022-03-03', 'Entrada'),
(25, '2022-03-03', 'Salida'),
(26, '2022-03-03', 'Entrada'),
(27, '2022-03-03', 'Salida'),
(28, '2022-03-04', 'Entrada'),
(29, '2022-03-22', 'Entrada'),
(30, '2022-03-22', 'Entrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_id` mediumint(8) NOT NULL,
  `prod_rubroId` tinyint(4) DEFAULT NULL,
  `prod_descripcion` varchar(100) DEFAULT NULL,
  `prod_umedidaId` tinyint(4) DEFAULT NULL,
  `prod_detalles` varchar(200) DEFAULT NULL,
  `prod_estado` enum('habilitado','inabilitado') DEFAULT 'habilitado',
  `stock` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_rubroId`, `prod_descripcion`, `prod_umedidaId`, `prod_detalles`, `prod_estado`, `stock`) VALUES
(13, 1, 'lampara bajo consumo 10w e27 ', 1, '                                        marca phillip o similar                   22222                 ', NULL, 140),
(14, 3, 'motor forzador westric 1500w', 1, 'marca davica', NULL, 9),
(15, 3, 'Cambiando descripcion', 1, 'detalles adicionales agreados', NULL, 10),
(16, 3, 'motor forzador westric 1500w 2000RPM ', 1, '  marca davica 2 . que pasa si le pongo mucho testo . vamos a ver como se ve en la tabla', NULL, 0),
(20, 2, 'cable 1mm2 rojo', 2, 'homologado', NULL, 100),
(21, 2, 'cable 1mm2 negro', 2, 'homologado', NULL, 100),
(22, 4, 'latex blanco interior', 3, 'Es por litros', NULL, 40),
(23, 4, 'pincel n15 (37mm)', 1, 'marca galgo', NULL, 20),
(25, 1, 'tubo fluorescente', 1, 'phillip', NULL, 100),
(26, 4, 'pincel  25mm', 1, '62mm                                    ', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `rubro_id` tinyint(4) NOT NULL,
  `rubro_descripcion` varchar(50) DEFAULT NULL,
  `rubro_estado` enum('habilitado','inhabilitado') DEFAULT 'habilitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`rubro_id`, `rubro_descripcion`, `rubro_estado`) VALUES
(1, 'iluminacion', 'habilitado'),
(2, 'potencia', 'habilitado'),
(3, 'ambiente', 'habilitado'),
(4, 'pintureria', 'habilitado'),
(5, 'construccion tradicional', 'habilitado'),
(6, 'plomeria', 'habilitado'),
(7, 'metalurgicos', 'habilitado'),
(8, 'construccion en seco', 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `umedidas`
--

CREATE TABLE `umedidas` (
  `umedida_id` tinyint(4) NOT NULL,
  `umedida_descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `umedidas`
--

INSERT INTO `umedidas` (`umedida_id`, `umedida_descripcion`) VALUES
(1, 'unidad'),
(2, 'metro'),
(3, 'litro'),
(4, 'm2'),
(5, 'm3'),
(6, 'global');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` smallint(4) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `type` enum('admin','user') DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `mail`, `pass`, `type`, `status`) VALUES
(1, 'ecometto@vengsa.com.ar', '123', 'admin', 1),
(2, 'ecometto@hotmail.com', '123', 'user', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_movimiento`
--
ALTER TABLE `detalles_movimiento`
  ADD PRIMARY KEY (`det_id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`mov_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_rubro` (`prod_rubroId`),
  ADD KEY `fk_umedida` (`prod_umedidaId`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`rubro_id`);

--
-- Indices de la tabla `umedidas`
--
ALTER TABLE `umedidas`
  ADD PRIMARY KEY (`umedida_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_movimiento`
--
ALTER TABLE `detalles_movimiento`
  MODIFY `det_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `mov_id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `rubro_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `umedidas`
--
ALTER TABLE `umedidas`
  MODIFY `umedida_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_rubro` FOREIGN KEY (`prod_rubroId`) REFERENCES `rubros` (`rubro_id`),
  ADD CONSTRAINT `fk_umedida` FOREIGN KEY (`prod_umedidaId`) REFERENCES `umedidas` (`umedida_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
