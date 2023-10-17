-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 19:16:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `onboard`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_solicitud`
--

CREATE TABLE `asesor_solicitud` (
  `id` int(10) NOT NULL,
  `nombre_asesor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asesor_solicitud`
--

INSERT INTO `asesor_solicitud` (`id`, `nombre_asesor`) VALUES
(1, 'john'),
(2, 'fabrizio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_solicitud`
--

CREATE TABLE `estado_solicitud` (
  `id` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_solicitud`
--

INSERT INTO `estado_solicitud` (`id`, `nombre_estado`) VALUES
(1, 'Por Confirmar'),
(2, 'Cancelado'),
(3, 'Confirmado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lvel`
--

CREATE TABLE `lvel` (
  `id` int(1) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lvel`
--

INSERT INTO `lvel` (`id`, `nivel`) VALUES
(1, 'onboarder'),
(2, 'asesor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo`
--

CREATE TABLE `metodo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `metodo`
--

INSERT INTO `metodo` (`id`, `nombre`) VALUES
(1, 'virtual'),
(2, 'presencial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Mantenimiento Preventivo - Software', 'Realiza acciones programadas para prevenir errores futuros en el software.'),
(2, 'Mantenimiento Adaptativo - Software', 'Modifica el software para adaptarlo a cambios en el entorno y los requisitos.'),
(3, 'Mantenimiento Correctivo - Software', ' Corrige errores y fallas en el software para restaurar su funcionamiento normal.'),
(4, 'Mantenimiento Preventivo - Hardware', ' Realiza acciones planificadas para prevenir fallas en componentes de hardware.'),
(5, 'Mantenimiento Correctivo - Hardware', 'Repara componentes físicos defectuosos para restaurar su funcionamiento normal.\r\n\r\n'),
(6, 'Mantenimiento de Emergencia - Hardware', 'Se realiza cuando ocurre una falla inesperada y requiere una respuesta inmediata para restaurar la operación normal.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(10) NOT NULL,
  `f_p` date NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `servicio` int(10) NOT NULL,
  `detalles` longtext NOT NULL,
  `metodo` int(11) NOT NULL,
  `estado_solicitud` int(11) NOT NULL DEFAULT 0,
  `asesor_solicitud` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `f_p`, `id_usuario`, `email`, `servicio`, `detalles`, `metodo`, `estado_solicitud`, `asesor_solicitud`) VALUES
(15, '2023-11-08', 19, 'test@test.com', 2, 'Utiliza datos y análisis para predecir cuándo es probable que ocurra una falla y se realiza mantenimiento antes de que o', 1, 3, 1),
(20, '2023-10-06', 18, 'mary@gmail.com', 4, 'Cambio de memoria RAM y camdio de disco dura de estado solido', 2, 2, 2),
(21, '2023-10-07', 15, 'juniorvargas@gmail.com', 6, 'Se realiza cuando ocurre una falla inesperada y requiere una respuesta inmediata para restaurar la operación normal.', 1, 3, 1),
(26, '2023-10-06', 17, 'flor152326@gmail.com', 5, 'Repara componentes físicos defectuosos para restaurar su funcionamiento normal.', 2, 1, 2),
(27, '2023-10-12', 9, 'sajkas@gmail.com', 5, 'Utiliza datos y análisis para predecir cuándo es probable que ocurra una falla y se realiza mantenimiento antes de que o', 2, 3, 1),
(29, '2023-10-26', 14, 'sa@sksa', 3, 'detalle jose', 1, 1, 2),
(30, '2023-11-01', 22, 'aurobo@gmail.com', 1, 'No me sirve esta pichurria de portatil, AIUAAAAA!!!!!', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `lvel` int(1) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `nickname`, `mail`, `contrasena`, `lvel`, `estado`) VALUES
(9, 'nathalia', 'ochoa', 'nathalia', 'nathalia8ag@gmail.com', '0227', 3, 0),
(10, 'john', 'garcia', 'johnsi', 'john@gmail.com', '1234', 2, 0),
(11, 'bruno', '', 'pipipipipi', 'bruno123@gmail.com', '', 1, 0),
(12, 'kiara', '', 'sapita123', 'kiarunchisuwu@gmail.com', '', 1, 0),
(14, 'Jana ', 'Yulitza ', 'Janita', 'janayulicardenas10@gmail.com', 'janacarden', 3, 1),
(15, 'Jesus', 'Ochoa', 'papi', 'jesus.ochoa.1982@gmail.com', 'brunomiamo', 1, 0),
(16, 'Juan ', 'Lopez', 'Lopecito1405', 'juancalopez.1983@gmail.com', 'a1b2c3', 1, 0),
(17, 'Juan ', 'Lopez', 'Lopecito1405', 'juancalopez.1983@gmail.com', 'a1b2c3', 1, 0),
(18, 'Gabo', 'Royal ', 'Gabi123', 'gladiszparada@hotmail.com', '1234', 1, 0),
(19, 'fabrizio', 'rivera', 'tomatoe', 'fabrizioriveraparedes@gmail.com', 'pipipi', 2, 0),
(21, 'jesus', 'argumedo', 'pipip', 'argomedo@gmail.com', '1234', 1, 0),
(22, 'Aurora', 'Boreal', 'auris', 'aurobo@gmail.com', '1234', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesor_solicitud`
--
ALTER TABLE `asesor_solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_solicitud`
--
ALTER TABLE `estado_solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lvel`
--
ALTER TABLE `lvel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodo`
--
ALTER TABLE `metodo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asesor_solicitud` (`id`),
  ADD KEY `categoria` (`servicio`),
  ADD KEY `metodo` (`metodo`),
  ADD KEY `fk_estado_solicitud` (`estado_solicitud`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lvel` (`lvel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_solicitud`
--
ALTER TABLE `estado_solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `metodo`
--
ALTER TABLE `metodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_estado_solicitud` FOREIGN KEY (`estado_solicitud`) REFERENCES `estado_solicitud` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`servicio`) REFERENCES `servicio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`metodo`) REFERENCES `metodo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`lvel`) REFERENCES `lvel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
