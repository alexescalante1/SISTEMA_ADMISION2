-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2021 a las 07:13:26
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
(5, '73104785', '', 'Alex Escalante ONE', 'admin@gmail.com', 'vistas/img/perfiles/138.jpg', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, 1, '2021-07-15 03:15:21'),
(162, '73104795', '', 'Alex Escalante TWO', 'alexescalante921@gmail.com', 'vistas/img/perfiles/844.png', '$2a$07$asxx54ahjppf45sd87a5aubFblDrx5VgsL7udWc9pTLp1r8BxczhK', 'administrador', 1, 0, '2021-07-12 04:54:55'),
(165, '73545894', '', 'Fredy Marin Rojas', 'laboral@gmail.com', 'vistas/img/perfiles/972.jpg', '$2a$07$asxx54ahjppf45sd87a5auR6AmIR5N5CndGl8MnjTyLo5SYcp56Qe', 'laboratorista', 1, 1, '2021-07-11 18:18:54'),
(166, '15489562', '', 'Ana Maria', 'ana@gmail.com', 'vistas/img/perfiles/600.jpg', '$2a$07$asxx54ahjppf45sd87a5auzGfz9GaOjSPJ5jEDpHii9vSQEEqY1Zm', 'administrador', 1, 1, '2021-07-15 02:32:14'),
(167, '111111111111', '', 'maryluz', 'mary@gmail.com', 'vistas/img/perfiles/682.jpg', '$2a$07$asxx54ahjppf45sd87a5auMcTRI4HvWlwXRGDf6MnH7be2S/RDDFa', 'administrador', 1, 0, '2021-07-15 03:13:41');

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
(40, 15, 60, 0, 0, 2500, 5, 42),
(41, 30, 80, 0, 0, 1900, 6, 42),
(42, 20, 80, 0, 0, 1400, 11, 42),
(43, 10, 80, 0, 0, 1700, 10, 42),
(44, 30, 60, 0, 0, 1500, 5, 43),
(45, 20, 60, 0, 0, 1300, 6, 43),
(46, 10, 60, 0, 0, 1400, 11, 43),
(47, 10, 70, 0, 0, 1200, 10, 43),
(719, 0, 0, 0, 0, 0, 5, 157),
(720, 0, 0, 0, 0, 0, 6, 157),
(721, 0, 0, 0, 0, 0, 11, 157),
(722, 0, 0, 0, 0, 0, 10, 157);

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
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventoadmision`
--

INSERT INTO `eventoadmision` (`idAdmision`, `ruta`, `titulo`, `fecha`, `estado`) VALUES
(42, 'examen-enero-2021', 'EXAMEN ENERO 2021', '2021-07-04 04:15:31', 0),
(43, 'examen-junio-2022', 'EXAMEN JUNIO 2022', '2021-07-04 04:15:45', 1),
(155, 'hello-da', 'HELLO DA', '2021-07-11 17:44:43', 1),
(156, 'examen-enero-2022', 'EXAMEN ENERO 2022', '2021-07-12 20:24:37', 0),
(157, 'examen-2023', 'EXAMEN 2023', '2021-07-12 20:32:02', 0);

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
(82, '', 'TIPO A', 2, 43),
(87, '', 'TIPO A', 60, 42),
(88, '', 'TIPO B', 2, 43),
(111, '', 'TIPO A', 60, 155),
(112, '', 'TIPO C', 60, 43),
(113, '', 'TIPO A', 60, 156);

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
  `barraSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `textoSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `colorFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `colorTexto` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  `redesSociales` text COLLATE utf8_spanish_ci NOT NULL,
  `apiFacebook` text COLLATE utf8_spanish_ci NOT NULL,
  `pixelFacebook` text COLLATE utf8_spanish_ci NOT NULL,
  `googleAnalytics` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `barraSuperior`, `textoSuperior`, `colorFondo`, `colorTexto`, `logo`, `icono`, `redesSociales`, `apiFacebook`, `pixelFacebook`, `googleAnalytics`, `fecha`) VALUES
(1, '#000000', '#ffffff', 'rgb(0, 160, 253)', '#ffffff', 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/icono.png', '[{\"red\":\"fa-facebook\",\"estilo\":\"facebookBlanco\",\"url\":\"http://facebook.com/\",\"activo\":1},{\"red\":\"fa-youtube\",\"estilo\":\"youtubeBlanco\",\"url\":\"http://youtube.com/\",\"activo\":1},{\"red\":\"fa-twitter\",\"estilo\":\"twitterBlanco\",\"url\":\"http://twitter.com/\",\"activo\":1},{\"red\":\"fa-google-plus\",\"estilo\":\"google-plusBlanco\",\"url\":\"http://google.com/\",\"activo\":1},{\"red\":\"fa-instagram\",\"estilo\":\"instagramBlanco\",\"url\":\"http://instagram.com/\",\"activo\":1}]', '\r\n      		<script>   window.fbAsyncInit = function() {     FB.init({       appId      : \'131737410786111\',       cookie     : true,       xfbml      : true,       version    : \'v2.10\'     });            FB.AppEvents.logPageView();             };    (function(d, s, id){      var js, fjs = d.getElementsByTagName(s)[0];      if (d.getElementById(id)) {return;}      js = d.createElement(s); js.id = id;      js.src = \"https://connect.facebook.net/en_US/sdk.js\";      fjs.parentNode.insertBefore(js, fjs);    }(document, \'script\', \'facebook-jssdk\'));  </script>\r\n      		', '\r\n  			<!-- Facebook Pixel Code --> 	<script> 	  !function(f,b,e,v,n,t,s) 	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod? 	  n.callMethod.apply(n,arguments):n.queue.push(arguments)}; 	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\'; 	  n.queue=[];t=b.createElement(e);t.async=!0; 	  t.src=v;s=b.getElementsByTagName(e)[0]; 	  s.parentNode.insertBefore(t,s)}(window, document,\'script\', 	  \'https://connect.facebook.net/en_US/fbevents.js\'); 	  fbq(\'init\', \'131737410786111\'); 	  fbq(\'track\', \'PageView\'); 	</script> 	<noscript><img height=\"1\" width=\"1\" style=\"display:none\" 	  src=\"https://www.facebook.com/tr?id=149877372404434&ev=PageView&noscript=1\" 	/></noscript> <!-- End Facebook Pixel Code -->    \r\n  			', '  \r\n  				<!-- Global site tag (gtag.js) - Google Analytics --> 	<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-999999-1\"></script> 	<script> 	  window.dataLayer = window.dataLayer || []; 	  function gtag(){dataLayer.push(arguments);} 	  gtag(\'js\', new Date());  	  gtag(\'config\', \'UA-9999999-1\'); 	</script>      \r\n            \r\n            \r\n            \r\n      ', '2021-02-22 02:16:53');

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
(97, 1, 'HOLA', '1a', '12', '33', '4r', '78y', 88),
(98, 2, 'MUNDO', 'a1', '12', '3s', '56', 'd4', 88),
(105, 1, 'Abel, Boris, Carlos y Daniel tienen cada uno una sola ocupación: uno de ellos es pintor, otro es cantante, otro es vendedor y otro es zapatero. Se sabe lo siguiente: – Abel y el pintor están enojados con Daniel. \n– Boris es amigo del cantante.\n– El zapatero es amigo de Daniel. \n– El vendedor es muy amigo de Carlos y del cantante. \n– Abel es zapatero desde muy joven. ¿Quién es el vendedor y cuál es la ocupación de Daniel?', 'Boris ‒ cantante', 'Boris ‒ vendedor', 'Carlos ‒ pintor', 'Daniel ‒ vendedor ', 'Carlos ‒ albañila', 82),
(106, 2, 'Sobre las edades de Tomás, Juana y Joaquín se sabe lo siguiente: – Si Tomás no tiene la misma edad que Juana, entonces Tomás no tiene 18 años. – Si Juana no es menor de edad, entonces Joaquín tiene la misma edad que Juana. Si, además, se sabe que Tomás tiene 18 años, entonces es verdad que?...', 'Alex el mejor xd', 'Joaquín no tiene la misma edad que Tomás.', 'Tomás no tiene la misma edad que Juana.', 'Juana es menor de edad.', 'Joaquín tiene 18 años.', 82);

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
(323, 1, 2, 88),
(324, 2, 4, 88),
(331, 1, 5, 82),
(332, 2, 1, 82);

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
  MODIFY `idCupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=723;

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
  MODIFY `idAdmision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

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
  MODIFY `idProblemas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `solucion`
--
ALTER TABLE `solucion`
  MODIFY `idSolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

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
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notf-art` FOREIGN KEY (`idDetalleArticulo`) REFERENCES `detallearticulo` (`idDetalleArticulo`) ON DELETE SET NULL ON UPDATE CASCADE;

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
