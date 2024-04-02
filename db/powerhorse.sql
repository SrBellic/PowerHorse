-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2024 a las 10:03:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `powerhorse`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_direccion`
--

CREATE TABLE `tabla_direccion` (
  `id_direccion` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_direccion`
--

INSERT INTO `tabla_direccion` (`id_direccion`, `direccion`) VALUES
(1, 'santa monica'),
(2, 'El Peaje, Caracas'),
(3, 'la candelaria'),
(4, 'su casa'),
(5, 'san bernardino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_marca`
--

CREATE TABLE `tabla_marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_marca`
--

INSERT INTO `tabla_marca` (`id_marca`, `marca`) VALUES
(1, 'Chevrolet'),
(2, 'Ford'),
(3, 'Toyota'),
(4, 'Volkswagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_nombre_producto`
--

CREATE TABLE `tabla_nombre_producto` (
  `id_nombre_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_nombre_producto`
--

INSERT INTO `tabla_nombre_producto` (`id_nombre_producto`, `nombre_producto`) VALUES
(1, 'Bujía Aveo'),
(2, 'Correa de tiempo Optra Desing 1,8'),
(3, 'Refrigerante Acdelco 50/50 Prediluido'),
(4, 'Bujía Explorer 4.6 Eddie Bauer'),
(5, 'Correa Única'),
(6, 'Filtro De Aceite Wix Wl7214 Explorer Ranger F-150'),
(7, 'Brazo De Biela Terios 1.3'),
(8, 'Bujía Starlet Avila Fj40 Samurai'),
(9, 'Pila Eléctrica De Gasolina Con Filtro'),
(10, 'Batería para Escarabajo'),
(11, 'Ducto Tubo De Aire De Motor'),
(12, 'Electroventilador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_producto`
--

CREATE TABLE `tabla_producto` (
  `id_producto` int(11) NOT NULL,
  `id_nombre_producto` int(3) NOT NULL,
  `descripcion_producto` varchar(250) NOT NULL,
  `id_marca` int(3) NOT NULL,
  `precio_producto` float NOT NULL,
  `stock_producto` int(7) NOT NULL,
  `imagen_producto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_producto`
--

INSERT INTO `tabla_producto` (`id_producto`, `id_nombre_producto`, `descripcion_producto`, `id_marca`, `precio_producto`, `stock_producto`, `imagen_producto`) VALUES
(1, 1, 'Bujía Para Chevrolet Aveo. Rosca Corta Con Punta De Cobre.', 1, 20, 10, 'Diapositiva1.SVG'),
(2, 2, 'Correa Tiempo Chevrolet Optra Desing 1,8 Todos Gates TT1094 de 162 dientes.', 1, 80, 7, 'Diapositiva2.SVG'),
(3, 3, 'Refrigerante Original Acdelco Importado 50/50 Prediluido.', 1, 16, 20, 'Diapositiva3.SVG'),
(4, 4, 'Bujía Ford Explorer 4.6 Eddie Bauer para los modelos 2006 2007 2008 2009 y 2010. SP-515 PZH14F SP515 SP-546 SP546.', 2, 20, 20, 'Diapositiva4.SVG'),
(5, 5, 'Correa Única Ford Fusion 08-10 Ecosport 2.0 04-09 6pk2240.', 2, 25, 15, 'Diapositiva5.SVG'),
(6, 6, 'Filtro De Aceite Wix Wl7214 51372 Explorer Ranger F-150.', 2, 20, 20, 'Diapositiva6.SVG'),
(7, 7, 'Brazo De Biela Toyota Terios 1.3 K3 de años 2000, 2001, 2002, 2003 y 2004.', 3, 50, 20, 'Diapositiva7.SVG'),
(8, 8, 'Bujía Toyota Starlet Avila Fj40 Samurai 2f 3f Dado 13 16 N12YC', 3, 20, 30, 'Diapositiva8.SVG'),
(9, 9, 'Pila Eléctrica De Gasolina Con Filtro Fortuner Hilux 2.7.', 3, 40, 10, 'Diapositiva9.SVG'),
(10, 10, 'Batería Para Vehículo Volkswagen Bora Beetle Golf ácido-plomo 12V 800 Ah modelo 22MR', 4, 100, 3, 'Diapositiva10.SVG'),
(11, 11, 'Ducto Tubo De Aire De Motor Para Volkswagen Bora 2.0.', 4, 60, 10, 'Diapositiva11.SVG'),
(12, 12, 'Electroventilador Volkswagen Fox Spacefox Crossfox Polo 1.6.', 4, 20, 5, 'Diapositiva12.SVG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_tipo_usuario`
--

CREATE TABLE `tabla_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_tipo_usuario`
--

INSERT INTO `tabla_tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_usuarios`
--

CREATE TABLE `tabla_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `id_direccion` int(3) NOT NULL,
  `id_tipo_usuario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_usuarios`
--

INSERT INTO `tabla_usuarios` (`id_usuario`, `usuario`, `nombre`, `apellido`, `contraseña`, `correo`, `cedula`, `id_direccion`, `id_tipo_usuario`) VALUES
(7, 'bellic', 'diego', 'torres', '12345678', 'diego@gmail.com', '30112113', 1, 1),
(10, 'carroconarte', 'francisco', 'gomez', '', 'carroconartegmail.com', '12312312', 3, 1),
(11, 'alexmoya', 'alexander', 'moya', '$2y$10$ASmqDptE7vWpRNH4I4qyXOHql2KDopKB4xKcC2A2WsmEqV5wAC2ve', 'alexander@moya.com', '12123123', 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_direccion`
--
ALTER TABLE `tabla_direccion`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `tabla_marca`
--
ALTER TABLE `tabla_marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `tabla_nombre_producto`
--
ALTER TABLE `tabla_nombre_producto`
  ADD PRIMARY KEY (`id_nombre_producto`);

--
-- Indices de la tabla `tabla_producto`
--
ALTER TABLE `tabla_producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_nombre_producto` (`id_nombre_producto`,`id_marca`,`precio_producto`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_precios__ds` (`precio_producto`);

--
-- Indices de la tabla `tabla_tipo_usuario`
--
ALTER TABLE `tabla_tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_nombre` (`id_direccion`,`id_tipo_usuario`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `usuario_2` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_direccion`
--
ALTER TABLE `tabla_direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tabla_marca`
--
ALTER TABLE `tabla_marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tabla_nombre_producto`
--
ALTER TABLE `tabla_nombre_producto`
  MODIFY `id_nombre_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tabla_producto`
--
ALTER TABLE `tabla_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tabla_tipo_usuario`
--
ALTER TABLE `tabla_tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla_producto`
--
ALTER TABLE `tabla_producto`
  ADD CONSTRAINT `tabla_producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `tabla_marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabla_producto_ibfk_2` FOREIGN KEY (`id_nombre_producto`) REFERENCES `tabla_nombre_producto` (`id_nombre_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  ADD CONSTRAINT `tabla_usuarios_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `tabla_direccion` (`id_direccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabla_usuarios_ibfk_4` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tabla_tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
