-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2022 a las 20:09:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jose_3e`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `actividad` varchar(255) DEFAULT NULL,
  `datos` text DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporteLog`
--

CREATE TABLE `reporteLog` (
  `id` int(11) NOT NULL,
  `fechaLogin` datetime DEFAULT NULL,
  `fechaLogout` datetime DEFAULT NULL,
  `datos` text DEFAULT NULL,
  `origen` varchar(128) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombreCompleto` varchar(100) DEFAULT NULL,
  `usuario` varchar(125) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `permisoVer` varchar(55) DEFAULT NULL,
  `permisoCrear` varchar(55) DEFAULT NULL,
  `permisoEliminar` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombreCompleto`, `usuario`, `correo`, `contrasena`, `fechaRegistro`, `estado`, `tipo`, `foto`, `permisoVer`, `permisoCrear`, `permisoEliminar`) VALUES
(1, 'Jose Manuel Bautista', 'joseju', 'joseju@joseju.com', '$2y$10$Zb5tXbYAi3Id0H2GPWI1OuJSzmua3mVllXJUW/xVjFljPh9PjZmlu', '2022-08-09 09:32:05', '1', 'ADMINISTRADOR', 'imagesUser/20220809202607carliotos.png', 'ver', 'crear', 'eliminar'),
(7, 'juan', 'juan', 'juan@juan.com', '$2y$10$vag/DRvUyuJ2zkysPjJKkuWRQ0kt2tUr1ckYymLrHX0ojY5jRQEg6', '2022-08-09 09:14:17', '1', 'NORMAL', 'imagesUser/20220809212145images.jpg', 'ver', '', 'eliminar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `reporteLog`
--
ALTER TABLE `reporteLog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporteLog`
--
ALTER TABLE `reporteLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `reporteLog`
--
ALTER TABLE `reporteLog`
  ADD CONSTRAINT `reporteLog_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
