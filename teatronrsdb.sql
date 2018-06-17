-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2018 a las 10:54:05
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `teatronrsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca`
--

CREATE TABLE IF NOT EXISTS `butaca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `butaca`
--

INSERT INTO `butaca` (`id`, `fila`, `columna`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 2, 1),
(12, 2, 2),
(13, 2, 3),
(14, 2, 4),
(15, 2, 5),
(16, 2, 6),
(17, 2, 7),
(18, 2, 8),
(19, 2, 9),
(20, 2, 10),
(21, 3, 1),
(22, 3, 2),
(23, 3, 3),
(24, 3, 4),
(25, 3, 5),
(26, 3, 6),
(27, 3, 7),
(28, 3, 8),
(29, 3, 9),
(30, 3, 10),
(31, 4, 1),
(32, 4, 2),
(33, 4, 3),
(34, 4, 4),
(35, 4, 5),
(36, 4, 6),
(37, 4, 7),
(38, 4, 8),
(39, 4, 9),
(40, 4, 10),
(41, 5, 1),
(42, 5, 2),
(43, 5, 3),
(44, 5, 4),
(45, 5, 5),
(46, 5, 6),
(47, 5, 7),
(48, 5, 8),
(49, 5, 9),
(50, 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca_reserva`
--

CREATE TABLE IF NOT EXISTS `butaca_reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reserva` int(11) DEFAULT NULL,
  `id_funcion` int(11) NOT NULL,
  `id_butaca` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_reserva` (`id_reserva`,`id_funcion`,`id_butaca`),
  KEY `id_butaca` (`id_butaca`),
  KEY `id_funcion` (`id_funcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `butaca_reserva`
--

INSERT INTO `butaca_reserva` (`id`, `id_reserva`, `id_funcion`, `id_butaca`, `status`) VALUES
(51, NULL, 5, 1, 0),
(52, NULL, 5, 2, 0),
(53, NULL, 5, 3, 0),
(54, NULL, 5, 4, 0),
(55, NULL, 5, 5, 0),
(56, NULL, 5, 6, 0),
(57, 12, 5, 7, 1),
(58, 12, 5, 8, 1),
(59, 12, 5, 9, 1),
(60, NULL, 5, 10, 0),
(61, NULL, 5, 11, 0),
(62, NULL, 5, 12, 0),
(63, NULL, 5, 13, 0),
(64, NULL, 5, 14, 0),
(65, NULL, 5, 15, 0),
(66, NULL, 5, 16, 0),
(67, NULL, 5, 17, 0),
(68, NULL, 5, 18, 0),
(69, NULL, 5, 19, 0),
(70, NULL, 5, 20, 0),
(71, NULL, 5, 21, 0),
(72, NULL, 5, 22, 0),
(73, NULL, 5, 23, 0),
(74, NULL, 5, 24, 0),
(75, NULL, 5, 25, 0),
(76, NULL, 5, 26, 0),
(77, NULL, 5, 27, 0),
(78, NULL, 5, 28, 0),
(79, NULL, 5, 29, 0),
(80, NULL, 5, 30, 0),
(81, NULL, 5, 31, 0),
(82, NULL, 5, 32, 0),
(83, NULL, 5, 33, 0),
(84, NULL, 5, 34, 0),
(85, NULL, 5, 35, 0),
(86, NULL, 5, 36, 0),
(87, NULL, 5, 37, 0),
(88, NULL, 5, 38, 0),
(89, NULL, 5, 39, 0),
(90, NULL, 5, 40, 0),
(91, NULL, 5, 41, 0),
(92, NULL, 5, 42, 0),
(93, NULL, 5, 43, 0),
(94, NULL, 5, 44, 0),
(95, NULL, 5, 45, 0),
(96, NULL, 5, 46, 0),
(97, NULL, 5, 47, 0),
(98, NULL, 5, 48, 0),
(99, NULL, 5, 49, 0),
(100, NULL, 5, 50, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE IF NOT EXISTS `funcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id`, `fecha`, `status`) VALUES
(5, '2018-06-19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_funcion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`,`id_funcion`),
  KEY `id_funcion` (`id_funcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `id_usuario`, `status`, `id_funcion`) VALUES
(12, 5, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `titulo`) VALUES
(1, 'Administrador'),
(2, 'Cliente\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  KEY `id_rol_2` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `nombres`, `apellidos`, `status`, `id_rol`) VALUES
(1, 'quirkjnthn@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Jonathan', 'Martinez', 1, 1),
(3, 'admin2@admin2.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin2', 'Admin2', 1, 1),
(4, 'admin2@admin3.com123123', '94bddd52e6d5de5fcc51f53d3c58383a', 'dsadsd', 'asasd', 2, 1),
(5, 'sonia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Sonia', 'Silva', 1, 2),
(6, 'juanpi@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Juan', 'Gutierrez', 1, 2),
(7, 'quirkjnthn@gmail.comqweqe', '827ccb0eea8a706c4c34a16891f84e7b', 'asdasdsad', 'asdsadad', 2, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `butaca_reserva`
--
ALTER TABLE `butaca_reserva`
  ADD CONSTRAINT `fk_id_butaca` FOREIGN KEY (`id_butaca`) REFERENCES `butaca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_funcion` FOREIGN KEY (`id_funcion`) REFERENCES `funcion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_funcion_reserva` FOREIGN KEY (`id_funcion`) REFERENCES `funcion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_reserva` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
