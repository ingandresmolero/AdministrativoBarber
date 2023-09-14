-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-09-2023 a las 17:33:59
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
-- Base de datos: `barberia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_cobrar`
--

CREATE TABLE `cuentas_cobrar` (
  `idcuenta` int NOT NULL,
  `invoice` int NOT NULL,
  `idmetodo` int NOT NULL,
  `monto` varchar(45) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `fecha_creacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cuentas_cobrar`
--

INSERT INTO `cuentas_cobrar` (`idcuenta`, `invoice`, `idmetodo`, `monto`, `detalle`, `fecha_creacion`) VALUES
(8, 28, 1, '20', '', '26/07/2023'),
(9, 31, 1, '2', '', '26/07/2023'),
(10, 32, 4, '23', '', '26/07/2023'),
(12, 27, 1, '15', '', '01/08/2023'),
(30, 34, 2, '17', '', '14/08/2023'),
(31, 34, 1, '10', '', '14/08/2023'),
(32, 34, 2, '7', '', '14/08/2023'),
(33, 35, 2, '32', 'ref 1234', '18/08/2023'),
(34, 35, 1, '20', 'deja en fondo', '18/08/2023'),
(55, 36, 1, '20', '', '06/09/2023'),
(56, 36, 2, '140', '', '06/09/2023'),
(57, 30, 2, '840', '', '06/09/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `id_customer` int NOT NULL DEFAULT '0',
  `billing` varchar(45) NOT NULL DEFAULT '0',
  `id_services` varchar(25) NOT NULL DEFAULT '0',
  `id_products` varchar(25) NOT NULL DEFAULT '0',
  `barbero` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `monto` varchar(45) NOT NULL DEFAULT '0',
  `detalle` varchar(45) NOT NULL DEFAULT '0',
  `estado` varchar(45) NOT NULL DEFAULT '0',
  `metodo` varchar(45) NOT NULL DEFAULT '0',
  `abono` varchar(45) NOT NULL DEFAULT '0',
  `tasa` varchar(45) NOT NULL DEFAULT '0',
  `fecha` varchar(45) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `usuario`, `id_customer`, `billing`, `id_services`, `id_products`, `barbero`, `monto`, `detalle`, `estado`, `metodo`, `abono`, `tasa`, `fecha`) VALUES
(3, '1', 24, '992472958', '0', '0', '', '53', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `idmetodo` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `unidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`idmetodo`, `nombre`, `unidad`) VALUES
(1, 'Efectivo', 'usd'),
(2, 'Bs Pago Movil', 'bs'),
(4, 'Binance', 'usd'),
(5, 'Zelle', 'usd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasabs`
--

CREATE TABLE `tasabs` (
  `id_tasa` int NOT NULL,
  `fecha_creacion` varchar(20) NOT NULL,
  `monto_bcv` varchar(20) NOT NULL,
  `monto_paral` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tasabs`
--

INSERT INTO `tasabs` (`id_tasa`, `fecha_creacion`, `monto_bcv`, `monto_paral`) VALUES
(1, '13.06.23', '28', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `Role`) VALUES
(1, 'Administrador', 'admin', 7898799798, 'msevillab@cweb.com', '21232f297a57a5a743894a0e4a801fc3', '2019-07-25 06:21:50', 'admin'),
(3, 'pingudev', 'pingudev', 123456, 'administrativo3@onserviceve.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-14 19:50:53', 'manager'),
(4, 'andres', 'armo', 424610413, 'ing.andresmolero@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-06-08 13:05:18', 'servidor'),
(14, 'FERNANDO', '01', NULL, NULL, '1234', '2023-08-18 15:16:52', 'usuario'),
(15, 'armo', 'armo', NULL, NULL, '1234', '2023-09-06 18:20:11', 'usuario'),
(16, 'pingu', 'pingu', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-06 18:22:41', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int NOT NULL,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` bigint DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Services`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(8, '496532914', 'Roman Garcia', 'rgarcia@cweb.com', 3211076843, '1/23/2020', '6:30pm', 'Fruit Facial', '2020-01-23 23:50:09', 'Excelente Cliente', '1', '2020-01-23 23:52:03'),
(9, '304302609', 'Lucia grajales', 'lgrajales@cweb.com', 3065439781, '1/24/2020', '9:00am', 'Fruit Facial', '2020-01-24 13:56:31', 'La srta realizÃ³ el proceso correspondiente.', '1', '2020-01-24 13:57:43'),
(10, '604686038', 'JUAN ARANGO', 'JARANGO@CWEB.COM', 3147641979, '1/24/2020', '1:00pm', 'Masaje Facial', '2020-01-24 14:54:02', 'Excelente cliente, recomendado', '1', '2020-01-24 14:54:57'),
(11, '932355891', 'Dilan cabal', 'DCABAL@CWEB.COM', 3178674931, '1/24/2020', '10:30am', 'Masaje Facial', '2020-01-24 15:11:49', 'Se realizÃ³ el pedido a satisfacciÃ³n.', '1', '2020-01-24 15:12:54'),
(12, '182457009', 'Juan Gallego', 'JGALLEGO@CWEB.COM', 3163798467, '1/24/2020', '1:30am', 'Masaje Facial', '2020-01-24 16:20:12', 'Acepto', '1', '2020-01-24 16:21:20'),
(13, '958882735', 'Rocio Calam', 'rcalam@cweb.com', 3010123201, '1/24/2020', '10:30pm', 'Layer Haircut', '2020-01-24 16:43:01', 'Se le cobra', '2', '2020-01-24 16:44:55'),
(14, '503526704', 'jhgjhg', 'kjghd@hotmail.com', 956594, '10/20/2021', '1:00am', 'Manicure de Lujo', '2021-10-27 21:58:06', 'rth', '1', '2021-10-27 21:58:25'),
(15, '647681869', 'prueba', 'p@hotmail.com', 964654654, '11/4/2021', '11:30am', 'prueba', '2021-11-01 16:44:18', 'pendiente', '1', '2021-11-01 16:45:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedproducts`
--

CREATE TABLE `tblassignedproducts` (
  `id_assigned` int NOT NULL,
  `invoice` int NOT NULL,
  `id_products` int NOT NULL,
  `cantidad` int NOT NULL,
  `monto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(69, 30, 17, 3, '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedservice`
--

CREATE TABLE `tblassignedservice` (
  `idservicioasignado` int NOT NULL,
  `invoice` int NOT NULL,
  `servicio` int NOT NULL,
  `idbarbero` int NOT NULL,
  `cantidad` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `detalle` varchar(45) NOT NULL DEFAULT '0',
  `propina` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tblassignedservice`
--

INSERT INTO `tblassignedservice` (`idservicioasignado`, `invoice`, `servicio`, `idbarbero`, `cantidad`, `detalle`, `propina`) VALUES
(13, 29, 20, 5, '1', '0', '0'),
(14, 29, 23, 9, '1', '0', '0'),
(15, 32, 20, 8, '1', '0', '0'),
(16, 33, 20, 3, '1', '0', '0'),
(20, 20, 20, 3, '1', '0', '0'),
(21, 30, 20, 3, '1', '0', '0'),
(24, 30, 20, 3, '1', '0', '0'),
(25, 27, 20, 3, '1', '0', '0'),
(27, 34, 20, 3, '1', 'otra prueba', '10'),
(29, 35, 23, 17, '1', '0', '0'),
(30, 35, 20, 17, '1', '0', '0'),
(31, 36, 20, 18, '1', 'REGALO', '30'),
(32, 36, 22, 17, '1', '', '40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblbarber`
--

CREATE TABLE `tblbarber` (
  `idbarber` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `porcentaje` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Codigo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-',
  `Puesto` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-',
  `Telefono` varchar(45) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblbarber`
--

INSERT INTO `tblbarber` (`idbarber`, `nombre`, `porcentaje`, `usuario`, `pass`, `Codigo`, `Puesto`, `Telefono`) VALUES
(17, 'rodney', '0', 'rodney', '1234', '0', '0', '0'),
(18, 'FERNANDO', '15', '', '1234', '01', '01', '04246104132'),
(19, 'armo', '0', 'armo', '1234', '0', '0', '0'),
(20, 'pingu', '0', 'pingu', '81dc9bdb52d04dc20036dbd8313ed055', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfig`
--

CREATE TABLE `tblconfig` (
  `id_empresa` int NOT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `razon_social` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `NControl` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tblconfig`
--

INSERT INTO `tblconfig` (`id_empresa`, `nombre_empresa`, `razon_social`, `direccion`, `telefono`, `NControl`) VALUES
(1, 'Barberia Activo C.A', '123456', 'maracaibo', '12345678', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `assignedbarber` varchar(40) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Gender` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cedula` varchar(45) NOT NULL,
  `Details` mediumtext,
  `assignedBy` varchar(45) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `assignedbarber`, `Email`, `MobileNumber`, `Gender`, `cedula`, `Details`, `assignedBy`, `CreationDate`, `UpdationDate`) VALUES
(24, 'andres molero', 'Anthony', NULL, NULL, 'Interno', '', '', '1', '2023-06-12 12:48:40', NULL),
(25, 'Testo', 'Fernando', NULL, NULL, 'Eventual', '', '', '1', '2023-06-12 13:59:17', NULL),
(26, 'fernando', 'Pedro', NULL, NULL, 'Cortesia', '', '', '1', '2023-06-12 18:44:26', NULL),
(27, 'daybelin', 'Jose', NULL, NULL, 'Cortesia', '', '', '1', '2023-06-13 15:27:26', NULL),
(28, 'adrinka', 'Anthony', NULL, NULL, 'Eventual', '', '', '1', '2023-06-13 15:30:27', NULL),
(29, 'Kelly', 'Fernando', NULL, NULL, 'Cortesia', '', '', '1', '2023-06-13 18:28:50', NULL),
(30, 'Fer', 'Fernando', NULL, NULL, 'Interno', '', '', '1', '2023-06-13 18:36:41', NULL),
(31, 'maryory', 'Pedro', NULL, NULL, 'Eventual', '', '', '1', '2023-06-30 01:59:18', NULL),
(32, 'andres', '3', '0', 0, 'eventual', '25673277', '0', '1', '2023-07-19 15:10:36', NULL),
(33, 'Sofia', 'Pedro', '0', 0, 'vip', '29000', '0', '1', '2023-07-19 15:13:18', NULL),
(34, 'Adrinka', 'Belkis', '0', 0, 'interno', '', '0', '1', '2023-07-19 15:15:18', NULL),
(35, 'David Ortega', '0', '0', 0, 'interno', '123456', '0', '1', '2023-07-19 15:34:39', NULL),
(36, 'Nestor Gutierrez', '0', '0', 0, 'cortesia', '19576368', '0', '', '2023-07-19 15:44:39', NULL),
(37, 'Luis Duran', '0', '0', 0, 'eventual', '1234567', '0', '', '2023-07-20 14:24:56', NULL),
(38, 'martia', '0', '0', 0, 'interno', '123456', '0', '', '2023-07-20 14:43:00', NULL),
(39, 'peche', '0', '0', 0, 'interno', '12804410', '0', '', '2023-08-18 15:10:17', NULL);

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
  `estado` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `AssignedUserID`, `BillingId`, `PostingDate`, `estado`) VALUES
(94, 36, 23, 1, 23, '2023-07-19 18:14:37', 'pendiente'),
(103, 38, 20, 3, 29, '2023-07-20 14:59:30', 'pagado'),
(104, 38, NULL, 1, 30, '2023-07-25 18:35:35', 'pagado'),
(105, 32, NULL, 1, 31, '2023-07-26 14:20:42', 'pagado'),
(106, 38, NULL, 3, 32, '2023-07-26 17:03:55', 'pagado'),
(107, 25, NULL, 1, 33, '2023-07-26 17:25:45', 'pagado'),
(108, 24, NULL, 3, 34, '2023-08-01 15:26:54', 'pagado'),
(109, 36, NULL, 1, 35, '2023-08-18 14:40:02', 'pagado'),
(110, 39, NULL, 1, 36, '2023-08-18 15:10:24', 'pagado'),
(111, 39, NULL, 1, 37, '2023-08-18 15:10:36', 'pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int NOT NULL,
  `precio` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deposito` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblproducts`
--

INSERT INTO `tblproducts` (`idproducts`, `nombre`, `cantidad`, `precio`, `deposito`) VALUES
(17, 'dorito', -4, '10', 'snacks');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `Cost` int DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(28, 'Peinado', 5, '2023-05-17 15:36:01'),
(29, 'Consumo Interno', 0, '2023-06-09 16:20:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `idtransac` int NOT NULL,
  `invoice` int NOT NULL,
  `monto_total` varchar(45) NOT NULL,
  `tasa_dia` varchar(45) NOT NULL,
  `estatus` varchar(45) NOT NULL,
  `monto_cancelado` varchar(45) NOT NULL,
  `fecha_creacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`idtransac`, `invoice`, `monto_total`, `tasa_dia`, `estatus`, `monto_cancelado`, `fecha_creacion`) VALUES
(1, 29, '53', '28', 'Totalizado', '53', '26/07/2023'),
(2, 28, '20', '28', 'Totalizado', '20', '26/07/2023'),
(8, 35, '33', '28', 'Abono', '33', '18/08/2023'),
(9, 37, '10', '28', 'Restante', '10', '18/08/2023'),
(10, 29, '0', '28', 'Totalizado', '0', '18/08/2023'),
(11, 36, '25', '28', 'Totalizado', '25', '06/09/2023'),
(12, 30, '30', '28', 'Totalizado', '30', '06/09/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales`
--

CREATE TABLE `vales` (
  `idvale` int NOT NULL,
  `idbarber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `monto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `metodo_pago` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `vales`
--

INSERT INTO `vales` (`idvale`, `idbarber`, `monto`, `detalle`, `fecha`, `metodo_pago`) VALUES
(1, '3', '20', 'Prueba', '01-08-2023', '1'),
(2, '3', '20', 'Prueba', '01-08-2023', '1'),
(3, '6', '60bs', 'Prueba', '01-08-2023', '2'),
(4, '17', '50', 'Prueba', '18-08-2023', '1');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`idmetodo`);

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
-- Indices de la tabla `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblassignedproducts`
--
ALTER TABLE `tblassignedproducts`
  ADD PRIMARY KEY (`id_assigned`);

--
-- Indices de la tabla `tblassignedservice`
--
ALTER TABLE `tblassignedservice`
  ADD PRIMARY KEY (`idservicioasignado`);

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
-- AUTO_INCREMENT de la tabla `cuentas_cobrar`
--
ALTER TABLE `cuentas_cobrar`
  MODIFY `idcuenta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `idmetodo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tasabs`
--
ALTER TABLE `tasabs`
  MODIFY `id_tasa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tblassignedproducts`
--
ALTER TABLE `tblassignedproducts`
  MODIFY `id_assigned` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `tblassignedservice`
--
ALTER TABLE `tblassignedservice`
  MODIFY `idservicioasignado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tblbarber`
--
ALTER TABLE `tblbarber`
  MODIFY `idbarber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tblconfig`
--
ALTER TABLE `tblconfig`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `idproducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `idtransac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vales`
--
ALTER TABLE `vales`
  MODIFY `idvale` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
