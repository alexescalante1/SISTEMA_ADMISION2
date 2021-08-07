-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2021 a las 20:40:30
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
(5, '73104785', '', 'Alex Escalante ONE', 'admin@gmail.com', 'vistas/img/perfiles/138.jpg', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, 0, '2021-07-30 16:46:50'),
(162, '73104795', '', 'Alex Escalante TWO', 'alexescalante921@gmail.com', 'vistas/img/perfiles/844.png', '$2a$07$asxx54ahjppf45sd87a5aubFblDrx5VgsL7udWc9pTLp1r8BxczhK', 'administrador', 1, 0, '2021-07-28 05:10:03'),
(165, '73545894', '', 'Fredy Marin Rojas', 'laboral@gmail.com', 'vistas/img/perfiles/972.jpg', '$2a$07$asxx54ahjppf45sd87a5auR6AmIR5N5CndGl8MnjTyLo5SYcp56Qe', 'laboratorista', 1, 1, '2021-07-11 18:18:54'),
(166, '15489562', '', 'Ana Maria', 'ana@gmail.com', 'vistas/img/perfiles/600.jpg', '$2a$07$asxx54ahjppf45sd87a5auzGfz9GaOjSPJ5jEDpHii9vSQEEqY1Zm', 'administrador', 0, 1, '2021-07-16 04:37:29'),
(167, '111111111111', '', 'maryluz', 'mary@gmail.com', 'vistas/img/perfiles/682.jpg', '$2a$07$asxx54ahjppf45sd87a5auMcTRI4HvWlwXRGDf6MnH7be2S/RDDFa', 'administrador', 0, 0, '2021-07-16 04:37:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idArticulo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `estadoPendiente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idDetalleArticulo` int(11) NOT NULL,
  `codigoPatrimonial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `estado`, `estadoPendiente`, `fecha`, `idDetalleArticulo`, `codigoPatrimonial`) VALUES
(120, 0, 0, '2021-02-15 14:02:14', 222, '213123213'),
(121, 0, 0, '2021-02-15 14:02:29', 222, '567567755');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `ruta`, `titulo`) VALUES
(42, 'laboratorio-de-instrumentacion-y-control', 'Laboratorio de instrumentación y control'),
(43, 'laboratorio-de-telematica', 'Laboratorio de telematica'),
(44, 'laboratorio-general', 'Laboratorio General'),
(45, 'laboratorio-de-control-de-plantas', 'Laboratorio de control de plantas'),
(46, 'laboratorio-de-maquinas-rotatorias', 'Laboratorio de maquinas rotatorias'),
(47, 'laboratorio-de-electronica-general', 'Laboratorio de electrónica general'),
(48, 'lab-del-mundo', 'lab del mundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `calificacion` float NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_usuario`, `id_producto`, `calificacion`, `comentario`, `fecha`) VALUES
(1, 86, 496, 3.5, 'Lo mejor de PHP', '2018-02-13 16:39:25'),
(2, 86, 464, 4.5, 'Excelente', '2018-02-13 15:55:14');

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
(723, 0, 0, 0, 0, 0, 5, 158),
(724, 0, 0, 0, 0, 0, 6, 158),
(725, 0, 0, 0, 0, 0, 11, 158),
(726, 0, 0, 0, 0, 1540, 10, 158),
(727, 123, 741, 0, 0, 144, 5, 159),
(728, 1, 32, 0, 0, 1800, 6, 159),
(729, 2, 33, 0, 0, 1200, 11, 159),
(730, 3, 123, 0, 0, 1900, 10, 159),
(731, 0, 0, 0, 0, 0, 5, 160),
(732, 0, 0, 0, 0, 0, 6, 160),
(733, 0, 0, 0, 0, 0, 11, 160),
(734, 0, 0, 0, 0, 1700, 10, 160),
(735, 0, 0, 0, 0, 0, 5, 161),
(736, 0, 0, 0, 0, 0, 6, 161),
(737, 0, 0, 0, 0, 0, 11, 161),
(738, 0, 0, 0, 0, 0, 10, 161),
(739, 1, 7, 0, 0, 56, 5, 162),
(740, 1, 6, 0, 0, 5, 6, 162),
(741, 2, 5, 0, 0, 34, 11, 162),
(742, 3, 4, 0, 0, 5644, 10, 162);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallearticulo`
--

CREATE TABLE `detallearticulo` (
  `idDetalleArticulo` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `portada` text NOT NULL,
  `multimedia` text NOT NULL,
  `prestados` int(11) NOT NULL,
  `peso` float NOT NULL,
  `precio` float NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `palabrasClave` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallearticulo`
--

INSERT INTO `detallearticulo` (`idDetalleArticulo`, `ruta`, `titulo`, `descripcion`, `disponible`, `portada`, `multimedia`, `prestados`, `peso`, `precio`, `idCategoria`, `palabrasClave`, `fecha`) VALUES
(221, 'arduino-uno', 'Arduino Uno', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/arduino-uno.jpg', '[{\"foto\":\"vistas/img/multimedia/arduino-uno/arduino2.jpg\"},{\"foto\":\"vistas/img/multimedia/arduino-uno/arduino1.jpg\"}]', 11, 0.1, 40, 47, 'Placa,circuito,robotica', '2021-02-15 13:46:27'),
(222, 'arduino-nano', 'Arduino Nano', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/arduino-nano.jpg', '[{\"foto\":\"vistas/img/multimedia/arduino-nano/arduino1.jpg\"},{\"foto\":\"vistas/img/multimedia/arduino-nano/arduino2.jpg\"}]', 1122, 0.1, 25, 47, 'Robotica ', '2021-02-15 13:47:58'),
(223, 'data-dysplay-hq10321', 'Data Dysplay Hq10321', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/data-dysplay-hq10321.png', '[{\"foto\":\"vistas/img/multimedia/data-dysplay-hq10321/data2.png\"},{\"foto\":\"vistas/img/multimedia/data-dysplay-hq10321/data1.png\"}]', 33, 1, 1400, 44, 'proyector', '2021-02-15 13:50:40'),
(224, 'data-display-mq-40232', 'Data Display MQ 40232', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/data-display-mq-40232.png', '[{\"foto\":\"vistas/img/multimedia/data-display-mq-40232/data1.png\"},{\"foto\":\"vistas/img/multimedia/data-display-mq-40232/data2.png\"}]', 233, 1, 1700, 44, 'Proyector', '2021-02-15 13:51:24'),
(225, 'cable-hdmi', 'Cable HDMI', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/cable-hdmi.png', '[{\"foto\":\"vistas/img/multimedia/cable-hdmi/hdmi2.png\"},{\"foto\":\"vistas/img/multimedia/cable-hdmi/hdmi1.png\"}]', 556, 0.1, 10, 44, 'concetor', '2021-02-15 13:52:55'),
(226, 'cable-vga', 'Cable VGA', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/cable-vga.png', '[{\"foto\":\"vistas/img/multimedia/cable-vga/hdmi2.png\"},{\"foto\":\"vistas/img/multimedia/cable-vga/hdmi1.png\"}]', 45, 0.1, 40, 43, 'conector de 2mm', '2021-02-15 13:53:38'),
(227, 'laptop-asus', 'Laptop Asus', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/laptop-asus.png', '[{\"foto\":\"vistas/img/multimedia/laptop-asus/laptop2.png\"},{\"foto\":\"vistas/img/multimedia/laptop-asus/laptop1.png\"}]', 77, 2, 40, 44, 'pc ordenado laptop', '2021-02-15 13:55:14'),
(228, 'laptop-hp', 'Laptop HP', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/laptop-hp.png', '[{\"foto\":\"vistas/img/multimedia/laptop-hp/laptop1.png\"},{\"foto\":\"vistas/img/multimedia/laptop-hp/laptop2.png\"}]', 1, 2, 2400, 44, 'pc computador computadora', '2021-02-15 13:56:02'),
(229, 'monitor-asus-md9321', 'Monitor Asus MD9321', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/monitor-asus-md9321.png', '[{\"foto\":\"vistas/img/multimedia/monitor-asus-md9321/pantalla2.png\"},{\"foto\":\"vistas/img/multimedia/monitor-asus-md9321/pantalla1.png\"}]', 21, 1, 2000, 42, 'pantalla', '2021-02-15 13:57:29'),
(230, 'mesa', 'Mesa', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/mesa.png', '[{\"foto\":\"vistas/img/multimedia/mesa/mesa2.png\"},{\"foto\":\"vistas/img/multimedia/mesa/mesa1.png\"}]', 55, 1, 80, 44, 'mesa pw', '2021-02-15 13:58:51'),
(231, 'set-gaming', 'Set Gaming', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/set-gaming.jpg', '[{\"foto\":\"vistas/img/multimedia/set-gaming/38978.jpg\"},{\"foto\":\"vistas/img/multimedia/set-gaming/38976.jpg\"},{\"foto\":\"vistas/img/multimedia/set-gaming/38979.jpg\"},{\"foto\":\"vistas/img/multimedia/set-gaming/38977.jpg\"},{\"foto\":\"vistas/img/multimedia/set-gaming/images.jpg\"},{\"foto\":\"vistas/img/multimedia/set-gaming/ef416153a7c3d69e3f09cfbcbc2e2359.jpg\"},{\"foto\":\"vistas/img/multimedia/set-gaming/El-negocio-de-hardware-para-PC-Gamer-aumentará-en-3.600-millones-de-dólares-en-2020-debido-a-la-pandemia-de-COVID-19-2-1000x576.jpg\"},{\"foto\":\"vistas/img/multimedia/set-gaming/360c4822e04f1606b975b170e1af0891.jpg\"}]', 14, 5, 5000, 44, 'computador ', '2021-02-15 14:01:03'),
(232, 'cable-ethelnet', 'Cable Ethelnet', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/cable-ethelnet.png', '[{\"foto\":\"vistas/img/multimedia/cable-ethelnet/bobina-cable-de-red-utp.jpg\"},{\"foto\":\"vistas/img/multimedia/cable-ethelnet/CABLE-DE-RED-10-metros-uTP-CAT-5E-GRIS_1_grusatec.jpg\"}]', 0, 0.2, 50, 43, 'hr45', '2021-02-15 18:27:07'),
(233, 'cable-ethelnet-10-metros', 'Cable Ethelnet 10 Metros', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/cable-ethelnet-10-metros.jpg', '[{\"foto\":\"vistas/img/multimedia/cable-ethelnet-10-metros/CABLE-DE-RED-10-metros-uTP-CAT-5E-GRIS_1_grusatec.jpg\"},{\"foto\":\"vistas/img/multimedia/cable-ethelnet-10-metros/0_976ByZWKaR8uWIJv.png\"}]', 0, 0.1, 40, 43, 'cables', '2021-02-15 18:28:00'),
(234, 'cable-optico', 'Cable Optico', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/cable-optico.jpg', '[{\"foto\":\"vistas/img/multimedia/cable-optico/1_500.jpg\"},{\"foto\":\"vistas/img/multimedia/cable-optico/Mejor-cable-óptico-audio-digital-696x418.png\"}]', 0, 0.1, 20, 44, 'music', '2021-02-15 18:29:24'),
(235, 'teclado-mecanico-racer-ht2312', 'Teclado Mecanico Racer Ht2312', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/teclado-mecanico-racer-ht2312.jpg', '[{\"foto\":\"vistas/img/multimedia/teclado-mecanico-racer-ht2312/1805863105.jpg\"},{\"foto\":\"vistas/img/multimedia/teclado-mecanico-racer-ht2312/MotoSpeed-K82-RGB-Backlight-USB-Wired-Mechanical-Gaming-Keyboard-1.jpg\"}]', 0, 0.5, 100, 44, 'asdasd', '2021-02-15 18:30:52'),
(236, 'teclado-mecanico-racer-ht123-blanco', 'Teclado Mecanico Racer Ht123 Blanco', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/teclado-mecanico-racer-ht123-blanco.jpg', '[{\"foto\":\"vistas/img/multimedia/teclado-mecanico-racer-ht123-blanco/GtXGeilOT81Ztpr49Wb6zocboHtfJvmDeqsRyv662sN7sF0i-550x550w.jpg\"},{\"foto\":\"vistas/img/multimedia/teclado-mecanico-racer-ht123-blanco/c95cac2a-18fb-4c39-b512-0282c12d8680.90fcbf7a73c9be988c79a632eaa0b251.jpg\"},{\"foto\":\"vistas/img/multimedia/teclado-mecanico-racer-ht123-blanco/5e15fd58eb85d-teclado-gamer-huo-ji-z88-mecanico-rgb-81-teclas-blanco-1600x1600.jpg\"}]', 325, 0.2, 120, 44, 'keyboard', '2021-02-15 18:31:48'),
(237, 'arduino-motor', 'Arduino Motor', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/arduino-motor.jpg', '[{\"foto\":\"vistas/img/multimedia/arduino-motor/61ISj4-GkjL._AC_SX355_.jpg\"},{\"foto\":\"vistas/img/multimedia/arduino-motor/htb1nbjgnxxxxxa1xpxxq6xxfxxxb_1_.jpg\"},{\"foto\":\"vistas/img/multimedia/arduino-motor/bo-motor-straight.jpg\"}]', 0, 0.5, 40, 44, 'Motores', '2021-02-15 18:33:24'),
(238, 'servomotor-10kg', 'Servomotor 10Kg', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/servomotor-10kg.jpg', '[{\"foto\":\"vistas/img/multimedia/servomotor-10kg/419xiqaPsoL._AC_SY400_.jpg\"},{\"foto\":\"vistas/img/multimedia/servomotor-10kg/download.jpg\"},{\"foto\":\"vistas/img/multimedia/servomotor-10kg/static1.squarespace.jpg\"}]', 0, 0.5, 50, 47, 'arduino', '2021-02-15 18:34:54'),
(239, 'servomotor-5kg', 'Servomotor 5Kg', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/servomotor-5kg.jpg', '[{\"foto\":\"vistas/img/multimedia/servomotor-5kg/419xiqaPsoL._AC_SY400_.jpg\"},{\"foto\":\"vistas/img/multimedia/servomotor-5kg/static1.squarespace.jpg\"}]', 0, 0.5, 25, 47, 'motores', '2021-02-15 18:36:15'),
(240, 'router-tp-link', 'Router Tp Link', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/router-tp-link.jpg', '[{\"foto\":\"vistas/img/multimedia/router-tp-link/sa.jpg\"}]', 0, 0.2, 300, 43, 'wifi', '2021-02-15 18:38:17'),
(241, 'fuente-de-poder', 'Fuente de poder', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/fuente-de-poder.jpg', '[{\"foto\":\"vistas/img/multimedia/fuente-de-poder/powersupply-300x269.jpg\"},{\"foto\":\"vistas/img/multimedia/fuente-de-poder/61Wlr7QNNLL._AC_SX522_.jpg\"},{\"foto\":\"vistas/img/multimedia/fuente-de-poder/fuente-de-poder-cc.jpg\"}]', 0, 1, 500, 47, 'power', '2021-02-15 18:39:44'),
(242, 'protoboard', 'Protoboard', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/protoboard.jpg', '[{\"foto\":\"vistas/img/multimedia/protoboard/Placa_prototipos_400_puntos-e1503330757682.jpg\"},{\"foto\":\"vistas/img/multimedia/protoboard/comprar-placa-protoboard-mediana-400-contactos-precio-oferta.jpg\"}]', 0, 0.1, 15, 47, 'placa de conexion', '2021-02-15 18:40:41'),
(243, 'arduino-mega', 'Arduino Mega', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/arduino-mega.jpg', '[{\"foto\":\"vistas/img/multimedia/arduino-mega/arduino-mega-2560-r3-original-878-35-B.jpg\"},{\"foto\":\"vistas/img/multimedia/arduino-mega/7116nn7XEKL._AC_SY355_.jpg\"},{\"foto\":\"vistas/img/multimedia/arduino-mega/arduino-mega-2560-r3.jpg\"}]', 168, 0.1, 100, 47, 'robotica', '2021-02-15 18:41:43'),
(244, 'taladro-d-walt', 'Taladro D walt', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/taladro-d-walt.jpg', '[{\"foto\":\"vistas/img/multimedia/taladro-d-walt/Partes-de-un-taladro.jpg\"},{\"foto\":\"vistas/img/multimedia/taladro-d-walt/taladro-electrico-360-w-600-w-ac-1700-g-gbm-10-re-professional-bosch-800x800.png\"}]', 0, 2, 150, 44, 'broca', '2021-02-15 18:42:56'),
(245, 'motor-de-fuerza', 'Motor de Fuerza', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/motor-de-fuerza.jpg', '[{\"foto\":\"vistas/img/multimedia/motor-de-fuerza/sasas.jpg\"},{\"foto\":\"vistas/img/multimedia/motor-de-fuerza/asa.jpg\"}]', 0, 2, 50, 46, 'asd', '2021-02-15 18:45:20'),
(246, 'adaptador', 'Adaptador', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/adaptador.jpg', '[{\"foto\":\"vistas/img/multimedia/adaptador/la-casa-tecno-tipo-enchufes-tipo-g.jpg\"},{\"foto\":\"vistas/img/multimedia/adaptador/adaptador-enchufe-uk.jpg\"},{\"foto\":\"vistas/img/multimedia/adaptador/adaptador-usa-europa.jpg\"}]', 0, 0.1, 10, 47, 'xd', '2021-02-15 18:46:37'),
(247, 'mouse-logitec', 'Mouse Logitec', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/mouse-logitec.png', '[{\"foto\":\"vistas/img/multimedia/mouse-logitec/r600-weight-3mbps-poster.jpg__1920x700_q100_crop-scale_optimize_subsampling-2.jpg\"},{\"foto\":\"vistas/img/multimedia/mouse-logitec/DSCF7370.jpg\"}]', 0, 0.5, 150, 47, 'pc ordenador', '2021-02-15 18:48:40'),
(248, 'sensor-ultravioleta', 'Sensor Ultravioleta', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/sensor-ultravioleta.jpg', '[{\"foto\":\"vistas/img/multimedia/sensor-ultravioleta/ir-infrared-obstacle-avoidance-sensor-module-for-arduino-500x500.jpg\"},{\"foto\":\"vistas/img/multimedia/sensor-ultravioleta/kmyoi8.jpg\"}]', 0, 0.1, 20, 47, 'arduino', '2021-02-15 18:49:38'),
(249, 'cautin-fino', 'Cautin Fino', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/cautin-fino.jpg', '[{\"foto\":\"vistas/img/multimedia/cautin-fino/cautin-electrico-goot-ks-40r-40w-soldador-tipo-lapiz-220v.jpg\"},{\"foto\":\"vistas/img/multimedia/cautin-fino/producto_1238_a.jpg\"}]', 0, 0.5, 40, 47, 'soldar', '2021-02-15 18:50:59'),
(250, 'cautin-de-soldar-100w', 'Cautin de Soldar 100W', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/cautin-de-soldar-100w.jpg', '[{\"foto\":\"vistas/img/multimedia/cautin-de-soldar-100w/D_786869-MLA31632293871_072019-O.jpg\"},{\"foto\":\"vistas/img/multimedia/cautin-de-soldar-100w/s_4236-mla2904328689_072012-o.jpg\"}]', 0, 0.8, 80, 47, 'placas', '2021-02-15 18:52:04'),
(251, 'sensor-ultrasonido', 'Sensor Ultrasonido', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/sensor-ultrasonido.jpg', '[{\"foto\":\"vistas/img/multimedia/sensor-ultrasonido/ultrasonic-hc-sr-04-500x500.jpg\"},{\"foto\":\"vistas/img/multimedia/sensor-ultrasonido/Ultrasonic-sensor-bracket.jpg\"}]', 0, 0.2, 45, 47, 'arduino', '2021-02-15 18:52:59'),
(252, 'sensor-de-humedad', 'Sensor de Humedad', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/sensor-de-humedad.jpg', '[{\"foto\":\"vistas/img/multimedia/sensor-de-humedad/Sensor-de-humedad-de-suelo-Anticorrosivo-–-Higrómetro-1.jpg\"},{\"foto\":\"vistas/img/multimedia/sensor-de-humedad/higro.png\"}]', 0, 0.2, 40, 47, 'arduino', '2021-02-15 18:54:20'),
(253, 'control-de-data', 'Control de Data', 'Es un hecho establecido Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo. Estos textos.', 1, 'vistas/img/productos/control-de-data.jpg', '[{\"foto\":\"vistas/img/multimedia/control-de-data/control-remoto-para-samsung-smart-tv-dblue-f2.jpg\"},{\"foto\":\"vistas/img/multimedia/control-de-data/8467477_1.jpg\"},{\"foto\":\"vistas/img/multimedia/control-de-data/DBG450-copia.jpg\"}]', 0, 0.3, 20, 47, 'control de Tv', '2021-02-15 18:59:07');

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
(158, 'examen-octubre-2021', 'EXAMEN OCTUBRE 2021', '2021-07-15 23:51:26', '2021-07-01', '2021-07-31', 0),
(159, 'examen-noviembre-2021', 'EXAMEN NOVIEMBRE 2021', '2021-07-16 00:52:40', '2002-05-31', '1999-03-31', 1),
(160, 'examen-enero-2022', 'EXAMEN ENERO 2022', '2021-07-17 11:58:43', '2021-07-17', '2021-07-31', 0),
(161, 'examen-noviembre-2030', 'EXAMEN NOVIEMBRE 2030', '2021-07-20 01:37:16', '0000-00-00', '0000-00-00', 0),
(162, 'examen-enero-2023', 'EXAMEN ENERO 2023', '2021-07-29 19:35:43', '2021-07-01', '2021-07-31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `idExamen` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idAdmision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`idExamen`, `ruta`, `titulo`, `cantidad`, `idAdmision`) VALUES
(115, '', 'TIPO A', 2, 159),
(116, '', 'TIPO A', 60, 158),
(117, '', 'TIPO B', 60, 159),
(121, '', 'TIPO C', 60, 159),
(122, '', 'TIPO A', 2, 162),
(123, '', 'TIPO B', 60, 162);

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
(6, 'beca', 5, 6, 'vistas/img/vaucher/6.png', 1, '2021-07-29 06:45:49', 159, 20, 5),
(7, 'normal', 5, 10, 'vistas/img/vaucher/7.png', 1, '2021-07-29 17:09:46', 159, 21, 5),
(8, 'beca', 11, 5, 'vistas/img/vaucher/8.jpg', 1, '2021-07-29 17:01:48', 159, 22, 5),
(9, 'beca', 5, 11, 'vistas/img/vaucher/9.jpg', 1, '2021-07-29 17:33:24', 159, 23, 5),
(10, 'trasIn', 5, 6, 'vistas/img/vaucher/10.jpg', 1, '2021-07-29 17:33:24', 159, 24, 5),
(11, 'normal', 5, 6, 'vistas/img/vaucher/11.jpg', 1, '2021-07-30 16:12:04', 159, 25, 5),
(12, 'normal', 6, 5, 'vistas/img/vaucher/12.jpg', 1, '2021-07-29 19:41:48', 162, 26, 5),
(13, 'normal', 5, 11, 'vistas/img/vaucher/13.jpg', 1, '2021-07-30 17:43:05', 159, 27, 5),
(14, 'normal', 6, 5, 'vistas/img/vaucher/14.jpg', 1, '2021-07-30 17:46:27', 159, 28, 5),
(15, 'beca', 5, 6, 'vistas/img/vaucher/15.jpg', 1, '2021-07-30 18:37:59', 159, 29, 5);

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
(142, 0, '162894', 'usuarioone', '', 1, 3, 'please', '2021-02-16 00:05:08', 0, 222),
(143, 0, '162894', 'usuarioone', '', 1, 3, 'para el curso de internet de las cosas', '2021-02-16 00:07:00', 1, 222),
(149, 0, '162894', 'usuarioone', '', 1, 3, 'Xd', '2021-02-19 02:21:30', 0, 222),
(150, 0, '162894', 'usuarioone', '', 1, 3, 'Xd', '2021-02-20 05:10:59', 1, 222),
(151, 0, '162894', 'usuarioone', '', 1, 3, 'Oe ziii', '2021-02-21 05:08:44', 0, 222),
(152, 0, '162894', 'usuarioone', '', 1, 3, 'Oe ziii', '2021-02-21 05:08:44', 0, 222),
(153, 0, '162894', 'usuarioone', '', 3, 9, 'xde pw', '2021-02-22 00:59:54', 0, 222),
(154, 0, '162894', 'usuarioone', '', 1, 3, 'jajaja', '2021-02-22 01:00:10', 0, 222),
(155, 0, '162894', 'usuarioone', '', 3, 12, 'jeje', '2021-02-22 01:42:30', 1, 222),
(156, 0, '162894', 'usuarioone', '', 4, 9, 'please', '2021-02-22 02:08:31', 1, 222),
(157, 0, '162894', 'usuarioone', '', 1, 3, 'asdasd', '2021-02-22 05:16:20', 1, 222),
(158, 0, '162894', 'usuarioone', '', 1, 3, 'asdasdasd', '2021-02-22 05:16:18', 1, 222),
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
(20, '73104785', 'ALEX FREDY', 'ESCALANTE', 'MARON', '2021-07-20', 'vistas/img/postulantes/20.jpg'),
(21, '73104895', 'MARIA FLORES', 'GONZALES', 'APAZA', '1999-03-26', 'vistas/img/postulantes/21.jpg'),
(22, '84759632', 'JAVIER', 'ESCALANTE', 'MARON', '2004-02-11', 'vistas/img/postulantes/22.jpg'),
(23, '73104796', 'ANA', 'FLORES', 'FLORES', '2021-07-03', 'vistas/img/postulantes/23.jpg'),
(24, '97845612', 'EDUARDO', 'LUJAN', 'BENITES', '2021-06-30', 'vistas/img/postulantes/24.jpg'),
(25, '48484515', 'AXEL', 'MARCO', 'LIJAN', '2021-07-20', 'vistas/img/postulantes/25.png'),
(26, '84795621', 'ROCIO', 'MARTINEZ', 'AZADA', '2015-05-06', 'vistas/img/postulantes/26.png'),
(27, '84995567', 'CARLA', 'TINTAYA', 'ESQUIEL', '2025-05-07', 'vistas/img/postulantes/27.jpg'),
(28, '88777744', 'NICOLAS', 'TESLA', 'ZUQUEMBER', '2021-07-21', 'vistas/img/postulantes/28.jpg'),
(29, '99999965', 'ENRIQUE', 'ESCALANTE', 'CHOQUE', '2021-12-31', 'vistas/img/postulantes/29.jpg');

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
(11, 20, 'Hombre', 'alex@gmail.com', '978308584', '', 'AV. ORGULLO AYMARA Nº542 JAYLLIHUAYA', 'PUNO', 'PUNO', 'PUNO', 'LOURDES MARON MAMANI', '78451269', 'lourdes@gmail.com', 'madre', 'AV. ORGULLO AYMARA Nº542 JAYLLIHUAYA', '784515966', 'GRAN UNIDAD ESCOLAR SAN CARLOS PUNO', 'publico', 'ELECTRONICA', 15),
(12, 21, 'Mujer', 'maria@gmail.com', '847596215', '', 'AV. LOS MANZANOS Nº632', 'PUNO', 'PUNO', 'JULIACA', 'JOSE CARLOS MANZANO LOPEZ', '78945615', 'jose@gmail.com', 'padre', 'AV. LAS MANZANAS', '784595621', 'SONTA ROSA', 'publico', '', 18),
(13, 22, 'Hombre', 'javier@gmail.com', '784845454', '', 'AV. ORGULLO AYMARA Nº452 JAYLLIHUAYA', 'PUNO', 'PUNO', 'PUNO', 'ENRIQUE', '48516945', '', 'padre', '', '487515488', 'GLORIOSO SAN CARLOS', 'publico', '', 14),
(14, 23, 'Mujer', 'ana@gmail.com', '784595555', '', 'AV.ORGULLO NUEVA ESPERANZA Nº675', 'PUNO', 'PUNO', 'PUNO', 'JOSE JOSE ANCANTARA', '84754122', '', 'padreP', '', '874544444', 'MIGUEL GRAU', 'particular', '', 18),
(15, 24, 'Hombre', 'iets@gmail.com', '121231231', '', 'AV. EXAMPLE Nº231', 'PUNO', 'PUNO', 'PUNO', 'MARI', '78954545', '', 'hermano', '', '487855956', 'MARIA AUXILIADORA', 'publico', '', 19),
(16, 25, 'Hombre', 'google@gmail.com', '874545454', '', 'AV. TRINIDAD Nº321', 'PUNO', 'PUNO', 'JULIACA', 'NICOLAS BERRAUNDE TITO', '78454545', '', 'padre', '', '488745455', 'DIVINO MAESTRO LA PRE', 'particular', '', 14),
(17, 26, 'Mujer', 'rocio@gmail.com', '231231231', '234332423', 'AV. LOS ANDES Nº432', 'PUNO', 'PUNO', 'JULIACA', 'MARIA ROSA GUADALUPE', '78454896', '', 'madre', '', '875445454', 'SANTA ROSA DE LIMA', 'publico', '', 14),
(18, 27, 'Mujer', 'CARLA@GMAIL.COM', '784584884', '878458484', 'AV. HOMEPAGE Nº453', 'PUNO', 'PUNO', 'PUNO', 'JHON POL VELEZ', '15478454', 'jhon@gmail.com', 'padre', 'AV. ORGULLO Nº122', '847885555', 'Nº 45', 'publico', 'NINGUNA', 11),
(19, 28, 'Hombre', 'nicolas@gmil.com', '878787878', '', 'AV.LOS FLORALES', 'PUNO', 'PUNO', 'PUNO', 'JUAN FLORES RIQUELME', '88887777', '', 'padre', '', '124587564', 'ADVENTISTA', 'publico', '', 15),
(20, 29, 'Hombre', 'enrique@gmail.com', '784545454', '', 'AV. ORGULLO AYMARA Nº452', 'PUNO', 'PNUO', 'PUNO', 'FROILAN MARON MAMANI', '88454125', 'froilan@gmail.com', 'tio', 'AV. LIMA Nº123', '789545454', 'GRAN UNIDAD ESCOLAR SAN CARLOS', 'publico', 'CARPINTERIA', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `numDocTitular` text NOT NULL,
  `nombreTitular` text NOT NULL,
  `plazoDias` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `nombrePrestamista` text NOT NULL,
  `idDetalleArticulo` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `estado`, `numDocTitular`, `nombreTitular`, `plazoDias`, `idAdmin`, `nombrePrestamista`, `idDetalleArticulo`, `fecha`) VALUES
(215, 0, '162894', 'usuarioone', 9, 0, 'Alex Escalante ONE', 222, '2021-02-18 16:49:33'),
(216, 0, '162894', 'usuarioone', 12, 0, 'Alex Escalante ONE', 222, '2021-02-16 00:12:43'),
(217, 0, '162894', 'usuarioone', 9, 0, 'Alex Escalante ONE', 253, '2021-02-18 16:51:09'),
(218, 0, '162894', 'usuarioone', 15, 0, 'Alex Escalante ONE', 222, '2021-02-18 16:51:22'),
(219, 0, '162894', 'usuarioone', 15, 0, 'Alex Escalante ONE', 222, '2021-02-18 16:54:21'),
(220, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 253, '2021-02-18 17:01:21'),
(221, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 253, '2021-02-18 17:05:48'),
(222, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 253, '2021-02-18 17:10:39'),
(223, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 253, '2021-02-18 22:50:16'),
(224, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 222, '2021-02-18 22:51:11'),
(225, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 253, '2021-03-13 02:58:04'),
(226, 1, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 236, '2021-02-22 00:07:59'),
(227, 1, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 236, '2021-02-22 00:08:31'),
(228, 0, '162894', 'usuarioone', 15, 0, 'Alex Escalante ONE', 222, '2021-02-22 03:00:17'),
(229, 0, '73104786', 'Axel flores mamani', 9, 0, 'Alex Escalante ONE', 222, '2021-02-23 00:37:05'),
(230, 0, '162894', 'usuarioone', 9, 0, 'Alex Escalante ONE', 253, '2021-02-25 17:30:55'),
(231, 1, '73104786', 'Axel flores mamani', 3, 0, 'Alex Escalante ONE', 222, '2021-02-25 17:32:16'),
(232, 0, '73104786', 'Axel flores mamani', 3, 0, 'Alex Escalante ONE', 222, '2021-03-08 13:26:34'),
(233, 0, '73104786', 'Axel flores mamani', 6, 0, 'Alex Escalante ONE', 222, '2021-03-02 13:19:14'),
(234, 0, '73104786', 'Axel flores mamani', 9, 0, 'Alex Escalante ONE', 222, '2021-03-08 13:26:31'),
(235, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 253, '2021-03-06 01:32:13'),
(236, 0, '73104786', 'Axel flores mamani', 9, 0, 'Alex Escalante ONE', 253, '2021-03-11 03:36:33'),
(237, 0, '162894', 'usuarioone', 12, 0, 'Alex Escalante ONE', 222, '2021-03-08 13:30:18'),
(238, 0, '162894', 'usuarioone', 3, 0, 'Alex Escalante ONE', 253, '2021-03-13 02:58:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamosarticulos`
--

CREATE TABLE `prestamosarticulos` (
  `idPrestamosArt` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `codigoPatrimonial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamosarticulos`
--

INSERT INTO `prestamosarticulos` (`idPrestamosArt`, `idPrestamo`, `idArticulo`, `codigoPatrimonial`) VALUES
(228, 215, 121, '567567755'),
(229, 215, 120, '213123213'),
(230, 216, 122, '324234234'),
(233, 217, 137, '546456456'),
(234, 218, 129, '787878879'),
(235, 218, 131, '888900908'),
(236, 218, 130, '789897899'),
(237, 218, 132, '323423444'),
(238, 219, 129, '787878879'),
(239, 219, 130, '789897899'),
(241, 220, 133, '123412433'),
(242, 220, 134, '322344444'),
(243, 221, 134, '322344444'),
(244, 222, 135, '344334343'),
(246, 223, 136, '897897877'),
(247, 224, 129, '787878879'),
(248, 225, 136, '897897877'),
(249, 226, 140, '123412343'),
(250, 227, 141, '657756777'),
(251, 228, 130, '789897899'),
(252, 228, 131, '888900908'),
(253, 229, 129, '787878879'),
(256, 230, 135, '344334343'),
(257, 231, 130, '789897899'),
(258, 231, 132, '323423444'),
(259, 232, 129, '787878879'),
(261, 233, 142, '123123546'),
(262, 233, 131, '888900908'),
(263, 234, 131, '888900908'),
(266, 235, 134, '322344444'),
(267, 236, 135, '344334343'),
(270, 237, 131, '888900908'),
(271, 238, 135, '344334343');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problemas`
--

CREATE TABLE `problemas` (
  `idProblemas` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `Ra` text NOT NULL,
  `Rb` text NOT NULL,
  `Rc` text NOT NULL,
  `Rd` text NOT NULL,
  `Re` text NOT NULL,
  `idExamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `problemas`
--

INSERT INTO `problemas` (`idProblemas`, `num`, `descripcion`, `Ra`, `Rb`, `Rc`, `Rd`, `Re`, `idExamen`) VALUES
(115, 1, 'alexEsc', 'fredy', 'aaa', 'aaa', 'aaa', 'aaa', 115),
(116, 2, 'escalante maron', 'maron', 'jjkhuu', 'uuu', 'hjhh', 'h', 115),
(117, 1, 'ESCALANTE', 'ADS', 'ASD', 'DAS', 'ASD', 'ASD', 122),
(118, 2, 'MARON', 'GHJGH', 'GHF', 'DF', 'FGDFG', 'GH', 122);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solucion`
--

CREATE TABLE `solucion` (
  `idSolucion` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `sol` int(11) NOT NULL,
  `idExamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solucion`
--

INSERT INTO `solucion` (`idSolucion`, `num`, `sol`, `idExamen`) VALUES
(341, 2, 4, 115),
(342, 1, 5, 115),
(343, 1, 2, 122),
(344, 2, 3, 122);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `user` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `modo` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `verificacion` int(11) NOT NULL,
  `emailEncriptado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `dni`, `nombre`, `user`, `password`, `email`, `modo`, `foto`, `verificacion`, `emailEncriptado`, `fecha`) VALUES
(53, '162894', '', 'usuarioone', 'estudiante', '$2a$07$asxx54ahjppf45sd87a5aueuBkuSURBtX031YZ8zZTYNNVwIDNOwS', 'estudiante@gmail.com', 'directo', 'vistas/img/usuarios/53/585.png', 0, 'f652b531bff7a32fc1b3b4b59f200070', '2021-02-15 15:47:01'),
(54, '12345786', '', 'docenteone', 'docente', '$2a$07$asxx54ahjppf45sd87a5au5.80yzYkzzYfm4v0hxFjblcuW51TwIK', 'docente@gmail.com', 'directo', 'vistas/img/usuarios/54/956.jpg', 0, '33ff7d62b29b24e8bca8af8531159ea9', '2021-02-15 15:46:30'),
(86, '73104786', '', 'Axel flores mamani', 'axel', '$2a$07$asxx54ahjppf45sd87a5auK5NYo0IVC7CCoZgximaPAKw8SyTE9qe', 'axel@gmail.com', 'directo', 'vistas/img/usuarios/86/903.jpg', 0, '3218da89280d03db1d26f8622068665b', '2021-02-23 00:13:35'),
(87, '12312312', '', 'Martin lopez aliaga', 'martin', '$2a$07$asxx54ahjppf45sd87a5auNRvLS0n1cDa8U2FlopsFBInpxxpEiiG', 'martin@gmail.com', 'directo', 'vistas/img/usuarios/87/723.jpg', 0, 'eb20df43d0bdb3ba79f3143e3267e90a', '2021-02-23 03:09:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `idDetalleArticulo` (`idDetalleArticulo`) USING BTREE;

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD PRIMARY KEY (`idCupos`),
  ADD KEY `especialidad-cupos` (`idEspecialidad`),
  ADD KEY `admision-cupos` (`idAdmision`);

--
-- Indices de la tabla `detallearticulo`
--
ALTER TABLE `detallearticulo`
  ADD PRIMARY KEY (`idDetalleArticulo`),
  ADD KEY `detalle-categoria` (`idCategoria`);

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
  ADD PRIMARY KEY (`idNotificacion`),
  ADD KEY `notf-art` (`idDetalleArticulo`);

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
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamo`);

--
-- Indices de la tabla `prestamosarticulos`
--
ALTER TABLE `prestamosarticulos`
  ADD PRIMARY KEY (`idPrestamosArt`),
  ADD KEY `prestamosart` (`idPrestamo`);

--
-- Indices de la tabla `problemas`
--
ALTER TABLE `problemas`
  ADD PRIMARY KEY (`idProblemas`),
  ADD KEY `examen-problemas` (`idExamen`);

--
-- Indices de la tabla `solucion`
--
ALTER TABLE `solucion`
  ADD PRIMARY KEY (`idSolucion`),
  ADD KEY `solucion-examen` (`idExamen`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cupos`
--
ALTER TABLE `cupos`
  MODIFY `idCupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=743;

--
-- AUTO_INCREMENT de la tabla `detallearticulo`
--
ALTER TABLE `detallearticulo`
  MODIFY `idDetalleArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `eventoadmision`
--
ALTER TABLE `eventoadmision`
  MODIFY `idAdmision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `idPostulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `postulantedetalle`
--
ALTER TABLE `postulantedetalle`
  MODIFY `idPostulanteD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT de la tabla `prestamosarticulos`
--
ALTER TABLE `prestamosarticulos`
  MODIFY `idPrestamosArt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT de la tabla `problemas`
--
ALTER TABLE `problemas`
  MODIFY `idProblemas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `solucion`
--
ALTER TABLE `solucion`
  MODIFY `idSolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos-detalle` FOREIGN KEY (`idDetalleArticulo`) REFERENCES `detallearticulo` (`idDetalleArticulo`);

--
-- Filtros para la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD CONSTRAINT `admision-cupos` FOREIGN KEY (`idAdmision`) REFERENCES `eventoadmision` (`idAdmision`),
  ADD CONSTRAINT `especialidad-cupos` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`idEspecialidad`);

--
-- Filtros para la tabla `detallearticulo`
--
ALTER TABLE `detallearticulo`
  ADD CONSTRAINT `detalle-categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen-admision` FOREIGN KEY (`idAdmision`) REFERENCES `eventoadmision` (`idAdmision`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripAdmin` FOREIGN KEY (`idAdmin`) REFERENCES `administradores` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inscripAdmision` FOREIGN KEY (`idAdmision`) REFERENCES `eventoadmision` (`idAdmision`),
  ADD CONSTRAINT `inscripPostulant` FOREIGN KEY (`idPostulante`) REFERENCES `postulante` (`idPostulante`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notf-art` FOREIGN KEY (`idDetalleArticulo`) REFERENCES `detallearticulo` (`idDetalleArticulo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `postulantedetalle`
--
ALTER TABLE `postulantedetalle`
  ADD CONSTRAINT `postulanteRDetalle` FOREIGN KEY (`idPostulante`) REFERENCES `postulante` (`idPostulante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamosarticulos`
--
ALTER TABLE `prestamosarticulos`
  ADD CONSTRAINT `prestamosart` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamos` (`idPrestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `problemas`
--
ALTER TABLE `problemas`
  ADD CONSTRAINT `examen-problemas` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solucion`
--
ALTER TABLE `solucion`
  ADD CONSTRAINT `solucion-examen` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
