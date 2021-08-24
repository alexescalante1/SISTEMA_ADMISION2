-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2021 a las 10:48:10
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
(5, '73104785', '', 'Alex Escalante ONE', 'admin@gmail.com', 'vistas/img/perfiles/138.jpg', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, 1, '2021-08-15 17:41:05'),
(162, '73104795', '', 'Alex Escalante TWO', 'alexescalante921@gmail.com', 'vistas/img/perfiles/844.png', '$2a$07$asxx54ahjppf45sd87a5aubFblDrx5VgsL7udWc9pTLp1r8BxczhK', 'laboratorista', 1, 0, '2021-08-15 19:19:33'),
(165, '73545894', '', 'Fredy Marin Rojas', 'laboral@gmail.com', 'vistas/img/perfiles/972.jpg', '$2a$07$asxx54ahjppf45sd87a5auR6AmIR5N5CndGl8MnjTyLo5SYcp56Qe', 'laboratorista', 1, 1, '2021-07-11 18:18:54');

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
(773, 0, 0, 0, 0, 0, 5, 170),
(774, 0, 0, 0, 0, 0, 6, 170),
(775, 0, 0, 0, 0, 0, 11, 170),
(776, 0, 0, 0, 0, 0, 10, 170),
(777, 0, 0, 0, 0, 0, 5, 171),
(778, 0, 0, 0, 0, 0, 6, 171),
(779, 0, 0, 0, 0, 0, 11, 171),
(780, 0, 0, 0, 0, 0, 10, 171),
(781, 0, 0, 0, 0, 0, 5, 172),
(782, 0, 0, 0, 0, 0, 6, 172),
(783, 0, 0, 0, 0, 0, 11, 172),
(784, 0, 0, 0, 0, 0, 10, 172),
(785, 1, 2, 0, 0, 1400, 5, 173),
(786, 2, 2, 0, 0, 700, 6, 173),
(787, 2, 3, 0, 0, 800, 11, 173),
(788, 2, 3, 0, 0, 500, 10, 173);

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
(170, 'examen-enero-2021', 'EXAMEN ENERO 2021', '2021-08-14 06:32:13', '0000-00-00', '0000-00-00', 0),
(171, 'examen-marzo-2021', 'EXAMEN MARZO 2021', '2021-08-14 06:32:32', '0000-00-00', '0000-00-00', 0),
(172, 'examen-junio-2021', 'EXAMEN JUNIO 2021', '2021-08-14 06:32:52', '0000-00-00', '0000-00-00', 0),
(173, 'examen-septiembre-2021', 'EXAMEN SEPTIEMBRE 2021', '2021-08-14 06:33:07', '2021-08-01', '2021-08-31', 1);

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
(138, '', 'TIPO A', 60, '', 172),
(139, '', 'TIPO A', 20, '[{\"num\":1,\"sol\":\"1\",\"pts\":\"100\",\"descripcion\":\"El crecimiento de las demandas energéticas y de alimentos por la población humana está provocando grandes cambios en las condiciones abióticas de nuestro planeta. Uno de estos cambios es el incremento de la temperatura global promedio, habiendo sido el 2016 el año más caluroso de la última década. Este incremento de temperatura se debe, principalmente:\",\"Ra\":\"al exagerado uso de fertilizantes en la agricultura.\",\"Rb\":\"a la extracción y uso excesivo de combustibles fósiles\",\"Rc\":\"el aumento del uso de radiación UV por la industria\",\"Rd\":\"al incremento de la fotosíntesis por la arborización.\",\"Re\":\"al desplazamiento y cambio de las corrientes marinas.\"},{\"num\":2,\"sol\":\"3\",\"pts\":\"100\",\"descripcion\":\"Señale la organela que presenta numerosas enzimas oxidasas y catalasas:\",\"Ra\":\"lisosoma\",\"Rb\":\"cloroplasto\",\"Rc\":\"ribosoma\",\"Rd\":\"peroxisoma\",\"Re\":\"aparato de golgi\"},{\"num\":3,\"sol\":\"4\",\"pts\":\"100\",\"descripcion\":\"Al examinar las preguntas del sondeo llevado a cabo en Madrid, se establece que los\\nproblemas de salud mental son de índole\\n\\nI. multifactorial.\\nII. ecológica.\\nIII. idiosincrásica.\",\"Ra\":\"I\",\"Rb\":\"I Y II\",\"Rc\":\"III\",\"Rd\":\"VIII\",\"Re\":\"IV\"},{\"num\":4,\"sol\":\"3\",\"pts\":\"100\",\"descripcion\":\"En una urna hay 10 bolas rojas, 12 azules, 15 verdes, ¿como mínimo cuál es el número de bolas que debo sacar para obtener 8 del mismo color?\",\"Ra\":\"20\",\"Rb\":\"25\",\"Rc\":\"22\",\"Rd\":\"23\",\"Re\":\"18\"},{\"num\":5,\"sol\":\"3\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":6,\"sol\":\"3\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"V\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":7,\"sol\":\"4\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"V\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":8,\"sol\":\"5\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":9,\"sol\":\"2\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":10,\"sol\":\"1\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":11,\"sol\":\"2\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":12,\"sol\":\"3\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":13,\"sol\":\"4\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":14,\"sol\":\"5\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":15,\"sol\":\"4\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":16,\"sol\":\"3\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":17,\"sol\":\"2\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":18,\"sol\":\"1\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":19,\"sol\":\"5\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"},{\"num\":20,\"sol\":\"5\",\"pts\":\"100\",\"descripcion\":\"Si, en el sondeo realizado, los madrileños hubiesen respondido mayoritariamente que el\\nentorno de su ciudad era excelente,\",\"Ra\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rb\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rc\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Rd\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\",\"Re\":\"significaría que, desde su percepción, Madrid maneja bien el ruido ambiental\"}]', 173),
(140, '', 'TIPO B', 60, '', 173);

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
(46, 'normal', 5, 6, 'vistas/img/vaucher/46890.jpg', 1, '2021-08-14 06:51:47', 173, 60, 5),
(47, 'normal', 6, 10, 'vistas/img/vaucher/47491.jpg', 1, '2021-08-14 06:58:18', 173, 61, 5),
(48, 'normal', 10, 11, 'vistas/img/vaucher/48563.png', 1, '2021-08-14 07:03:35', 173, 62, 5),
(49, 'normal', 5, 10, 'vistas/img/vaucher/49534.jpg', 1, '2021-08-14 07:10:32', 173, 63, 5),
(50, 'normal', 6, 10, 'vistas/img/vaucher/50730.jpg', 1, '2021-08-14 07:12:39', 173, 64, 5),
(51, 'beca', 5, 6, 'vistas/img/vaucher/51749.png', 1, '2021-08-14 08:16:14', 173, 65, 5),
(52, 'beca', 5, 6, 'vistas/img/vaucher/52268.jpg', 1, '2021-08-14 07:21:03', 173, 66, 5),
(53, 'normal', 5, 6, 'vistas/img/vaucher/53828.jpg', 1, '2021-08-14 07:23:20', 173, 67, 5),
(54, 'normal', 5, 6, 'vistas/img/vaucher/54410.jpg', 1, '2021-08-14 08:21:38', 173, 68, 5),
(55, 'normal', 6, 10, 'vistas/img/vaucher/55466.jpg', 1, '2021-08-14 07:27:52', 173, 69, 5);

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
(60, '73104785', 'ALEX FREDY', 'ESCALANTE', 'MARON', '1999-03-26', 'vistas/img/postulantes/60460.jpg'),
(61, '73104786', 'MARILUZ', 'ESPINOZA', 'MENDOZA', '2021-08-09', 'vistas/img/postulantes/61388.jpg'),
(62, '73104781', 'YOTSUBA', 'NINO', 'MIKU', '2021-08-11', 'vistas/img/postulantes/62395.jpg'),
(63, '73104782', 'CARLOS', 'ALCANTARA ', 'MESA', '2021-08-11', 'vistas/img/postulantes/63555.jpg'),
(64, '73104783', 'RIMIAN', 'ROZAL', 'ADREESS', '2021-08-05', 'vistas/img/postulantes/64982.jpg'),
(65, '73104784', 'WILLSON', 'VARGAS', 'CALLA', '2021-08-11', 'vistas/img/postulantes/65386.jpg'),
(66, '73104787', 'NAOFUMI', 'IWATANI', 'TATE', '2021-08-18', 'vistas/img/postulantes/66937.jpg'),
(67, '73104788', 'RAPHTALIA', 'NAOF', 'TATE', '2021-08-17', 'vistas/img/postulantes/67919.jpg'),
(68, '73104789', 'BILL', 'GATES', 'MHS', '2021-08-11', 'vistas/img/postulantes/68381.jpg'),
(69, '73104790', 'YEMIRA', 'TICONA', 'SOTO', '2021-08-10', 'vistas/img/postulantes/69296.jpg');

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
(51, 60, 'Hombre', 'alex@gmail.com', '978308554', '', 'AV.ORGULLO AYMARA Nº452', 'PUNO', 'PUNO', 'PUNO', 'LOURDES MARON MAMANI', '73104748', '', 'madre', '', '845121212', 'GRAN UNIDAD ESCOLAR SAN CARLOS', 'publico', '', 0),
(52, 61, 'Mujer', 'mariluz@gmail.com', '151515151', '', 'AV.RF', 'PUNO', 'PUNO', 'PUNO', 'ENRIQUE ESCALANTE CHOQUE', '84512121', '', 'padre', '', '848454515', 'MARIA AUXILIADORA', 'publico', '', 0),
(53, 62, 'Mujer', 'hd@as.s', '123131313', '', 'AV.ERDA', 'P', 'P', 'P', 'JUAN ESPINOZA', '84559556', '', 'padre', '', '551511111', 'GLORIOSO SAN CARLOS', 'publico', '', 0),
(54, 63, 'Hombre', 'car@dsf.s', '151512151', '', 'ASDASD', 'P', 'P', 'P', 'JUAN', '88445454', '', 'madreP', '', '155111122', 'MARIATEGUI', 'publico', '', 0),
(55, 64, 'Hombre', 'rox@s.sa', '123123123', '', 'SV XSA', 'P', 'P', 'P', 'MIKU', '48454554', '', 'madre', '', '123111123', 'BELLESN', 'particular', '', 0),
(56, 65, 'Hombre', 'willson@gmil.com', '121111111', '', 'AV.NO SE DONDE', 'P', 'P', 'J', 'ICHIKA', '11232312', '', 'madre', '', '777788444', 'SEOUL', 'particular', '', 0),
(57, 66, 'Hombre', 'naofumi@gmail.com', '777744444', '', 'AV.TOKIO ', 'J', 'J', 'J', 'RAPTHTALIA', '84454541', '', 'otro', '', '544488888', 'TOKIO', 'particular', '', 0),
(58, 67, 'Mujer', 'raf@g.s', '888888888', '', 'AV.SD', 'J', 'J', 'J', 'RAFP', '88444565', 'faara@as.s', 'hermano', '', '555554151', 'IDK SA', 'publico', '', 0),
(59, 68, 'Hombre', 'biill@g.cs', '222222222', '', 'HELLO', 'E', 'E', 'E', 'ALEX', '78848448', '', 'padre', '', '122121212', 'COLES', 'publico', '', 0),
(60, 69, 'Hombre', 'yem@g.a', '111111111', '', 'AV IDK', 'P', 'P', 'P', 'CARLOS NICOLAS COPERNICO', '84548794', '', 'padre', '', '884544442', 'IN MDA', 'particular', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idRespuestas` int(11) NOT NULL,
  `pnts` int(11) NOT NULL,
  `datos` text NOT NULL,
  `idExam` int(11) NOT NULL,
  `valid` int(1) NOT NULL,
  `idEspIngreso` int(1) NOT NULL,
  `idAdmision` int(11) NOT NULL,
  `idInscripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idRespuestas`, `pnts`, `datos`, `idExam`, `valid`, `idEspIngreso`, `idAdmision`, `idInscripcion`) VALUES
(15, 900, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":2},{\"num\":3,\"sol\":3},{\"num\":4,\"sol\":2},{\"num\":5,\"sol\":3},{\"num\":6,\"sol\":3},{\"num\":7,\"sol\":2},{\"num\":8,\"sol\":3},{\"num\":9,\"sol\":2},{\"num\":10,\"sol\":1},{\"num\":11,\"sol\":2},{\"num\":12,\"sol\":3},{\"num\":13,\"sol\":5},{\"num\":14,\"sol\":4},{\"num\":15,\"sol\":3},{\"num\":16,\"sol\":2},{\"num\":17,\"sol\":1},{\"num\":18,\"sol\":1},{\"num\":19,\"sol\":2},{\"num\":20,\"sol\":5}]', 139, 1, 10, 173, 48),
(16, 1700, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":3},{\"num\":3,\"sol\":4},{\"num\":4,\"sol\":3},{\"num\":5,\"sol\":3},{\"num\":6,\"sol\":3},{\"num\":7,\"sol\":4},{\"num\":8,\"sol\":5},{\"num\":9,\"sol\":2},{\"num\":10,\"sol\":1},{\"num\":11,\"sol\":2},{\"num\":12,\"sol\":3},{\"num\":13,\"sol\":4},{\"num\":14,\"sol\":5},{\"num\":15,\"sol\":4},{\"num\":16,\"sol\":3},{\"num\":17,\"sol\":2},{\"num\":18,\"sol\":5},{\"num\":19,\"sol\":1},{\"num\":20,\"sol\":1}]', 139, 1, 5, 173, 46),
(17, 400, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":1},{\"num\":3,\"sol\":2},{\"num\":4,\"sol\":2},{\"num\":5,\"sol\":2},{\"num\":6,\"sol\":2},{\"num\":7,\"sol\":2},{\"num\":8,\"sol\":3},{\"num\":9,\"sol\":2},{\"num\":10,\"sol\":3},{\"num\":11,\"sol\":3},{\"num\":12,\"sol\":2},{\"num\":13,\"sol\":2},{\"num\":14,\"sol\":5},{\"num\":15,\"sol\":2},{\"num\":16,\"sol\":2},{\"num\":17,\"sol\":2},{\"num\":18,\"sol\":3},{\"num\":19,\"sol\":2},{\"num\":20,\"sol\":2}]', 139, 0, 0, 173, 49),
(18, 1000, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":1},{\"num\":3,\"sol\":2},{\"num\":4,\"sol\":2},{\"num\":5,\"sol\":2},{\"num\":6,\"sol\":3},{\"num\":7,\"sol\":2},{\"num\":8,\"sol\":3},{\"num\":9,\"sol\":2},{\"num\":10,\"sol\":1},{\"num\":11,\"sol\":2},{\"num\":12,\"sol\":3},{\"num\":13,\"sol\":4},{\"num\":14,\"sol\":5},{\"num\":15,\"sol\":5},{\"num\":16,\"sol\":3},{\"num\":17,\"sol\":1},{\"num\":18,\"sol\":5},{\"num\":19,\"sol\":5},{\"num\":20,\"sol\":2}]', 139, 2, 10, 173, 50),
(19, 800, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":2},{\"num\":3,\"sol\":2},{\"num\":4,\"sol\":3},{\"num\":5,\"sol\":2},{\"num\":6,\"sol\":2},{\"num\":7,\"sol\":2},{\"num\":8,\"sol\":1},{\"num\":9,\"sol\":1},{\"num\":10,\"sol\":1},{\"num\":11,\"sol\":2},{\"num\":12,\"sol\":3},{\"num\":13,\"sol\":4},{\"num\":14,\"sol\":5},{\"num\":15,\"sol\":2},{\"num\":16,\"sol\":2},{\"num\":17,\"sol\":1},{\"num\":18,\"sol\":1},{\"num\":19,\"sol\":1},{\"num\":20,\"sol\":1}]', 139, 6, 6, 173, 51),
(20, 1100, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":2},{\"num\":3,\"sol\":2},{\"num\":4,\"sol\":1},{\"num\":5,\"sol\":1},{\"num\":6,\"sol\":1},{\"num\":7,\"sol\":2},{\"num\":8,\"sol\":2},{\"num\":9,\"sol\":2},{\"num\":10,\"sol\":1},{\"num\":11,\"sol\":2},{\"num\":12,\"sol\":3},{\"num\":13,\"sol\":4},{\"num\":14,\"sol\":5},{\"num\":15,\"sol\":4},{\"num\":16,\"sol\":3},{\"num\":17,\"sol\":2},{\"num\":18,\"sol\":1},{\"num\":19,\"sol\":2},{\"num\":20,\"sol\":2}]', 139, 1, 6, 173, 47),
(21, 400, '[{\"num\":1,\"sol\":3},{\"num\":2,\"sol\":2},{\"num\":3,\"sol\":2},{\"num\":4,\"sol\":3},{\"num\":5,\"sol\":3},{\"num\":6,\"sol\":2},{\"num\":7,\"sol\":2},{\"num\":8,\"sol\":2},{\"num\":9,\"sol\":2},{\"num\":10,\"sol\":2},{\"num\":11,\"sol\":1},{\"num\":12,\"sol\":2},{\"num\":13,\"sol\":2},{\"num\":14,\"sol\":3},{\"num\":15,\"sol\":3},{\"num\":16,\"sol\":2},{\"num\":17,\"sol\":2},{\"num\":18,\"sol\":2},{\"num\":19,\"sol\":2},{\"num\":20,\"sol\":1}]', 139, 0, 0, 173, 52),
(22, 400, '[{\"num\":1,\"sol\":3},{\"num\":2,\"sol\":3},{\"num\":3,\"sol\":2},{\"num\":4,\"sol\":2},{\"num\":5,\"sol\":2},{\"num\":6,\"sol\":1},{\"num\":7,\"sol\":2},{\"num\":8,\"sol\":2},{\"num\":9,\"sol\":3},{\"num\":10,\"sol\":1},{\"num\":11,\"sol\":1},{\"num\":12,\"sol\":2},{\"num\":13,\"sol\":2},{\"num\":14,\"sol\":2},{\"num\":15,\"sol\":5},{\"num\":16,\"sol\":2},{\"num\":17,\"sol\":2},{\"num\":18,\"sol\":1},{\"num\":19,\"sol\":1},{\"num\":20,\"sol\":2}]', 139, 0, 0, 173, 53),
(23, 2000, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":3},{\"num\":3,\"sol\":4},{\"num\":4,\"sol\":3},{\"num\":5,\"sol\":3},{\"num\":6,\"sol\":3},{\"num\":7,\"sol\":4},{\"num\":8,\"sol\":5},{\"num\":9,\"sol\":2},{\"num\":10,\"sol\":1},{\"num\":11,\"sol\":2},{\"num\":12,\"sol\":3},{\"num\":13,\"sol\":4},{\"num\":14,\"sol\":5},{\"num\":15,\"sol\":4},{\"num\":16,\"sol\":3},{\"num\":17,\"sol\":2},{\"num\":18,\"sol\":1},{\"num\":19,\"sol\":5},{\"num\":20,\"sol\":5}]', 139, 1, 5, 173, 54),
(24, 1300, '[{\"num\":1,\"sol\":1},{\"num\":2,\"sol\":3},{\"num\":3,\"sol\":4},{\"num\":4,\"sol\":3},{\"num\":5,\"sol\":3},{\"num\":6,\"sol\":3},{\"num\":7,\"sol\":4},{\"num\":8,\"sol\":5},{\"num\":9,\"sol\":3},{\"num\":10,\"sol\":5},{\"num\":11,\"sol\":2},{\"num\":12,\"sol\":3},{\"num\":13,\"sol\":4},{\"num\":14,\"sol\":5},{\"num\":15,\"sol\":1},{\"num\":16,\"sol\":2},{\"num\":17,\"sol\":2},{\"num\":18,\"sol\":2},{\"num\":19,\"sol\":3},{\"num\":20,\"sol\":1}]', 139, 1, 6, 173, 55);

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
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idRespuestas`),
  ADD KEY `respInscrip` (`idInscripcion`);

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
  MODIFY `idCupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=797;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `eventoadmision`
--
ALTER TABLE `eventoadmision`
  MODIFY `idAdmision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `idPostulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `postulantedetalle`
--
ALTER TABLE `postulantedetalle`
  MODIFY `idPostulanteD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idRespuestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respInscrip` FOREIGN KEY (`idInscripcion`) REFERENCES `inscripciones` (`idInscripcion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
