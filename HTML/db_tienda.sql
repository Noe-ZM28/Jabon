-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2022 a las 17:51:05
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_usuarios`
--

CREATE TABLE `carrito_usuarios` (
  `id_sesion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carrito_usuarios`
--

INSERT INTO `carrito_usuarios` (`id_sesion`, `id_producto`) VALUES
('fobqev38nib1osiofaj4m3pr5t', 6),
('fobqev38nib1osiofaj4m3pr5t', 6),
('fobqev38nib1osiofaj4m3pr5t', 8),
('fobqev38nib1osiofaj4m3pr5t', 6),
('fobqev38nib1osiofaj4m3pr5t', 10),
('fobqev38nib1osiofaj4m3pr5t', 8),
('fobqev38nib1osiofaj4m3pr5t', 6),
('fobqev38nib1osiofaj4m3pr5t', 8),
('', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `imagen`, `nombre`, `descripcion`, `precio`) VALUES
(6, '../Multimedia/Imagenes/jablav4.jpg', 'Jabón de lavanda', 'El jabón de lavanda es un jabón muy respetuoso con la piel. La lavanda es conocida por sus extraordinarias propiedades que hacen que este jabón sea apto para todo tipo de pieles, incluidas las pieles con problemas. El aroma a lavanda de este jabón natural ayudará a relajarte mientras lo usas.', '45.00'),
(8, '../Multimedia/Imagenes/jabsav7.jpg', 'Jabón de Sábila', 'La sábila contiene minerales muy valiosos, entre los cuales posee calcio, hierro, magnesio y zinc, entre otros. Además, es rica en vitaminas A, C, E y también del grupo B. ', '33.00'),
(10, '../Multimedia/Imagenes/javlech10.jpg', 'Jabón de coco', 'El jabón a base de coco, tanto si lleva coco natural rallado y aceite de coco como si solo tiene uno de los dos ingredientes, está lleno de propiedades que ofrecen grandes beneficios a nuestra piel. Entre ellos, destacamos las siguientes propiedades y beneficios del jabón de coco.', '40.00'),
(12, '../Multimedia/Imagenes/jabaven1.jpg', 'Jabón de avena', 'Jabón en barra echo a base de ingredientes 100% naturales, el proceso de obtención de nuestro jabón es a base de una saponificación en frio por lo tanto sus propiedades nunca se pierden durante el proceso de elaboración a cambio de un proceso de saponificación en caliente.', '39.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `nombre_apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nivel` enum('admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre_apellidos`, `email`, `password`, `nivel`) VALUES
(0, 'NoeZM', 'Noe Zúñiga', 'brinknene@gmail.com', '21644047', 'usuario'),
(1, 'Administrador', 'Noe Zuñiga', 'admin@gmail.com', '123456789', 'admin'),
(2, 'Usuario', 'Noe Zuñiga', 'user@gmail.com', '123456789', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  ADD CONSTRAINT `carrito_usuarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
