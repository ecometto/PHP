-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2022 a las 18:07:08
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(1, 'zapatilla Nike Revolution 5 hombre - Roja', '13200.00', 'zapatilla Nike Revolution 5 hombre - Roja. <br>Liviana y cómoda. <br>Ideal para caminatas y deportes al aire libre', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/4e93d193-e600-4280-a28c-baf31511417d/air-more-uptempo-zapatillas-1VgdC7.png'),
(2, 'zapatilla Nike Revolution 5 hombre - Negra', '13100.00', 'zapatilla Nike Revolution 5 hombre - Roja. <br>Liviana y cómoda. <br>Ideal para caminatas y deportes al aire libre', 'https://www.moovbydexter.com.ar/on/demandware.static/-/Sites-dabra-catalog/default/dw721f9e89/products/NI_CT1264-101/NI_CT1264-101-1.JPG'),
(3, 'zapatilla Nike Revolution 5 Mujer - Negra', '13000.00', 'zapatilla Nike Revolution 5 hombre - Roja. <br>Liviana y cómoda. <br>Ideal para caminatas y deportes al aire libre', 'https://sporting.vteximg.com.br/arquivos/ids/203635-1500-1500/4.jpg?v=637201571590170000'),
(4, 'zapatilla Nike DownShifter de Hombre - Negra', '15000.00', 'zapatilla Nike Revolution 5 hombre - Roja. <br>Liviana y cómoda. <br>Ideal para caminatas y deportes al aire libre', 'https://sporting.vteximg.com.br/arquivos/ids/202099-1500-1500/4BQ3207-002-00.jpg?v=637178199698770000'),
(5, 'zapatilla Nike DownShifter de Hombre - roja', '15000.00', 'zapatilla Nike Revolution 5 hombre - Roja. <br>Liviana y cómoda. <br>Ideal para caminatas y deportes al aire libre', 'https://sporting.vteximg.com.br/arquivos/ids/202093-1000-1000/4BQ3204-400-0584110.jpg?v=637178191910330000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
