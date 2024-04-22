-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-11-2019 a las 09:49:47
-- Versión del servidor: 5.7.28-0ubuntu0.18.04.4
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegoBBDD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignarRol`
--

CREATE TABLE `asignarRol` (
  `idAsignarRol` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignarRol`
--

INSERT INTO `asignarRol` (`idAsignarRol`, `idRol`, `usuario`) VALUES
(2, 1, 'r@r.r'),
(3, 0, 'i@i.i'),
(4, 0, 'w@w.w'),
(6, 1, 'h@h.h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `ranking` (
  `idRanking` int(11) NOT NULL,
  `ganadas` int(11) DEFAULT NULL,
  `perdidas` int(11) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ranking`
--

INSERT INTO `ranking` (`idRanking`, `ganadas`, `perdidas`, `usuario`) VALUES
(2, 4, 0, 'r@r.r'),
(3, 8, 0, 'i@i.i'),
(4, 0, 0, 'w@w.w'),
(6, 0, 0, 'h@h.h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `descripcion`) VALUES
(0, 'Jugador'),
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `pwd`, `nombre`, `apellido`) VALUES
('h@h.h', 'c4ca4238a0b923820dcc509a6f75849b', 'kjsdnkjcn', 'kjsdnvkjsdn'),
('i@i.i', '865c0c0b4ab0e063e5caa3387c1a8741', 'Ines', 'Rodriguez'),
('r@r.r', '4b43b0aee35624cd95b910189b3dc231', 'Rocio', 'Quesada'),
('w@w.w', 'c4ca4238a0b923820dcc509a6f75849b', 'jknn', 'jnoj');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignarRol`
--
ALTER TABLE `asignarRol`
  ADD PRIMARY KEY (`idAsignarRol`);

--
-- Indices de la tabla `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`idRanking`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignarRol`
--
ALTER TABLE `asignarRol`
  MODIFY `idAsignarRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ranking`
--
ALTER TABLE `ranking`
  MODIFY `idRanking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
