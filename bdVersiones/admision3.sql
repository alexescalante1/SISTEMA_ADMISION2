-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2021 a las 04:35:17
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admision`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `dniAdmin` text COLLATE utf8_spanish_ci NOT NULL,
  `userAdmin` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `dark` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `dniAdmin`, `userAdmin`, `nombre`, `email`, `foto`, `password`, `perfil`, `estado`, `dark`, `fecha`) VALUES
(5, '73104785', '', 'Alex Escalante ONE', 'admin@gmail.com', 'vistas/img/perfiles/138.jpg', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, 1, '2021-08-08 02:31:29'),
(162, '73104795', '', 'Alex Escalante TWO', 'alexescalante921@gmail.com', 'vistas/img/perfiles/844.png', '$2a$07$asxx54ahjppf45sd87a5aubFblDrx5VgsL7udWc9pTLp1r8BxczhK', 'administrador', 1, 0, '2021-07-28 05:10:03'),
(165, '73545894', '', 'Fredy Marin Rojas', 'laboral@gmail.com', 'vistas/img/perfiles/972.jpg', '$2a$07$asxx54ahjppf45sd87a5auR6AmIR5N5CndGl8MnjTyLo5SYcp56Qe', 'laboratorista', 1, 1, '2021-07-11 18:18:54'),
(166, '15489562', '', 'Ana Maria', 'ana@gmail.com', 'vistas/img/perfiles/357.jpg', '$2a$07$asxx54ahjppf45sd87a5auzGfz9GaOjSPJ5jEDpHii9vSQEEqY1Zm', 'laboratorista', 0, 1, '2021-08-07 19:05:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos`
--

CREATE TABLE `cupos` (
  `idCupos` int(11) NOT NULL,
  `cupoBeca` int(11) NOT NULL,
  `cupoNormal` int(11) NOT NULL,
  `cupoTrasladosI` int(11) NOT NULL,
  `cupoTrasladosE` int(11) NOT NULL,
  `puntaje` double NOT NULL,
  `idEspecialidad` int(11) NOT NULL,
  `idAdmision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cupos`
--

INSERT INTO `cupos` (`idCupos`, `cupoBeca`, `cupoNormal`, `cupoTrasladosI`, `cupoTrasladosE`, `puntaje`, `idEspecialidad`, `idAdmision`) VALUES
(757, 0, 0, 0, 0, 0, 5, 166),
(758, 0, 0, 0, 0, 0, 6, 166),
(759, 0, 0, 0, 0, 0, 11, 166),
(760, 0, 0, 0, 0, 0, 10, 166),
(761, 0, 0, 0, 0, 0, 5, 167),
(762, 0, 0, 0, 0, 0, 6, 167),
(763, 0, 0, 0, 0, 0, 11, 167),
(764, 0, 0, 0, 0, 0, 10, 167),
(765, 1, 5, 0, 0, 9, 5, 168),
(766, 2, 6, 0, 0, 10, 6, 168),
(767, 3, 7, 0, 0, 11, 11, 168),
(768, 4, 8, 0, 0, 12, 10, 168);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `titulo`, `fecha`) VALUES
(5, 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TI', '2021-06-28 23:44:53'),
(6, 'ENFERMERIA TECNICA', '2021-06-28 23:46:18'),
(10, 'PRODUCCION AGROPECUARIA', '2021-06-29 02:51:05'),
(11, 'MECANICA DE PRODUCCION INDUSTRIAL', '2021-06-29 02:51:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoadmision`
--

CREATE TABLE `eventoadmision` (
  `idAdmision` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `finit` date NOT NULL,
  `ffin` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventoadmision`
--

INSERT INTO `eventoadmision` (`idAdmision`, `ruta`, `titulo`, `fecha`, `finit`, `ffin`, `estado`) VALUES
(166, 'examen-enero-2021', 'EXAMEN ENERO 2021', '2021-08-07 18:46:57', '0000-00-00', '0000-00-00', 0),
(167, 'examen-junio-2021', 'EXAMEN JUNIO 2021', '2021-08-07 18:47:10', '0000-00-00', '0000-00-00', 0),
(168, 'examen-septiembre-2021', 'EXAMEN SEPTIEMBRE 2021', '2021-08-07 18:47:27', '2021-08-01', '2021-08-31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `idExamen` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `problemas` text NOT NULL,
  `idAdmision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`idExamen`, `ruta`, `titulo`, `cantidad`, `problemas`, `idAdmision`) VALUES
(134, '', 'TIPO A', 2, '[{\"num\":1,\"sol\":\"3\",\"descripcion\":\"alex\",\"Ra\":\"q\",\"Rb\":\"w\",\"Rc\":\"e\",\"Rd\":\"r\",\"Re\":\"t\"},{\"num\":2,\"sol\":\"4\",\"descripcion\":\"escalante maron\",\"Ra\":\"a\",\"Rb\":\"s\",\"Rc\":\"d\",\"Rd\":\"f\",\"Re\":\"g\"}]', 168),
(135, '', 'TIPO B', 60, '', 168);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idInscripcion` int(11) NOT NULL,
  `Tpostulacion` text NOT NULL,
  `Popcion` int(11) NOT NULL,
  `Sopcion` int(11) NOT NULL,
  `vaucher` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idAdmision` int(11) NOT NULL,
  `idPostulante` int(11) NOT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`idInscripcion`, `Tpostulacion`, `Popcion`, `Sopcion`, `vaucher`, `estado`, `fecha`, `idAdmision`, `idPostulante`, `idAdmin`) VALUES
(23, 'beca', 5, 11, 'vistas/img/vaucher/23198.jpg', 0, '2021-08-08 01:53:49', 168, 37, 5),
(24, 'normal', 6, 10, 'vistas/img/vaucher/24919.jpg', 1, '2021-08-08 01:54:22', 168, 38, 5),
(25, 'beca', 10, 5, 'vistas/img/vaucher/25346.jpg', 1, '2021-08-08 02:33:11', 168, 39, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idNotificacion` int(11) NOT NULL,
  `tipoDocTitular` int(11) NOT NULL,
  `numDocTitular` text NOT NULL,
  `nombreTitular` text NOT NULL,
  `apellidoTitular` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `detalle` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visto` int(11) NOT NULL,
  `idDetalleArticulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idNotificacion`, `tipoDocTitular`, `numDocTitular`, `nombreTitular`, `apellidoTitular`, `cantidad`, `dias`, `detalle`, `fecha`, `visto`, `idDetalleArticulo`) VALUES
(156, 0, '162894', 'usuarioone', '', 4, 9, 'please', '2021-02-22 02:08:31', 1, 222),
(157, 0, '162894', 'usuarioone', '', 1, 3, 'asdasd', '2021-02-22 05:16:20', 1, 222),
(158, 0, '162894', 'usuarioone', '', 1, 3, 'asdasdasd', '2021-08-07 18:46:15', 0, 222),
(161, 0, '73104786', 'Axel flores mamani', '', 1, 3, 'jojos', '2021-03-11 03:37:25', 1, 222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  `Hini` time NOT NULL,
  `Hfin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `logo`, `icono`, `Hini`, `Hfin`) VALUES
(1, 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/icono.png', '22:33:24', '07:36:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `idPostulante` int(11) NOT NULL,
  `dni` text NOT NULL,
  `nombre` text NOT NULL,
  `apellidoPat` text NOT NULL,
  `apellidoMat` text NOT NULL,
  `fecha` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`idPostulante`, `dni`, `nombre`, `apellidoPat`, `apellidoMat`, `fecha`, `foto`) VALUES
(37, '73104785', 'LUZ', 'ESCALANTE', 'MARON', '1999-03-26', 'vistas/img/postulantes/37535.png'),
(38, '88847555', 'MIRIAN ROXANA', 'FLORES', 'ROZALES', '2021-08-26', 'vistas/img/postulantes/38621.jpg'),
(39, '85479956', 'DENIS', 'VELAZCO', 'ALMARADO', '2021-08-18', 'vistas/img/postulantes/39536.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantedetalle`
--

CREATE TABLE `postulantedetalle` (
  `idPostulanteD` int(11) NOT NULL,
  `idPostulante` int(11) NOT NULL,
  `genero` text NOT NULL,
  `correo` text NOT NULL,
  `celularOne` text NOT NULL,
  `celularTwo` text NOT NULL,
  `direccion` text NOT NULL,
  `departamento` text NOT NULL,
  `provincia` text NOT NULL,
  `distrito` text NOT NULL,
  `representante` text NOT NULL,
  `dniR` text NOT NULL,
  `correoR` text NOT NULL,
  `parentescoR` text NOT NULL,
  `direccionR` text NOT NULL,
  `celularR` text NOT NULL,
  `colegio` text NOT NULL,
  `Ctipo` text NOT NULL,
  `Cespecialidad` text NOT NULL,
  `Cnota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `postulantedetalle`
--

INSERT INTO `postulantedetalle` (`idPostulanteD`, `idPostulante`, `genero`, `correo`, `celularOne`, `celularTwo`, `direccion`, `departamento`, `provincia`, `distrito`, `representante`, `dniR`, `correoR`, `parentescoR`, `direccionR`, `celularR`, `colegio`, `Ctipo`, `Cespecialidad`, `Cnota`) VALUES
(28, 37, 'Mujer', 'alex@gmail.com', '848777874', '445454548', 'AV. LAS TORRES Nº452', 'PUNO', 'PUNO', 'PUNO', 'LOURDES', '84541215', 'lourdes@gmail.com', 'madre', 'ME TOO', '111111111', 'GRAN UNIDAD ESCOLAR SAN CARLOS PUNO', 'publico', 'ELECTRONICA', 16),
(29, 38, 'Mujer', 'miriam@gmail.com', '847555115', '784874877', 'AV. NICOLAS DE PIEROLA Nº234', 'PUNO', 'PUNO', 'PUNO', 'CARLOS VENAVIDEZ CCOPA', '88451125', 'carlos@gmail.com', 'otro', 'ME TOO', '845784545', 'SANTA ROSA DE LIMA', 'publico', '', 18),
(30, 39, 'Hombre', 'denis@gmail.com', '231231231', '234334534', 'AV. ORG NE', 'PUNO', 'PUNO', 'PUNO', 'REPRESENTANTE', '95845551', 'representante@gmail.com', 'padre', '', '151548484', 'MIGUEL GRAU', 'publico', '', 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD PRIMARY KEY (`idCupos`),
  ADD KEY `especialidad-cupos` (`idEspecialidad`),
  ADD KEY `admision-cupos` (`idAdmision`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `eventoadmision`
--
ALTER TABLE `eventoadmision`
  ADD PRIMARY KEY (`idAdmision`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idExamen`),
  ADD KEY `examen-admision` (`idAdmision`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `inscripAdmision` (`idAdmision`),
  ADD KEY `inscripPostulant` (`idPostulante`),
  ADD KEY `inscripAdmin` (`idAdmin`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idNotificacion`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`idPostulante`);

--
-- Indices de la tabla `postulantedetalle`
--
ALTER TABLE `postulantedetalle`
  ADD PRIMARY KEY (`idPostulanteD`),
  ADD KEY `postulanteRDetalle` (`idPostulante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `cupos`
--
ALTER TABLE `cupos`
  MODIFY `idCupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=773;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `eventoadmision`
--
ALTER TABLE `eventoadmision`
  MODIFY `idAdmision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `idPostulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `postulantedetalle`
--
ALTER TABLE `postulantedetalle`
  MODIFY `idPostulanteD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD CONSTRAINT `admision-cupos` FOREIGN KEY (`idAdmision`) REFERENCES `eventoadmision` (`idAdmision`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `especialidad-cupos` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`idEspecialidad`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen-admision` FOREIGN KEY (`idAdmision`) REFERENCES `eventoadmision` (`idAdmision`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripAdmin` FOREIGN KEY (`idAdmin`) REFERENCES `administradores` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inscripAdmision` FOREIGN KEY (`idAdmision`) REFERENCES `eventoadmision` (`idAdmision`),
  ADD CONSTRAINT `inscripPostulant` FOREIGN KEY (`idPostulante`) REFERENCES `postulante` (`idPostulante`);

--
-- Filtros para la tabla `postulantedetalle`
--
ALTER TABLE `postulantedetalle`
  ADD CONSTRAINT `postulanteRDetalle` FOREIGN KEY (`idPostulante`) REFERENCES `postulante` (`idPostulante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
