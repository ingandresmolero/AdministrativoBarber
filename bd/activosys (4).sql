-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-05-2024 a las 19:54:04
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `activosys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_diario`
--

CREATE TABLE `cierre_diario` (
  `id_cierre` int NOT NULL,
  `fecha` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `monto_final` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_fondo`
--

CREATE TABLE `consumo_fondo` (
  `id_consumo` int NOT NULL,
  `invoice` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `saldo` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cliente` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aplicado` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `consumo_fondo`
--

INSERT INTO `consumo_fondo` (`id_consumo`, `invoice`, `saldo`, `cliente`, `aplicado`) VALUES
(8, '52', '100', '42', '50'),
(9, '54', '-63', '46', '-50'),
(12, '56', '0', '47', '-50'),
(13, '64', '-24', '48', '-10'),
(16, '67', '0.48', '49', '-15'),
(17, '69', '0', '48', '-24'),
(18, '70', '0', '47', '-56'),
(19, '71', '0', '46', '-63'),
(20, '75', '30', '42', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_interno`
--

CREATE TABLE `consumo_interno` (
  `idconsumo` int NOT NULL,
  `intern` int NOT NULL,
  `servidor` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `saldo` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `fecha_creacion` date NOT NULL,
  `fecha_act` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `consumo_interno`
--

INSERT INTO `consumo_interno` (`idconsumo`, `intern`, `servidor`, `saldo`, `fecha_creacion`, `fecha_act`) VALUES
(5, 1, '1', '25', '2023-12-06', '2023-12-12'),
(8, 4, '3', '', '2023-12-08', ''),
(9, 6, '20', '33', '2023-12-12', '2023-12-12'),
(10, 7, '20', '17', '2024-11-01', '2024-11-01'),
(11, 8, '21', '0', '2024-01-12', '0'),
(12, 10, '20', '143', '2024-05-13', '2024-05-14'),
(13, 11, '1', '23', '2024-05-14', '2024-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_cobrar`
--

CREATE TABLE `cuentas_cobrar` (
  `idcuenta` int NOT NULL,
  `invoice` int NOT NULL,
  `idmetodo` int NOT NULL,
  `monto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `detalle` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `cuentas_cobrar`
--

INSERT INTO `cuentas_cobrar` (`idcuenta`, `invoice`, `idmetodo`, `monto`, `detalle`, `fecha_creacion`) VALUES
(8, 28, 1, '20', '', '2023-07-26'),
(9, 31, 1, '2', '', '2023-07-26'),
(10, 32, 4, '23', '', '2023-07-26'),
(12, 27, 1, '15', '', '2023-07-26'),
(30, 34, 2, '17', '', '2023-07-26'),
(31, 34, 1, '10', '', '2023-07-26'),
(32, 34, 2, '7', '', '2023-07-26'),
(33, 35, 2, '32', 'ref 1234', '2023-07-26'),
(34, 35, 1, '20', 'deja en fondo', '2023-07-26'),
(55, 36, 1, '20', '', '2023-07-26'),
(56, 36, 2, '140', '', '2023-07-26'),
(57, 30, 2, '840', '', '2023-07-26'),
(58, 23, 5, '43', 'pago completo', '2023-07-26'),
(59, 39, 5, '10', 'ref 1234', '2023-07-26'),
(60, 39, 2, '200', 'ref venezuela 8900', '2023-07-26'),
(61, 41, 1, '20', '', '2023-07-26'),
(62, 41, 2, '84', '', '2023-07-26'),
(63, 42, 1, '20', '', '2023-07-26'),
(66, 42, 2, '500', '', '2023-07-26'),
(71, 48, 1, '100', '', '2023-07-26'),
(72, 49, 1, '50', '', '2023-07-26'),
(73, 50, 1, '100', '', '2023-07-26'),
(74, 50, 2, '1500', '', '2023-07-26'),
(75, 43, 1, '100', '', '2023-07-26'),
(76, 51, 1, '200', '', '2023-07-26'),
(77, 54, 1, '60', '', '2023-07-26'),
(78, 58, 1, '28', '', '2023-07-26'),
(79, 65, 1, '5', '', '2023-07-26'),
(80, 65, 2, '500', '', '2023-07-26'),
(87, 67, 1, '41', '', '2024-04-26'),
(88, 69, 1, '24', '', '2024-04-26'),
(89, 70, 1, '56', '', '2024-04-26'),
(90, 71, 1, '63', '', '2024-04-26'),
(91, 83, 1, '100', '', '2024-04-26'),
(92, 85, 1, '1', '', '2024-04-26'),
(93, 85, 2, '1', '', '2024-04-26'),
(94, 88, 1, '40', '', '2024-05-14'),
(95, 88, 2, '360', '', '2024-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_customer` int NOT NULL DEFAULT '0',
  `billing` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `id_services` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `id_products` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `barbero` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `monto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `detalle` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `estado` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `metodo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `abono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `tasa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `fecha` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `usuario`, `id_customer`, `billing`, `id_services`, `id_products`, `barbero`, `monto`, `detalle`, `estado`, `metodo`, `abono`, `tasa`, `fecha`) VALUES
(3, '1', 24, '992472958', '0', '0', '', '53', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos_pago`
--

CREATE TABLE `historicos_pago` (
  `idhistorico` int NOT NULL,
  `idmetodo` int NOT NULL,
  `monto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha` date NOT NULL,
  `idservidor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `historicos_pago`
--

INSERT INTO `historicos_pago` (`idhistorico`, `idmetodo`, `monto`, `fecha`, `idservidor`) VALUES
(33, 1, '1', '2024-03-06', 1),
(103, 5, '1.69', '2024-04-24', 20),
(105, 5, '7.99', '2024-05-14', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `idmetodo` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `unidad` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`idmetodo`, `nombre`, `unidad`) VALUES
(1, 'Efectivo', 'usd'),
(2, 'Bs Pago Movil', 'bs'),
(4, 'Binance', 'usd'),
(5, 'Zelle', 'usd'),
(6, 'Banesco Panama', 'usd'),
(7, 'Efectivo Bolivar ', 'bs'),
(8, 'Punto de Venta', 'bs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones_clientes`
--

CREATE TABLE `operaciones_clientes` (
  `IDoperaciones` int NOT NULL,
  `idcliente` int NOT NULL,
  `fecha` varchar(25) NOT NULL,
  `invoice` int NOT NULL,
  `aplicado` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `operaciones_clientes`
--

INSERT INTO `operaciones_clientes` (`IDoperaciones`, `idcliente`, `fecha`, `invoice`, `aplicado`, `status`) VALUES
(11, 42, '14-02-2024', 78, '-13', 'restante'),
(18, 48, '26-02-2024', 85, '1', 'abono');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_pago`
--

CREATE TABLE `recibos_pago` (
  `idrecibo` int NOT NULL,
  `idservidor` int NOT NULL,
  `monto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `saldo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sueldo` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `id_metodo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `fecha_Creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `recibos_pago`
--

INSERT INTO `recibos_pago` (`idrecibo`, `idservidor`, `monto`, `saldo`, `sueldo`, `id_metodo`, `fecha_desde`, `fecha_hasta`, `fecha_Creacion`) VALUES
(9, 20, '27.99', '343', '0', '0', '2024-05-01', '2024-05-14', '2024-05-14'),
(10, 1, '100', '143', '0', '0', '2024-05-01', '2024-05-14', '2024-05-14'),
(11, 1, '100', '143', '200', '0', '2024-05-01', '2024-05-14', '2024-05-14'),
(12, 20, '27.99', '343', '0', '0', '2024-05-01', '2024-05-14', '2024-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_adicional`
--

CREATE TABLE `servicios_adicional` (
  `idservicioadicional` int NOT NULL,
  `id_billing` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_metodo` int NOT NULL,
  `monto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `detalles` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `servicios_adicional`
--

INSERT INTO `servicios_adicional` (`idservicioadicional`, `id_billing`, `id_usuario`, `id_metodo`, `monto`, `detalles`) VALUES
(6, 50, 3, 1, '30', ''),
(7, 55, 1, 1, '12', ''),
(8, 56, 1, 1, '5', ''),
(9, 65, 1, 1, '10', ''),
(10, 85, 1, 1, '20', ''),
(12, 88, 3, 1, '24', 'testo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_adicional_interno`
--

CREATE TABLE `servicios_adicional_interno` (
  `idservicioadicionalintern` int NOT NULL,
  `intern` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_metodo` int NOT NULL,
  `monto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `detalles` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `servicios_adicional_interno`
--

INSERT INTO `servicios_adicional_interno` (`idservicioadicionalintern`, `intern`, `id_usuario`, `id_metodo`, `monto`, `detalles`) VALUES
(2, 1, 1, 1, '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasabs`
--

CREATE TABLE `tasabs` (
  `id_tasa` int NOT NULL,
  `fecha_creacion` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `monto_bcv` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `monto_paral` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tasabs`
--

INSERT INTO `tasabs` (`id_tasa`, `fecha_creacion`, `monto_bcv`, `monto_paral`) VALUES
(1, '12.01.24', '40', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int NOT NULL,
  `AdminName` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `UserName` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `Role`) VALUES
(1, 'Administrador', 'admin', 7898799798, 'msevillab@cweb.com', '21232f297a57a5a743894a0e4a801fc3', '2019-07-25 06:21:50', 'admin'),
(3, 'pingudev', 'pingudev', 123456, 'administrativo3@onserviceve.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-14 19:50:53', 'manager'),
(20, 'barbero1', 'barbero1', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2023-10-20 13:13:59', 'servidor'),
(21, 'rodney', 'rodney', 123, '123', '81dc9bdb52d04dc20036dbd8313ed055', '2023-12-07 04:34:25', 'servidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedproducts`
--

CREATE TABLE `tblassignedproducts` (
  `id_assigned` int NOT NULL,
  `invoice` int NOT NULL,
  `id_products` int NOT NULL,
  `cantidad` int NOT NULL,
  `monto` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblassignedproducts`
--

INSERT INTO `tblassignedproducts` (`id_assigned`, `invoice`, `id_products`, `cantidad`, `monto`) VALUES
(28, 992472958, 8, 1, '10'),
(37, 237544137, 12, 1, ''),
(38, 755135508, 12, 1, '1.5'),
(39, 682007570, 12, 1, '1.5'),
(40, 440488161, 9, 1, ''),
(41, 557968476, 9, 1, ''),
(42, 21, 5, 1, ''),
(44, 23, 11, 1, ''),
(45, 24, 5, 0, ''),
(46, 28, 8, 2, ''),
(48, 29, 8, 3, ''),
(49, 26, 9, 2, ''),
(50, 31, 10, 1, ''),
(51, 32, 7, 1, ''),
(52, 33, 9, 1, ''),
(57, 27, 8, 2, ''),
(58, 34, 7, 1, ''),
(59, 34, 8, 1, ''),
(62, 34, 12, 1, '1.5'),
(67, 35, 17, 1, '10'),
(68, 37, 17, 1, '10'),
(69, 30, 17, 3, '10'),
(70, 39, 17, 1, '10'),
(71, 41, 17, 1, '10'),
(74, 42, 17, 1, '10'),
(75, 42, 17, 1, '10'),
(76, 48, 17, 1, '10'),
(81, 49, 17, 1, '10'),
(82, 50, 17, 5, '10'),
(83, 43, 17, 2, '10'),
(84, 51, 17, 2, '10'),
(85, 53, 17, 10, '100'),
(86, 52, 17, 10, '100'),
(87, 54, 17, 2, '20'),
(88, 55, 17, 2, '10'),
(90, 6, 17, 1, '10'),
(91, 61, 17, 1, '10'),
(92, 63, 17, 1, '10'),
(93, 63, 21, 1, '1'),
(94, 56, 17, 1, '10'),
(95, 65, 17, 1, '10'),
(96, 66, 22, 3, '15'),
(97, 85, 17, 1, '10'),
(99, 88, 22, 3, '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedproducts_intern`
--

CREATE TABLE `tblassignedproducts_intern` (
  `id_assignedintern` int NOT NULL,
  `intern` int NOT NULL,
  `id_products` int NOT NULL,
  `cantidad` int NOT NULL,
  `monto` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblassignedproducts_intern`
--

INSERT INTO `tblassignedproducts_intern` (`id_assignedintern`, `intern`, `id_products`, `cantidad`, `monto`) VALUES
(4, 1, 17, 1, '10'),
(5, 2, 17, 3, '30'),
(7, 6, 17, 2, '10'),
(8, 7, 19, 2, '4'),
(9, 10, 22, 1, '5'),
(10, 10, 21, 2, '2'),
(11, 10, 17, 1, '10'),
(12, 11, 17, 1, '10'),
(13, 10, 17, 10, '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedservice`
--

CREATE TABLE `tblassignedservice` (
  `idservicioasignado` int NOT NULL,
  `invoice` int NOT NULL,
  `servicio` int NOT NULL,
  `idbarbero` int NOT NULL,
  `cantidad` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `monto` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `detalle` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `propina` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblassignedservice`
--

INSERT INTO `tblassignedservice` (`idservicioasignado`, `invoice`, `servicio`, `idbarbero`, `cantidad`, `monto`, `detalle`, `propina`) VALUES
(13, 29, 20, 5, '1', '', '0', '0'),
(14, 29, 23, 9, '1', '', '0', '0'),
(15, 32, 20, 8, '1', '', '0', '0'),
(16, 33, 20, 3, '1', '', '0', '0'),
(20, 20, 20, 3, '1', '', '0', '0'),
(21, 30, 20, 3, '1', '', '0', '0'),
(24, 30, 20, 3, '1', '', '0', '0'),
(25, 27, 20, 3, '1', '', '0', '0'),
(27, 34, 20, 3, '1', '', 'otra prueba', '10'),
(29, 35, 23, 17, '1', '', '0', '0'),
(30, 35, 20, 17, '1', '', '0', '0'),
(31, 36, 20, 18, '1', '', 'REGALO', '30'),
(32, 36, 22, 17, '1', '', '', '40'),
(33, 23, 20, 21, '1', '', 'prueba', '30'),
(34, 23, 26, 22, '1', '', '20 pago movil', '20'),
(35, 39, 23, 17, '1', '', 'porque esta chevere', '10'),
(37, 41, 20, 17, '1', '', '0', '0'),
(38, 42, 20, 23, '1', '', '0', '0'),
(40, 48, 20, 17, '1', '', '', '10'),
(41, 48, 20, 17, '1', '', '', '30'),
(45, 49, 20, 17, '1', '', '', '10'),
(46, 50, 22, 17, '1', '', '', '10'),
(47, 50, 20, 17, '1', '', '', '10'),
(48, 43, 20, 17, '1', '', '0', '0'),
(49, 51, 26, 17, '1', '', '0', '0'),
(59, 53, 20, 17, '1', '13', '0', '0'),
(60, 55, 20, 17, '1', '13', 'regalo', '5'),
(62, 58, 20, 17, '1', '13', '0', '0'),
(63, 58, 23, 23, '1', '10', '0', '0'),
(64, 58, 28, 17, '1', '5', '0', '0'),
(65, 56, 20, 17, '1', '10', '0', '0'),
(66, 6, 20, 23, '1', '15', '0', '0'),
(68, 54, 20, 23, '1', '13', '', '25'),
(69, 61, 20, 17, '1', '13', '0', '0'),
(70, 61, 20, 23, '1', '13', '0', '0'),
(71, 61, 24, 23, '1', '20', '0', '0'),
(73, 63, 20, 23, '1', '13', '0', '0'),
(74, 63, 24, 17, '1', '10', '0', '0'),
(75, 56, 24, 17, '1', '10', '0', '0'),
(78, 65, 20, 17, '1', '13', '0', '0'),
(79, 67, 20, 17, '1', '13', '0', '0'),
(80, 67, 20, 23, '1', '13', '0', '0'),
(81, 75, 20, 17, '1', '13', '0', '0'),
(82, 77, 20, 17, '1', '25', '0', '0'),
(83, 79, 20, 17, '1', '30', '0', '0'),
(84, 85, 20, 17, '1', '13', '0', '0'),
(86, 88, 23, 23, '1', '10', '0', '0'),
(88, 87, 20, 23, '1', '100', '', '25'),
(89, 89, 20, 23, '1', '13', '0', '0'),
(90, 90, 20, 23, '1', '12', '', '32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedservice_intern`
--

CREATE TABLE `tblassignedservice_intern` (
  `idserviciointerno` int NOT NULL,
  `intern` int NOT NULL,
  `servicio` int NOT NULL,
  `idbarbero` int NOT NULL,
  `cantidad` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `monto` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `detalle` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `propina` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblassignedservice_intern`
--

INSERT INTO `tblassignedservice_intern` (`idserviciointerno`, `intern`, `servicio`, `idbarbero`, `cantidad`, `monto`, `detalle`, `propina`) VALUES
(1, 1, 20, 17, '1', '14', '0', '0'),
(2, 2, 20, 17, '1', '13', '0', '0'),
(4, 6, 20, 17, '1', '13', '0', '0'),
(5, 7, 20, 17, '1', '13', '0', '0'),
(6, 10, 20, 17, '1', '13', '0', '0'),
(7, 11, 20, 17, '1', '13', '0', '0'),
(8, 10, 20, 17, '1', '13', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblbarber`
--

CREATE TABLE `tblbarber` (
  `idbarber` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `porcentaje` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `pass` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Codigo` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '-',
  `Puesto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '-',
  `Telefono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblbarber`
--

INSERT INTO `tblbarber` (`idbarber`, `nombre`, `porcentaje`, `usuario`, `pass`, `Codigo`, `Puesto`, `Telefono`) VALUES
(17, 'rodney', '20', 'rodney', '1234', '4002', '3', '04127968644'),
(23, 'barbero1', '13', '', '1234', '34', '3', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfig`
--

CREATE TABLE `tblconfig` (
  `id_empresa` int NOT NULL,
  `nombre_empresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `razon_social` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `direccion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `telefono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `NControl` int DEFAULT NULL,
  `NControlInterno` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblconfig`
--

INSERT INTO `tblconfig` (`id_empresa`, `nombre_empresa`, `razon_social`, `direccion`, `telefono`, `NControl`, `NControlInterno`) VALUES
(1, 'Barberia Activo C.A', '123456', 'maracaibo', '12345678', 91, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int NOT NULL,
  `Name` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `assignedbarber` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Gender` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `cedula` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Details` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `assignedBy` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `assignedbarber`, `Email`, `MobileNumber`, `Gender`, `cedula`, `Details`, `assignedBy`, `CreationDate`, `UpdationDate`) VALUES
(42, 'andres molero', '0', '0', 0, 'eventual', '25673277', '0', '', '2023-10-20 13:00:16', NULL),
(43, 'Maria', '0', '0', 0, 'eventual', '23456789', '0', '', '2023-10-20 13:18:56', NULL),
(44, 'Yaderling Bravo', '0', '0', 0, 'interno', '1234567', '0', '', '2023-10-20 17:24:02', NULL),
(45, 'astolfo', '0', '0', 0, 'eventual', '123444', '0', '', '2023-10-20 17:36:48', NULL),
(46, 'giovanna', '0', '0', 0, 'eventual', '123456', '0', '', '2023-11-27 02:17:48', NULL),
(47, 'jhon chacon', '0', '0', 0, 'eventual', '18875252', '0', '', '2023-12-06 15:53:40', NULL),
(48, 'Euro moronta', '0', '0', 0, 'eventual', '5824272', '0', '', '2024-01-03 19:51:35', NULL),
(49, 'maryory', '0', '0', 0, 'eventual', '1234566', '0', '', '2024-01-10 02:30:22', NULL),
(50, 'Testo', '0', '0', 0, 'eventual', '123456', '0', 'admin', '2024-02-20 12:16:10', NULL),
(51, 'jhon chacon', '0', '0', 0, 'eventual', '234561', '0', 'admin', '2024-02-20 12:16:54', NULL),
(52, 'David Ortega', '0', '0', 0, 'eventual', '123456', '0', 'admin', '2024-02-22 00:40:27', NULL),
(53, 'palito', '0', '0', 0, 'eventual', '12345', '0', '', '2024-02-22 01:00:00', NULL),
(54, 'palito', '0', '0', 0, 'eventual', '12345', '0', '1', '2024-02-22 01:01:22', NULL),
(55, 'palito', '0', '0', 0, 'eventual', '12345', '0', '1', '2024-02-22 01:04:25', NULL),
(56, 'maria', '0', '0', 0, 'eventual', '12345', '0', '1', '2024-02-22 01:07:50', NULL),
(57, 'julio', '0', '0', 0, 'interno', '123', '0', '1', '2024-02-22 01:08:12', NULL),
(58, 'julio', '0', '0', 0, 'eventual', '123', '0', '3', '2024-02-26 15:54:44', NULL),
(59, 'David Ortega', '0', '0', 0, 'eventual', '25673277', '0', '1', '2024-03-20 01:30:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int NOT NULL,
  `Userid` int DEFAULT NULL,
  `ServiceId` int DEFAULT NULL,
  `AssignedUserID` int NOT NULL,
  `BillingId` int DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `AssignedUserID`, `BillingId`, `PostingDate`, `estado`) VALUES
(94, 36, 23, 1, 23, '2023-07-19 18:14:37', 'pagado'),
(103, 38, 20, 3, 29, '2023-07-20 14:59:30', 'pagado'),
(104, 38, NULL, 1, 30, '2023-07-25 18:35:35', 'pagado'),
(105, 32, NULL, 1, 31, '2023-07-26 14:20:42', 'pagado'),
(106, 38, NULL, 3, 32, '2023-07-26 17:03:55', 'pagado'),
(107, 25, NULL, 1, 33, '2023-07-26 17:25:45', 'pagado'),
(108, 24, NULL, 3, 34, '2023-08-01 15:26:54', 'pagado'),
(109, 36, NULL, 1, 35, '2023-08-18 14:40:02', 'pagado'),
(110, 39, NULL, 1, 36, '2023-08-18 15:10:24', 'pagado'),
(111, 39, NULL, 1, 37, '2023-08-18 15:10:36', 'pagado'),
(112, 39, NULL, 3, 38, '2023-09-15 15:42:22', 'pagado'),
(113, 40, NULL, 1, 39, '2023-10-17 00:07:28', 'pagado'),
(114, 40, NULL, 1, 40, '2023-10-17 00:27:52', 'pendiente'),
(115, 42, NULL, 1, 41, '2023-10-20 13:02:27', 'pagado'),
(116, 43, NULL, 3, 42, '2023-10-20 13:18:59', 'pagado'),
(117, 42, NULL, 1, 43, '2023-10-20 17:12:50', 'pagado'),
(118, 43, NULL, 1, 44, '2023-10-20 17:20:11', 'anulado'),
(119, 43, NULL, 3, 45, '2023-10-20 17:22:31', 'anulado'),
(120, 43, NULL, 3, 46, '2023-10-20 17:22:53', 'anulado'),
(121, 44, NULL, 3, 47, '2023-10-20 17:24:30', 'anulado'),
(122, 44, NULL, 3, 48, '2023-10-20 17:24:46', 'pagado'),
(123, 45, NULL, 1, 49, '2023-10-20 17:36:49', 'pagado'),
(124, 42, NULL, 1, 50, '2023-10-27 17:36:11', 'pagado'),
(125, 42, NULL, 1, 51, '2023-10-27 18:48:03', 'pagado'),
(126, 42, NULL, 1, 52, '2023-10-27 18:53:39', 'anulado'),
(127, 46, NULL, 1, 53, '2023-11-27 02:17:50', 'pagado'),
(128, 46, NULL, 1, 54, '2023-11-27 16:10:12', 'anulado'),
(129, 47, NULL, 1, 55, '2023-12-06 15:53:43', 'pagado'),
(130, 47, NULL, 1, 56, '2023-12-06 15:55:05', 'anulado'),
(131, 47, NULL, 1, 57, '2023-12-07 01:33:21', 'anulado'),
(132, 45, NULL, 3, 58, '2023-12-07 15:32:08', 'pagado'),
(133, 47, NULL, 3, 59, '2023-12-08 03:33:45', 'anulado'),
(134, 47, NULL, 3, 60, '2023-12-08 03:34:50', 'anulado'),
(135, 47, NULL, 1, 61, '2023-12-30 01:44:37', 'pagado'),
(136, 42, NULL, 1, 62, '2024-01-03 19:50:04', 'anulado'),
(137, 48, NULL, 1, 63, '2024-01-03 19:51:39', 'pagado'),
(138, 48, NULL, 1, 64, '2024-01-03 20:09:29', 'anulado'),
(139, 49, NULL, 1, 65, '2024-01-10 02:30:24', 'pagado'),
(140, 49, NULL, 1, 66, '2024-01-12 01:52:54', 'pagado'),
(141, 49, NULL, 1, 67, '2024-01-12 03:21:45', 'pagado'),
(142, 49, NULL, 3, 68, '2024-01-12 03:44:13', 'anulado'),
(143, 48, NULL, 1, 69, '2024-01-12 14:21:30', 'pagado'),
(144, 47, NULL, 1, 70, '2024-01-12 14:21:58', 'pagado'),
(145, 46, NULL, 1, 71, '2024-01-12 14:22:24', 'pagado'),
(146, 45, NULL, 1, 72, '2024-01-12 14:23:11', 'anulado'),
(147, 44, NULL, 1, 73, '2024-01-12 14:23:19', 'anulado'),
(148, 43, NULL, 1, 74, '2024-01-12 14:23:29', 'anulado'),
(149, 42, NULL, 1, 75, '2024-01-12 14:23:35', 'pagado'),
(150, 49, NULL, 1, 76, '2024-02-14 13:48:07', 'pendiente'),
(151, 42, NULL, 1, 77, '2024-02-14 13:48:13', 'pagado'),
(152, 42, NULL, 1, 78, '2024-02-14 18:05:21', 'pagado'),
(153, 42, NULL, 1, 79, '2024-02-14 18:20:55', 'pagado'),
(154, 42, NULL, 1, 80, '2024-02-14 18:21:19', 'pendiente'),
(155, 55, NULL, 1, 81, '2024-02-22 01:04:25', 'pendiente'),
(156, 56, NULL, 1, 82, '2024-02-22 01:07:50', 'anulado'),
(157, 57, NULL, 1, 83, '2024-02-22 01:08:12', 'pagado'),
(158, 57, NULL, 1, 84, '2024-02-22 01:23:03', 'pendiente'),
(159, 48, NULL, 1, 85, '2024-02-22 13:35:22', 'pendiente'),
(160, 55, NULL, 1, 86, '2024-02-23 19:43:26', 'pendiente'),
(161, 58, NULL, 3, 87, '2024-02-26 15:54:44', 'pagado'),
(162, 59, NULL, 1, 88, '2024-03-20 01:30:29', 'pagado'),
(163, 59, NULL, 1, 89, '2024-05-15 14:20:29', 'pagado'),
(164, 59, NULL, 1, 90, '2024-05-15 15:14:15', 'pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int NOT NULL,
  `PageType` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `PageTitle` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `PageDescription` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `Email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'Acerca de', '                Servicio de SPA&nbsp;', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contacto', '                                                        Mexico City', 'example@example.com', 573162430081, NULL, '08:00 am to 6:30 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducts`
--

CREATE TABLE `tblproducts` (
  `idproducts` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `cantidad` int NOT NULL,
  `precio` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `deposito` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblproducts`
--

INSERT INTO `tblproducts` (`idproducts`, `nombre`, `cantidad`, `precio`, `deposito`) VALUES
(17, 'dorito', -62, '10', 'Belleza'),
(20, 'M&M', 10, '4', 'Snack'),
(21, 'Agua Mineral', 8, '1', 'Bebida'),
(22, 'Crema de Peinar', 3, '5', 'Belleza'),
(23, 'Pepsi', 30, '2', 'Bebida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int NOT NULL,
  `ServiceName` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Cost` int DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `Cost`, `CreationDate`) VALUES
(20, 'Corte', 13, '2021-11-01 16:28:07'),
(22, 'Barba', 12, '2023-05-17 15:35:32'),
(23, 'Manicure', 10, '2023-05-17 15:35:37'),
(24, 'Pedicure', 10, '2023-05-17 15:35:42'),
(25, 'Masaje', 30, '2023-05-17 15:35:47'),
(26, 'Rasurado', 30, '2023-05-17 15:35:51'),
(27, 'Depilacion', 5, '2023-05-17 15:35:57'),
(28, 'Peinado', 5, '2023-05-17 15:36:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `idtransac` int NOT NULL,
  `invoice` int NOT NULL,
  `monto_total` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `tasa_dia` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `monto_cancelado` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `saldo` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`idtransac`, `invoice`, `monto_total`, `tasa_dia`, `estatus`, `monto_cancelado`, `saldo`, `fecha_creacion`) VALUES
(1, 29, '53', '28', 'Totalizado', '53', '', '2023-07-26'),
(2, 28, '20', '28', 'Totalizado', '20', '', '2023-07-26'),
(8, 35, '33', '28', 'Abono', '33', '', '2023-07-26'),
(9, 37, '10', '28', 'Restante', '10', '', '2023-07-26'),
(10, 29, '0', '28', 'Totalizado', '0', '', '2023-07-26'),
(11, 36, '25', '28', 'Totalizado', '25', '', '2023-07-26'),
(12, 30, '30', '28', 'Totalizado', '30', '', '2023-07-26'),
(13, 23, '43', '28', 'Totalizado', '43', '', '2023-07-26'),
(14, 39, '20', '28', 'Restante', '20', '', '2023-07-26'),
(15, 38, '0', '28', 'Totalizado', '0', '', '2023-07-26'),
(16, 41, '23', '28', 'Totalizado', '23', '', '2023-07-26'),
(17, 42, '33', '37.10', 'Abono', '33', '', '2023-07-26'),
(22, 51, '50', '37.10', 'Abono', '50', '150', '2023-07-26'),
(23, 53, '113', '37.10', 'Restante', '113', '-113', '2023-11-27'),
(24, 55, '50', '37.10', 'Restante', '50', '-50', '2023-11-27'),
(25, 58, '28', '37.10', 'Totalizado', '28', '-0', '2023-11-27'),
(26, 6, '25', '37.10', 'Restante', '25', '-25', '2023-11-27'),
(27, 61, '56', '37.10', 'Restante', '56', '-56', '2023-11-27'),
(28, 63, '34', '37.10', 'Restante', '34', '-34', '2024-01-03'),
(29, 65, '33', '37.10', 'Restante', '33', '-14.52', '2024-01-03'),
(30, 67, '41', '40', 'Abono', '26', '15', '2024-01-03'),
(31, 66, '15', '40', 'Restante', '15', '-15', '2024-01-03'),
(32, 69, '24', '40', 'Abono', '0', '24', '2024-01-03'),
(33, 70, '56', '40', 'Abono', '0', '56', '2024-01-03'),
(34, 71, '63', '40', 'Abono', '0', '63', '2024-01-03'),
(35, 75, '13', '40', 'Restante', '13', '-13', '2024-02-03'),
(36, 78, '13', '40', 'Totalizado', '0', '0', '2024-02-13'),
(37, 77, '25', '40', 'Restante', '25', '-25', '2024-02-14'),
(38, 79, '30', '40', 'Restante', '30', '-30', '2024-02-14'),
(39, 83, '0', '40', 'Abono', '0', '100', '2024-02-22'),
(40, 88, '49', '40', 'Totalizado', '49', '0', '2024-05-14'),
(41, 87, '125', '40', 'Restante', '125', '-125', '2024-05-14'),
(42, 89, '13', '40', 'Restante', '13', '-13', '2024-05-15'),
(43, 90, '44', '40', 'Restante', '44', '-44', '2024-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales`
--

CREATE TABLE `vales` (
  `idvale` int NOT NULL,
  `idbarber` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `monto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `detalle` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `metodo_pago` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `vales`
--

INSERT INTO `vales` (`idvale`, `idbarber`, `monto`, `detalle`, `fecha`, `metodo_pago`, `estado`) VALUES
(4, '17', '50', 'Prueba', '2023-08-18', '1', 'Pagado'),
(7, '17', '25', 'test', '2023-12-08', '1', 'pendiente'),
(12, '20', '20', '', '2024-01-11', '2', 'Pagado'),
(13, '1', '120', 'test', '2024-05-14', '2', 'pendiente'),
(14, '20', '200', '', '2024-05-14', '1', 'pendiente'),
(15, '20', '25', 'pruebas', '2024-05-15', '1', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cierre_diario`
--
ALTER TABLE `cierre_diario`
  ADD PRIMARY KEY (`id_cierre`);

--
-- Indices de la tabla `consumo_fondo`
--
ALTER TABLE `consumo_fondo`
  ADD PRIMARY KEY (`id_consumo`);

--
-- Indices de la tabla `consumo_interno`
--
ALTER TABLE `consumo_interno`
  ADD PRIMARY KEY (`idconsumo`);

--
-- Indices de la tabla `cuentas_cobrar`
--
ALTER TABLE `cuentas_cobrar`
  ADD PRIMARY KEY (`idcuenta`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `historicos_pago`
--
ALTER TABLE `historicos_pago`
  ADD PRIMARY KEY (`idhistorico`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`idmetodo`);

--
-- Indices de la tabla `operaciones_clientes`
--
ALTER TABLE `operaciones_clientes`
  ADD PRIMARY KEY (`IDoperaciones`);

--
-- Indices de la tabla `recibos_pago`
--
ALTER TABLE `recibos_pago`
  ADD PRIMARY KEY (`idrecibo`);

--
-- Indices de la tabla `servicios_adicional`
--
ALTER TABLE `servicios_adicional`
  ADD PRIMARY KEY (`idservicioadicional`);

--
-- Indices de la tabla `servicios_adicional_interno`
--
ALTER TABLE `servicios_adicional_interno`
  ADD PRIMARY KEY (`idservicioadicionalintern`);

--
-- Indices de la tabla `tasabs`
--
ALTER TABLE `tasabs`
  ADD PRIMARY KEY (`id_tasa`);

--
-- Indices de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblassignedproducts`
--
ALTER TABLE `tblassignedproducts`
  ADD PRIMARY KEY (`id_assigned`);

--
-- Indices de la tabla `tblassignedproducts_intern`
--
ALTER TABLE `tblassignedproducts_intern`
  ADD PRIMARY KEY (`id_assignedintern`);

--
-- Indices de la tabla `tblassignedservice`
--
ALTER TABLE `tblassignedservice`
  ADD PRIMARY KEY (`idservicioasignado`);

--
-- Indices de la tabla `tblassignedservice_intern`
--
ALTER TABLE `tblassignedservice_intern`
  ADD PRIMARY KEY (`idserviciointerno`);

--
-- Indices de la tabla `tblbarber`
--
ALTER TABLE `tblbarber`
  ADD PRIMARY KEY (`idbarber`);

--
-- Indices de la tabla `tblconfig`
--
ALTER TABLE `tblconfig`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `BillingId` (`BillingId`);

--
-- Indices de la tabla `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`idproducts`);

--
-- Indices de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`idtransac`);

--
-- Indices de la tabla `vales`
--
ALTER TABLE `vales`
  ADD PRIMARY KEY (`idvale`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cierre_diario`
--
ALTER TABLE `cierre_diario`
  MODIFY `id_cierre` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consumo_fondo`
--
ALTER TABLE `consumo_fondo`
  MODIFY `id_consumo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `consumo_interno`
--
ALTER TABLE `consumo_interno`
  MODIFY `idconsumo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cuentas_cobrar`
--
ALTER TABLE `cuentas_cobrar`
  MODIFY `idcuenta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `historicos_pago`
--
ALTER TABLE `historicos_pago`
  MODIFY `idhistorico` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `idmetodo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `operaciones_clientes`
--
ALTER TABLE `operaciones_clientes`
  MODIFY `IDoperaciones` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `recibos_pago`
--
ALTER TABLE `recibos_pago`
  MODIFY `idrecibo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `servicios_adicional`
--
ALTER TABLE `servicios_adicional`
  MODIFY `idservicioadicional` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `servicios_adicional_interno`
--
ALTER TABLE `servicios_adicional_interno`
  MODIFY `idservicioadicionalintern` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tasabs`
--
ALTER TABLE `tasabs`
  MODIFY `id_tasa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tblassignedproducts`
--
ALTER TABLE `tblassignedproducts`
  MODIFY `id_assigned` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `tblassignedproducts_intern`
--
ALTER TABLE `tblassignedproducts_intern`
  MODIFY `id_assignedintern` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblassignedservice`
--
ALTER TABLE `tblassignedservice`
  MODIFY `idservicioasignado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `tblassignedservice_intern`
--
ALTER TABLE `tblassignedservice_intern`
  MODIFY `idserviciointerno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblbarber`
--
ALTER TABLE `tblbarber`
  MODIFY `idbarber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tblconfig`
--
ALTER TABLE `tblconfig`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `idproducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `idtransac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `vales`
--
ALTER TABLE `vales`
  MODIFY `idvale` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
