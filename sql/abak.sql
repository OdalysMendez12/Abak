-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2023 a las 20:38:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE abak;
USE abak;

CREATE TABLE `asignaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_clave_usuario` varchar(10) DEFAULT NULL,
  `fk_clave_equipo` varchar(20) DEFAULT NULL,
  `fecha_asignacion` datetime DEFAULT current_timestamp(),
  `fecha_devuelta` datetime DEFAULT NULL,
  `fk_sucursal` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id`, `fk_clave_usuario`, `fk_clave_equipo`, `fecha_asignacion`, `fecha_devuelta`, `fk_sucursal`) VALUES
(1, '1995A72B', 'ACP', '2023-07-17 20:26:30', '2023-07-18 16:19:41', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_equipo`
--

CREATE TABLE `catalogo_equipo` (
  `clave_equipo` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalogo_equipo`
--

INSERT INTO `catalogo_equipo` (`clave_equipo`, `nombre`) VALUES
('ACP', 'ACCES POINT'),
('BAL', 'BALANCEADOR'),
('BAS', 'BASE PARA CPU'),
('BOC', 'BOCINAS'),
('CAM', 'CAMARA'),
('CEL', 'CELULAR'),
('DDE', 'DISCO DURO EXTERNO'),
('DES', 'IMPRESORA DESKJET'),
('DIS', 'DISTRIBUIDOR UHF'),
('DVR', 'DVR'),
('ESC', 'ESCANER'),
('ETI', 'ETIQUETADORA'),
('FWL', 'FIREWALL'),
('HUE', 'LECTOR DE HUELLA DIGITAL'),
('IMP', 'IMPRESORA'),
('INY', 'IMPRESORA DE INYECCION DE TINTA'),
('IPA', 'IPAD'),
('KVM', 'SWITCH KVM'),
('LAP', 'COMPUTADORA PORTATIL'),
('LAS', 'IMPRESORA LASERJET'),
('MEZ', 'MEZCLADORA'),
('MIC', 'MICROFONO'),
('MLT', 'IMPRESORA MULTIFUNCIONAL'),
('MON', 'MONITOR'),
('MTZ', 'IMPRESORA DE MATRIZ DE PUNTO'),
('NOB', 'UPS'),
('PAN', 'PANTALLA DE PROYECCION'),
('PBX', 'CONMUTADOR'),
('PCE', 'COMPUTADORA DE ESCRITORIO'),
('PRO', 'PROYECTORPROYECTOR'),
('RAC', 'RACKS'),
('REC', 'RECEPTOR DE SEÑAL	'),
('REG', 'REGULADOR'),
('SVR', 'SERVIDOR'),
('SWC', 'SWITCH'),
('TAB', 'TABLET'),
('TEL', 'TELEFONO'),
('TEN', 'TECLADO EXTERNO NUMERICO'),
('TIP', 'TELEFONO IP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fk_estado` int(10) UNSIGNED DEFAULT NULL,
  `fk_pais` int(10) UNSIGNED DEFAULT NULL,
  `fk_municipio` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`, `fk_estado`, `fk_pais`, `fk_municipio`) VALUES
(1, 'Ciudad de Mexico', NULL, NULL, NULL),
(2, 'Monterrey', NULL, NULL, NULL),
(3, 'Guadalajara', NULL, NULL, NULL),
(4, 'Tijuana', NULL, NULL, NULL),
(5, 'Puebla de Zaragoza', NULL, NULL, NULL),
(6, 'Toluca de Lerdo', NULL, NULL, NULL),
(7, 'Santiago de Queretaro', NULL, NULL, NULL),
(8, 'Leon', NULL, NULL, NULL),
(9, 'Juarez', NULL, NULL, NULL),
(10, 'Torreon', NULL, NULL, NULL),
(11, 'Saltillo', NULL, NULL, NULL),
(12, 'Chihuahua', NULL, NULL, NULL),
(13, 'Merida', NULL, NULL, NULL),
(14, 'Mexicali', NULL, NULL, NULL),
(15, 'Tampico', NULL, NULL, NULL),
(16, 'Oaxaca de Juarez', NULL, NULL, NULL),
(17, 'San Luis Potosi', NULL, NULL, NULL),
(18, 'Cuernavaca', NULL, NULL, NULL),
(19, 'Hermosillo', NULL, NULL, NULL),
(20, 'Aguascalientes', NULL, NULL, NULL),
(21, 'Morelia', NULL, NULL, NULL),
(22, 'Reynosa', NULL, NULL, NULL),
(23, 'Cualican', NULL, NULL, NULL),
(24, 'Veracruz', NULL, NULL, NULL),
(25, 'Tuxtla Gutierrez', NULL, NULL, NULL),
(26, 'Victoria de Durango', NULL, NULL, NULL),
(27, 'Acapulco de Juarez', NULL, NULL, NULL),
(28, 'Villahermosa', NULL, NULL, NULL),
(29, 'Xalapa-Enriquez', NULL, NULL, NULL),
(30, 'Cancún', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_componente` varchar(30) DEFAULT NULL,
  `modelo` varchar(20) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `nombre_componente`, `modelo`, `serie`, `descripcion`) VALUES
(1, 'ADAPTADOR THUNDERBOLT A GIGABI', '', '', ''),
(2, 'ADAPTADOR USB A ETHERNET', '', '', ''),
(3, 'APUNTADOR', '', '', ''),
(4, 'BARRA DE MULTICONTACTO', '', '', ''),
(5, 'BASE DE TELEFONO IP', '', '', ''),
(6, 'BATERIA DE LAPTOP', '', '', ''),
(7, 'BATERIA UPS', '', '', ''),
(8, 'BOCINAS', '', '', ''),
(9, 'CABLE HDMI', '', '', ''),
(10, 'CABLE USB', '', '', ''),
(11, 'CABLE VGA', '', '', ''),
(12, 'CARGADOR', '', '', ''),
(13, 'CARTUCHO DE TINTA', '', '', ''),
(14, 'CHAROLA PARA RACKS', '', '', ''),
(15, 'CINTA', '', '', ''),
(16, 'CONVERTIDOR', '', '', ''),
(17, 'DISCO DURO HDD', '', '', ''),
(18, 'DISCO DURO SSD', '', '', ''),
(19, 'DISPLAY', '', '', ''),
(20, 'FUENTE DE PODER', '', '', ''),
(21, 'GABINETE', '', '', ''),
(22, 'KIT TECLADO MOUSE USB', '', '', ''),
(23, 'LAPIZ STYLUS', '', '', ''),
(24, 'MEMORIA RAM', '', '', ''),
(25, 'MEMORIA USB', '', '', ''),
(26, 'MICROFONO', '', '', ''),
(27, 'MOUSE', '', '', ''),
(28, 'MULTICONTACTO PARA RACKS', '', '', ''),
(29, 'MULTIPUERTOS USB', '', '', ''),
(30, 'PROCESADOR', '', '', ''),
(31, 'SIN MARCA', '', '', ''),
(32, 'SOPORTE PARA PROYECTOR', '', '', ''),
(33, 'TARJETA DE RED WIFI USB', '', '', ''),
(34, 'TARJETA MADRE', '', '', ''),
(35, 'TARJETA RED PCI EXPRESS', '', '', ''),
(36, 'TECLADO', '', '', ''),
(37, 'TECLADO ALFANUMERICO', '', '', ''),
(38, 'TECLADO EXTERNO NUMERICO', '', '', ''),
(39, 'TECLADO PS2', '', '', ''),
(40, 'TRANSCEND', '', '', ''),
(41, 'UNIDAD DVD/WRITER', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_dep` varchar(50) NOT NULL,
  `fecha_alta` time DEFAULT current_timestamp(),
  `fecha_baja` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre_dep`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'Mercadotecnia', '00:00:00', '00:00:00'),
(2, 'Capital Humano', '08:56:00', '00:00:00'),
(3, 'Gerencia General', '00:00:00', '00:00:00'),
(4, 'Direccion General', '00:00:00', '00:00:00'),
(5, 'Capital Humano', '00:00:00', '00:00:00'),
(6, 'Contabilidad', '00:00:00', '00:00:00'),
(7, 'Tesoreria', '00:00:00', '00:00:00'),
(8, 'Facturacion', '00:00:00', '00:00:00'),
(9, 'Mantenimiento', '00:00:00', '00:00:00'),
(10, 'Tecnologias de la Informacion', '00:00:00', '00:00:00'),
(11, 'Juridico', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tickets`
--

CREATE TABLE `detalle_tickets` (
  `id_detalle` int(10) UNSIGNED NOT NULL,
  `fk_clave_ticket` varchar(20) DEFAULT NULL,
  `fk_clave_equipo` varchar(20) DEFAULT NULL,
  `fk_clave_usuario` varchar(10) DEFAULT NULL,
  `fk_clave_empleado` varchar(10) DEFAULT NULL,
  `fecha_inicio` time DEFAULT current_timestamp(),
  `fecha_fin` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fk_municipio` int(10) UNSIGNED DEFAULT NULL,
  `fk_pais` int(10) UNSIGNED DEFAULT NULL,
  `fk_estado` int(10) UNSIGNED DEFAULT NULL,
  `fk_ciudad` int(10) UNSIGNED DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `RFC` varchar(50) NOT NULL,
  `fecha_alta` time DEFAULT current_timestamp(),
  `fecha_baja` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `correo`, `fk_municipio`, `fk_pais`, `fk_estado`, `fk_ciudad`, `direccion`, `RFC`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'Opset', 'informacion@gmail.com', 21, 18, 20, 17, 'asdfghjklñ', 'OPSET12345', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_clave_equipo` varchar(20) DEFAULT NULL,
  `fk_marca` int(10) UNSIGNED DEFAULT NULL,
  `fk_componentes` int(10) UNSIGNED DEFAULT NULL,
  `modelo` varchar(30) NOT NULL,
  `serie` varchar(30) NOT NULL,
  `fk_estado_equipo` int(10) UNSIGNED DEFAULT NULL,
  `fk_SO` int(10) UNSIGNED DEFAULT NULL,
  `fk_paqueteria` int(10) UNSIGNED DEFAULT NULL,
  `MacAddress` varchar(50) NOT NULL,
  `factura` longblob DEFAULT NULL,
  `stock` varchar(500) NOT NULL,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT current_timestamp(),
  `fk_sucursal` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `fk_clave_equipo`, `fk_marca`, `fk_componentes`, `modelo`, `serie`, `fk_estado_equipo`, `fk_SO`, `fk_paqueteria`, `MacAddress`, `factura`, `stock`, `fecha_alta`, `fecha_baja`, `fk_sucursal`) VALUES
(5, 'ACP', 1, NULL, '', '', 1, 1, NULL, '129.130.45', NULL, '12', '2023-07-15 15:03:58', '2023-07-15 15:03:58', NULL),
(6, 'LAP', 3, NULL, '', '', 1, 1, NULL, '129.130.2', NULL, '1', '2023-07-15 15:07:32', '2023-07-15 15:07:32', NULL),
(7, 'CAM', 6, NULL, '', '', 1, 1, NULL, '129.130.49', NULL, '12', '2023-07-15 15:13:23', '2023-07-15 15:13:23', NULL),
(10, 'ACP', 1, 2, '', '', 1, 1, 4, '129.130.45', NULL, '1', '2023-07-19 22:14:24', '2023-07-19 22:14:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Quintana Roo'),
(2, 'Aguascalientes'),
(3, 'Baja California'),
(4, 'Baja California Sur'),
(5, 'Campeche'),
(6, 'Chihuahua'),
(7, 'Chiapas'),
(8, 'Coahuila de Zaragoza'),
(9, 'Colima'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'Mexico'),
(16, 'Michoacan de Ocampo'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo Leon'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Queretaro'),
(23, 'San Luis Potosi'),
(24, 'Sinaloa'),
(25, 'Sonora'),
(26, 'Tamaulipas'),
(27, 'Tlaxcala'),
(28, 'Veracruz'),
(29, 'Yucatan'),
(30, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE `estado_equipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado_equipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_equipo`
--

INSERT INTO `estado_equipo` (`id`, `estado_equipo`) VALUES
(1, 'Bueno'),
(2, 'Con fallas'),
(3, 'Dañado'),
(4, 'Descompuesto'),
(5, 'En mantenimiento'),
(6, 'Inservible'),
(7, 'Nuevo'),
(8, 'Obsoleto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_ticket`
--

CREATE TABLE `estatus_ticket` (
  `id_estatus` int(10) UNSIGNED NOT NULL,
  `estatus` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estatus_ticket`
--

INSERT INTO `estatus_ticket` (`id_estatus`, `estatus`) VALUES
(1, 'Nuevo'),
(2, 'Abierto'),
(3, 'En espera'),
(4, 'Cerrado'),
(5, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_clave_ticket` varchar(20) DEFAULT NULL,
  `fk_clave_equipo` varchar(20) DEFAULT NULL,
  `fk_clave_usuario` varchar(10) DEFAULT NULL,
  `fk_clave_empleado` varchar(10) DEFAULT NULL,
  `tipo_mantenimiento` varchar(30) DEFAULT NULL,
  `dec_mantenimiento` varchar(100) DEFAULT NULL,
  `fecha_reporte` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_inicio_atencion` datetime DEFAULT NULL,
  `fecha_fin_atencion` datetime DEFAULT NULL,
  `tiempo_atencion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `fk_clave_ticket`, `fk_clave_equipo`, `fk_clave_usuario`, `fk_clave_empleado`, `tipo_mantenimiento`, `dec_mantenimiento`, `fecha_reporte`, `fecha_inicio_atencion`, `fecha_fin_atencion`, `tiempo_atencion`) VALUES
(1, '55006439', 'LAP', 'D8EDBFAF', 'D8EDBFAF', 'Mantenimiento Preventivo', 'dasdasd', '2023-07-20 13:24:37', '2023-07-20 13:25:50', '2023-07-20 13:26:04', '0 horas 0 minutos 14 segundos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infraestructura`
--

CREATE TABLE `infraestructura` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_clave_equipo` varchar(20) DEFAULT NULL,
  `fk_clave_ticket` varchar(20) DEFAULT NULL,
  `fk_usuario1` varchar(10) DEFAULT NULL,
  `contrasena1` varchar(15) DEFAULT NULL,
  `nota1` varchar(100) DEFAULT NULL,
  `fk_usuario2` varchar(10) DEFAULT NULL,
  `contrasena2` varchar(15) DEFAULT NULL,
  `nota2` varchar(100) DEFAULT NULL,
  `fk_usuario3` varchar(10) DEFAULT NULL,
  `contrasena3` varchar(15) DEFAULT NULL,
  `nota3` varchar(100) DEFAULT NULL,
  `IP1` varchar(20) DEFAULT NULL,
  `IP2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, '3COM'),
(2, 'A8X'),
(3, 'ACER'),
(4, 'ACP'),
(5, 'ACTEK'),
(6, 'ACTIVE COOL'),
(7, 'ADATA'),
(8, 'ALLEN&HEATH'),
(9, 'AMD'),
(10, 'AMIGO'),
(11, 'AOC'),
(12, 'AOPEN'),
(13, 'APC'),
(14, 'APPLE'),
(15, 'ASROCK'),
(16, 'ASUS'),
(17, 'AVITECH'),
(18, 'AXIS'),
(19, 'BENQ'),
(20, 'BOE'),
(21, 'BROTHER'),
(22, 'CANON'),
(23, 'CASE LOGIC'),
(24, 'CBL'),
(25, 'CDP'),
(26, 'CISCO'),
(27, 'CNB'),
(28, 'COMPAQ'),
(29, 'COMPLETE'),
(30, 'CORSAIR'),
(31, 'CROSSMATCH'),
(32, 'CYBERPOWER'),
(33, 'DAHUA'),
(34, 'DA-LITE'),
(35, 'DATASHIELD'),
(36, 'DELL'),
(37, 'DELTA'),
(38, 'DIGITALPERSONA'),
(39, 'DIGITUS'),
(40, 'D-LINK'),
(41, 'DRAY TEK'),
(42, 'DVE'),
(43, 'DYMO'),
(44, 'EAGLEEYES'),
(45, 'EASY LINE'),
(46, 'ECS'),
(47, 'EDGE SYSTEMS'),
(48, 'EDIMAX'),
(49, 'ENGENIUS'),
(50, 'ENSAMBLADA'),
(51, 'EPCOM'),
(52, 'EPSON'),
(53, 'EVER POWER'),
(54, 'EVOTEC'),
(55, 'FORZA'),
(56, 'FOXCONN'),
(57, 'GATEWAY'),
(58, 'GENERICO'),
(59, 'GENIUS'),
(60, 'GIGABYTE'),
(61, 'GRANDSTREAM'),
(62, 'HGST'),
(63, 'HITACHI'),
(64, 'HONOR ELECTRONIC'),
(65, 'HP'),
(66, 'HPE'),
(67, 'HUAWEI'),
(68, 'HYUNDAI ELECTRONICS'),
(69, 'IBM'),
(70, 'IMAC'),
(71, 'INTEL'),
(72, 'INTELLINET'),
(73, 'ISB'),
(74, 'KEMEX'),
(75, 'KINGSTON'),
(76, 'KLIP XTREME'),
(77, 'KOBLENZ'),
(78, 'LANIX'),
(79, 'LEADER ELECTRONIC'),
(80, 'LEGRAND'),
(81, 'LENOVO'),
(82, 'LG'),
(83, 'LOGITECH'),
(84, 'LYNKSYS'),
(85, 'MANHATTAN'),
(86, 'MARKVISION'),
(87, 'MAXTOR'),
(88, 'MICRON TECHNOLOGY'),
(89, 'MICROSOFT'),
(90, 'MOSHI'),
(91, 'NACEB TECH'),
(92, 'NEC'),
(93, 'NEXXT'),
(94, 'OVALTECH'),
(95, 'PANASONIC'),
(96, 'PERFECT CHOICE'),
(97, 'PHILLIPS'),
(98, 'POWERCOM'),
(99, 'PROVISION'),
(100, 'QNAP'),
(101, 'QUALCOMM'),
(102, 'RAMAXEL TECHNOLOGY'),
(103, 'REALTEK'),
(104, 'REVOLUTION'),
(105, 'SAFETY'),
(106, 'SAMSUNG'),
(107, 'SANDISK'),
(108, 'SAXXON'),
(109, 'SBE TECH'),
(110, 'SEAGATE'),
(111, 'SECUCORE'),
(112, 'SHURE'),
(113, 'SICMA'),
(114, 'SIN DATO'),
(115, 'SMARTBITT'),
(116, 'SONY VAIO'),
(117, 'STARTECH'),
(118, 'STEREN'),
(119, 'SWICHI'),
(120, 'TECHZONE'),
(121, 'TECLADO EXTERNO NUMERICO'),
(122, 'TENDA'),
(123, 'TOSHIBA'),
(124, 'TP-LINK'),
(125, 'TPV'),
(126, 'TRANSCEND'),
(127, 'TRENDNET'),
(128, 'TRIPPLITE'),
(129, 'TRUE BASIX'),
(130, 'UBIQUITI'),
(131, 'VERBATIM'),
(132, 'VERICO'),
(133, 'VIEW SONIC'),
(134, 'VISION'),
(135, 'VOCE'),
(136, 'VORAGO'),
(137, 'VUTET'),
(138, 'WESTERN DIGITAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(59) NOT NULL,
  `fk_estado` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `fk_estado`) VALUES
(1, 'Felipe Carrillo Puerto', 1),
(2, 'Isla Mujeres', 1),
(3, 'Othon P. Blanco', 1),
(4, 'Benito Juarez', 1),
(5, 'Jose Ma Morelos', 1),
(6, 'Lazaro Cardenas', 1),
(7, 'Solidaridad', 1),
(8, 'Tulum', 1),
(9, 'Bacalar', 1),
(10, 'Puerto Morelos', 1),
(11, 'Alvaro Obregon', 15),
(12, 'Azcapotzalco', 15),
(13, 'Coyoacan', 15),
(14, 'Cuajimalpa de Morelos', 15),
(15, 'Cuauhtemoc', 6),
(16, 'Gustavo A Madero', 15),
(17, 'Iztapalapa', 15),
(18, 'Magdalena Contreras', 15),
(19, 'Miguel Hidalgo', 15),
(20, 'Milpa Alta', 15),
(21, 'Tlahuac', 15),
(22, 'Tlalpan', 15),
(23, 'Venustiano Carranza', 15),
(24, 'Xochimilco', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`) VALUES
(1, 'Antigua y Barbuda'),
(2, 'Argentina'),
(3, 'Bahamas'),
(4, 'Barbados'),
(5, 'Belice'),
(6, 'Bolivia'),
(7, 'Brasil'),
(8, 'Canada'),
(9, 'Chile'),
(10, 'Colombia'),
(11, 'Costa Rica'),
(12, 'Cuba'),
(13, 'Dominica'),
(14, 'Ecuador'),
(15, 'El Salvador'),
(16, 'Estados Unidos'),
(17, 'Granada'),
(18, 'Guatemala'),
(19, 'Guyana'),
(20, 'Haiti'),
(21, 'Honduras'),
(22, 'Jamaica'),
(23, 'Mexico'),
(24, 'Nicaragua'),
(25, 'Panama'),
(26, 'Paraguay'),
(27, 'Peru'),
(28, 'Republica Dominicana'),
(29, 'San Cristobal y Nieves'),
(30, 'San Vicente y las Granadinas'),
(31, 'Santa Lucia'),
(32, 'Surinam'),
(33, 'Trinidad y Tobago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paqueteria`
--

CREATE TABLE `paqueteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paqueteria`
--

INSERT INTO `paqueteria` (`id`, `codigo`, `nombre`) VALUES
(1, 'ADMI', 'ADMINPAQ'),
(2, 'ADOC', 'ADOBE CREATIVE CLOUD'),
(3, 'ESET', 'ANTIVIRUS ESET'),
(4, 'KAS', 'ANTIVIRUS KASPERSKY'),
(5, 'CCON', 'CONTPAQ CONTABILIDAD'),
(6, 'CNOM', 'CONTPAQ NOMINAS'),
(7, 'CCOM', 'CONTPAQ COMERCIAL'),
(8, 'LOFI', 'LIBRE OFFICE'),
(9, 'MINM', 'MINDJET MINMANAGER'),
(10, 'M365', 'OFFICE 365'),
(11, 'O13H', 'MS OFFICE 2013 H&B'),
(12, 'O16H', 'MS OFFICE 2016 H&B'),
(13, 'O19H', 'MS OFFICE 2019 H&B'),
(14, 'O21H', 'MS OFFICE 2021 H&B'),
(15, 'O13P', 'MS OFFICE PROFESIONAL 2013'),
(16, 'O16P', 'MS OFFICE PROFESIONAL 2016'),
(17, 'O19P', 'MS OFFICE PROFESIONAL 2019'),
(18, 'O21P', 'MS OFFICE PROFESIONAL 2021'),
(19, 'NPRO', 'NITRO PDF PRO'),
(20, 'SQ19', 'SQL SERVER 2019 STD'),
(21, 'TV11', 'TEAMVIEWER 11'),
(22, 'TV12', 'TEAMVIEWER 12'),
(23, 'TV13', 'TEAMVIEWER 13'),
(24, 'TV14', 'TEAMVIEWER 14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_puesto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id`, `nombre_puesto`) VALUES
(1, 'Gerente comercial'),
(2, 'Asistente de mercadotecnia'),
(3, 'Gerente de capital humano'),
(4, 'Asistente de capital humano'),
(5, 'Auxiliar de capital humano'),
(6, 'Contador'),
(7, 'Contador general'),
(8, 'Auxiliar contable'),
(9, 'Encargado de tesoreria'),
(10, 'Auxiliar de tesoreria'),
(11, 'Encargado de facturacion'),
(12, 'Auxiliar de facturacion'),
(13, 'Encargado de cuentas por pagar'),
(14, 'Encargado de cuentas por cobrar'),
(15, 'Gerente de nominas'),
(16, 'Auxiliar de nominas'),
(17, 'Gerente de TI'),
(18, 'Auxiliar de TI'),
(19, 'Encargado de desarrollo'),
(20, 'Programador JR'),
(21, 'Programador SR'),
(22, 'Encargado juridico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Tecnico'),
(4, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `so`
--

CREATE TABLE `so` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_so` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `so`
--

INSERT INTO `so` (`id`, `nombre_so`) VALUES
(1, 'Android'),
(2, 'Freenas'),
(3, 'IOS'),
(4, 'Linux'),
(5, 'Mac OS'),
(6, 'MS Win 10 Profesional'),
(7, 'MS Win 10 Standard'),
(8, 'MS Win 10 Home'),
(9, 'MS Win 10 Single Language'),
(10, 'MS Win 11 Profesional'),
(11, 'MS Win 11 Standard'),
(12, 'MS Win 11 Home'),
(13, 'MS Win 11 Single Language'),
(14, 'MS Win Server 2008 R2 Standard'),
(15, 'MS Win Server 2008 R2 Enterprise'),
(16, 'MS Win Server 2012 R2 Standard'),
(17, 'MS Win Server 2012 R2 Essentials'),
(18, 'MS Win Server 2012 R2 Datacenter'),
(19, 'MS Win Server 2016 Standard'),
(20, 'MS Win Server 2016 Essentials'),
(21, 'MS Win Server 2016 Datacenter'),
(22, 'MS Win Server 2019 Standard'),
(23, 'MS Win Server 2019 Essentials'),
(24, 'MS Win Server 2019 Datacenter'),
(25, 'MS Win Server 2022 Standard'),
(26, 'MS Win Server 2022 Essentials'),
(27, 'MS Win Server 2022 Datacenter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_suc` varchar(100) DEFAULT NULL,
  `fk_estado` int(10) UNSIGNED DEFAULT NULL,
  `fk_municipio` int(10) UNSIGNED DEFAULT NULL,
  `fk_ciudad` int(10) UNSIGNED DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `fk_responsable` varchar(10) DEFAULT NULL,
  `fecha_alta` time DEFAULT current_timestamp(),
  `fecha_baja` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `nombre_suc`, `fk_estado`, `fk_municipio`, `fk_ciudad`, `fk_empresa`, `direccion`, `telefono`, `fk_responsable`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'opsetCancun', 15, 3, 16, 1, 'safdgfhkl', '99855954', 'JACD170203', '00:00:00', '00:00:00'),
(2, 'Jaimitos', 1, 4, 30, 1, 'xxxxxxxxxxxxxx', '7894561239', 'JACD170203', '19:56:43', '19:56:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `clave_ticket` varchar(20) NOT NULL,
  `fk_clave_equipo` varchar(20) DEFAULT NULL,
  `asunto` varchar(70) NOT NULL,
  `fk_departamento` int(10) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `fk_clave_usuario` varchar(10) DEFAULT NULL,
  `fk_estatus` int(10) UNSIGNED DEFAULT NULL,
  `fecha_reporte` datetime DEFAULT current_timestamp(),
  `fk_clave_empleado` varchar(10) DEFAULT NULL,
  `fk_sucursal` int(10) UNSIGNED DEFAULT NULL,
  `documento` longblob DEFAULT NULL,
  `solucion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`clave_ticket`, `fk_clave_equipo`, `asunto`, `fk_departamento`, `descripcion`, `fk_clave_usuario`, `fk_estatus`, `fecha_reporte`, `fk_clave_empleado`, `fk_sucursal`, `documento`, `solucion`) VALUES
('55006439', 'LAP', 'Laptop no se ve', 1, '<p>zx&lt;cdzsdasd</p>', 'D8EDBFAF', 4, '2023-07-20 13:23:52', 'D8EDBFAF', NULL, NULL, 'ola spy una prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `clave_usuario` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Apaterno` varchar(100) NOT NULL,
  `Amaterno` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `fk_departamento` int(10) UNSIGNED DEFAULT NULL,
  `fk_rol` int(10) UNSIGNED DEFAULT NULL,
  `fk_puesto` int(10) UNSIGNED DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `fk_sucursal` int(10) UNSIGNED DEFAULT NULL,
  `razon` varchar(250) DEFAULT NULL,
  `fecha_alta` time DEFAULT current_timestamp(),
  `fecha_baja` time DEFAULT current_timestamp(),
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`clave_usuario`, `nombre`, `Apaterno`, `Amaterno`, `telefono`, `correo`, `contrasena`, `fk_departamento`, `fk_rol`, `fk_puesto`, `sexo`, `fk_sucursal`, `razon`, `fecha_alta`, `fecha_baja`, `activo`) VALUES
('1995A72B', 'Odalys', 'Mendez', 'Torres', '9982183114', 'odalysmendez@gmail.com', '123', 10, 2, 20, 'Femenino', 2, NULL, '18:46:05', '18:46:05', 1),
('6E1D439B', 'Saul', 'Garcia', 'Lopez', '9982183114', 'andy@gmail.com', '123', 1, 1, 1, 'Masculino', 1, 'El usuario ya no trabaja', '19:58:44', '19:58:44', 0),
('BB1842E1', 'Javier', 'Mendez', 'Torres', '7894561239', 'javiercan123@gmail.com', '123', 1, 3, 1, 'Masculino', 1, NULL, '16:59:44', '16:59:44', 1),
('D8EDBFAF', 'Jaime Dzul', 'Gomez', 'Lopez', '9982183114', 'jaimecastaneda13@gmail.com', '123', 1, 4, 1, 'Masculino', 1, NULL, '22:09:43', '22:09:43', 1),
('JACD170203', 'Jaime', 'Castañeda', 'Dzul', '9981509072', 'jaimecastaneda133@gmail.com', 'Holamundo', 10, 1, 20, 'Masculino', 1, NULL, '00:00:00', '00:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clave_equipo` (`fk_clave_equipo`),
  ADD KEY `fk_clave_usuario` (`fk_clave_usuario`),
  ADD KEY `fk_sucursal` (`fk_sucursal`);

--
-- Indices de la tabla `catalogo_equipo`
--
ALTER TABLE `catalogo_equipo`
  ADD PRIMARY KEY (`clave_equipo`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado` (`fk_estado`),
  ADD KEY `fk_pais` (`fk_pais`),
  ADD KEY `fk_municipio` (`fk_municipio`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_tickets`
--
ALTER TABLE `detalle_tickets`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_clave_equipo` (`fk_clave_equipo`),
  ADD KEY `fk_clave_ticket` (`fk_clave_ticket`),
  ADD KEY `fk_clave_usuario` (`fk_clave_usuario`),
  ADD KEY `fk_clave_empleado` (`fk_clave_empleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado` (`fk_estado`),
  ADD KEY `fk_pais` (`fk_pais`),
  ADD KEY `fk_municipio` (`fk_municipio`),
  ADD KEY `fk_ciudad` (`fk_ciudad`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clave_equipo` (`fk_clave_equipo`),
  ADD KEY `fk_marca` (`fk_marca`),
  ADD KEY `fk_estado_equipo` (`fk_estado_equipo`),
  ADD KEY `fk_SO` (`fk_SO`),
  ADD KEY `fk_componentes` (`fk_componentes`),
  ADD KEY `fk_paqueteria` (`fk_paqueteria`),
  ADD KEY `fk_sucursal` (`fk_sucursal`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus_ticket`
--
ALTER TABLE `estatus_ticket`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clave_equipo` (`fk_clave_equipo`),
  ADD KEY `fk_clave_ticket` (`fk_clave_ticket`),
  ADD KEY `fk_clave_usuario` (`fk_clave_usuario`),
  ADD KEY `fk_clave_empleado` (`fk_clave_empleado`);

--
-- Indices de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clave_equipo` (`fk_clave_equipo`),
  ADD KEY `fk_clave_ticket` (`fk_clave_ticket`),
  ADD KEY `fk_usuario1` (`fk_usuario1`),
  ADD KEY `fk_usuario2` (`fk_usuario2`),
  ADD KEY `fk_usuario3` (`fk_usuario3`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado` (`fk_estado`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paqueteria`
--
ALTER TABLE `paqueteria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado` (`fk_estado`),
  ADD KEY `fk_ciudad` (`fk_ciudad`),
  ADD KEY `fk_municipio` (`fk_municipio`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`clave_ticket`),
  ADD KEY `fk_clave_equipo` (`fk_clave_equipo`),
  ADD KEY `fk_departamento` (`fk_departamento`),
  ADD KEY `fk_clave_usuario` (`fk_clave_usuario`),
  ADD KEY `fk_estatus` (`fk_estatus`),
  ADD KEY `fk_clave_empleado` (`fk_clave_empleado`),
  ADD KEY `fk_sucursal` (`fk_sucursal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`clave_usuario`),
  ADD KEY `fk_departamento` (`fk_departamento`),
  ADD KEY `fk_rol` (`fk_rol`),
  ADD KEY `fk_puesto` (`fk_puesto`),
  ADD KEY `fk_sucursal` (`fk_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_tickets`
--
ALTER TABLE `detalle_tickets`
  MODIFY `id_detalle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estatus_ticket`
--
ALTER TABLE `estatus_ticket`
  MODIFY `id_estatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `paqueteria`
--
ALTER TABLE `paqueteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `so`
--
ALTER TABLE `so`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`fk_clave_equipo`) REFERENCES `catalogo_equipo` (`clave_equipo`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`fk_clave_usuario`) REFERENCES `usuario` (`clave_usuario`),
  ADD CONSTRAINT `fk_sucursal` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `ciudades_ibfk_2` FOREIGN KEY (`fk_pais`) REFERENCES `pais` (`id`),
  ADD CONSTRAINT `ciudades_ibfk_3` FOREIGN KEY (`fk_municipio`) REFERENCES `municipio` (`id`);

--
-- Filtros para la tabla `detalle_tickets`
--
ALTER TABLE `detalle_tickets`
  ADD CONSTRAINT `detalle_tickets_ibfk_1` FOREIGN KEY (`fk_clave_equipo`) REFERENCES `catalogo_equipo` (`clave_equipo`),
  ADD CONSTRAINT `detalle_tickets_ibfk_2` FOREIGN KEY (`fk_clave_ticket`) REFERENCES `tickets` (`clave_ticket`),
  ADD CONSTRAINT `detalle_tickets_ibfk_3` FOREIGN KEY (`fk_clave_usuario`) REFERENCES `usuario` (`clave_usuario`),
  ADD CONSTRAINT `detalle_tickets_ibfk_4` FOREIGN KEY (`fk_clave_empleado`) REFERENCES `usuario` (`clave_usuario`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `empresa_ibfk_2` FOREIGN KEY (`fk_pais`) REFERENCES `pais` (`id`),
  ADD CONSTRAINT `empresa_ibfk_3` FOREIGN KEY (`fk_municipio`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `empresa_ibfk_4` FOREIGN KEY (`fk_ciudad`) REFERENCES `ciudades` (`id`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`fk_clave_equipo`) REFERENCES `catalogo_equipo` (`clave_equipo`),
  ADD CONSTRAINT `equipo_ibfk_10` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`fk_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `equipo_ibfk_4` FOREIGN KEY (`fk_estado_equipo`) REFERENCES `estado_equipo` (`id`),
  ADD CONSTRAINT `equipo_ibfk_5` FOREIGN KEY (`fk_SO`) REFERENCES `so` (`id`),
  ADD CONSTRAINT `equipo_ibfk_8` FOREIGN KEY (`fk_componentes`) REFERENCES `componentes` (`id`),
  ADD CONSTRAINT `equipo_ibfk_9` FOREIGN KEY (`fk_paqueteria`) REFERENCES `paqueteria` (`id`);

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`fk_clave_equipo`) REFERENCES `catalogo_equipo` (`clave_equipo`),
  ADD CONSTRAINT `expediente_ibfk_2` FOREIGN KEY (`fk_clave_ticket`) REFERENCES `tickets` (`clave_ticket`),
  ADD CONSTRAINT `expediente_ibfk_3` FOREIGN KEY (`fk_clave_usuario`) REFERENCES `usuario` (`clave_usuario`),
  ADD CONSTRAINT `expediente_ibfk_4` FOREIGN KEY (`fk_clave_empleado`) REFERENCES `usuario` (`clave_usuario`);

--
-- Filtros para la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  ADD CONSTRAINT `infraestructura_ibfk_1` FOREIGN KEY (`fk_clave_equipo`) REFERENCES `catalogo_equipo` (`clave_equipo`),
  ADD CONSTRAINT `infraestructura_ibfk_2` FOREIGN KEY (`fk_clave_ticket`) REFERENCES `tickets` (`clave_ticket`),
  ADD CONSTRAINT `infraestructura_ibfk_3` FOREIGN KEY (`fk_usuario1`) REFERENCES `usuario` (`clave_usuario`),
  ADD CONSTRAINT `infraestructura_ibfk_4` FOREIGN KEY (`fk_usuario2`) REFERENCES `usuario` (`clave_usuario`),
  ADD CONSTRAINT `infraestructura_ibfk_5` FOREIGN KEY (`fk_usuario3`) REFERENCES `usuario` (`clave_usuario`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `sucursal_ibfk_2` FOREIGN KEY (`fk_ciudad`) REFERENCES `ciudades` (`id`),
  ADD CONSTRAINT `sucursal_ibfk_3` FOREIGN KEY (`fk_municipio`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `sucursal_ibfk_4` FOREIGN KEY (`fk_empresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`fk_clave_equipo`) REFERENCES `catalogo_equipo` (`clave_equipo`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`fk_departamento`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`fk_clave_usuario`) REFERENCES `usuario` (`clave_usuario`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`fk_estatus`) REFERENCES `estatus_ticket` (`id_estatus`),
  ADD CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`fk_clave_empleado`) REFERENCES `usuario` (`clave_usuario`),
  ADD CONSTRAINT `tickets_ibfk_6` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_departamento`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`fk_puesto`) REFERENCES `puesto` (`id`),
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`id`);

