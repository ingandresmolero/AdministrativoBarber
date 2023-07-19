-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-07-2023 a las 19:15:53
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
(3, '1', 24, '992472958', '0', '0', '', '53', '0', '0', '0', '0', '0', '0'),
(4, '1', 26, '361232179', '0', '0', 'Pedro', '5', 'test', 'pagado', 'Efectivo_bs', '20', '27', '13/06/2023'),
(8, '1', 26, '361232179', '0', '0', 'Pedro', '5', 'test', 'pagado', 'Punto', '20', '27', '13/06/2023'),
(9, '1', 26, '361232179', '0', '0', 'Pedro', '5', '', 'pagado', '--', '', '27', '13/06/2023'),
(10, '1', 25, '237544137', '0', '0', 'Fernando', '11.5', '', 'pagado', '--', '', '27', '13/06/2023'),
(11, '1', 24, '992472958', '0', '0', 'Anthony', '53', '', 'pagado', '--', '', '27', '13/06/2023'),
(12, '1', 27, '755135508', '20', '12', '0', '14', '0', '0', '0', '0', '0', '0'),
(13, '1', 29, '682007570', '20', '12', '0', '24', '0', '0', '0', '0', '0', '0'),
(14, '1', 29, '682007570', '0', '0', 'Fernando', '24.5', 'billete roto', 'procesada', 'Efectivo_bs', '60', '28', '13/06/2023'),
(15, '1', 36, '24', '0', '0', '0', '13', '', 'pendiente', '--', '', '28', '19/07/2023');

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
(2, 'Andre', 'Andre', 5464121813, 'andre@algo.com', 'cosa', '2023-03-02 01:17:56', ''),
(3, 'pingudev', 'pingudev', 123456, 'administrativo3@onserviceve.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-14 19:50:53', 'manager'),
(4, 'andres', 'armo', 424610413, 'ing.andresmolero@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-06-08 13:05:18', 'servidor');

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
(45, 24, 5, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedservice`
--

CREATE TABLE `tblassignedservice` (
  `id_service` int NOT NULL,
  `billing` int NOT NULL,
  `servicio` int NOT NULL,
  `cantidad` varchar(45) NOT NULL DEFAULT '1',
  `detalle` varchar(45) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(3, 'Fernando', '10', 'Fernando', '12345', '5', '5', '42412345678'),
(5, 'Anthony', '10', 'Anthony', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(6, 'Jose Toto', '', 'Toto', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(8, 'Pedro', '10', 'Pedro', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(9, 'Belkis', '10', 'Belkis', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(10, 'Jessica', '10', 'Jessica', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(11, 'Wuyll', '10', 'Wuyll', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(12, 'Mariby', '10', 'Mariby', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(13, 'William', '10', 'William', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0'),
(14, 'Michelle Perez', '10', 'Michelle', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', '0');

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
(1, 'Barberia Activo C.A', '123456', 'maracaibo', '12345678', 25);

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
(36, 'Nestor Gutierrez', '0', '0', 0, 'cortesia', '19576368', '0', '', '2023-07-19 15:44:39', NULL);

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
(74, 24, 20, 1, 992472958, '2023-06-12 12:48:47', 'pagado'),
(75, 24, 26, 1, 992472958, '2023-06-12 12:48:47', 'pagado'),
(76, 25, 24, 1, 237544137, '2023-06-12 13:59:23', 'pagado'),
(80, 26, 28, 1, 361232179, '2023-06-12 18:44:41', 'pagado'),
(81, 27, 20, 1, 755135508, '2023-06-13 15:27:42', 'procesada'),
(82, 28, 28, 1, 885356545, '2023-06-13 15:30:43', 'pendiente'),
(83, 29, 23, 1, 682007570, '2023-06-13 18:28:59', 'pagado'),
(84, 29, 20, 1, 682007570, '2023-06-13 18:28:59', 'pagado'),
(85, 30, 29, 1, 440488161, '2023-06-13 18:36:53', 'pendiente'),
(86, 31, 20, 1, 557968476, '2023-06-30 01:59:27', 'pendiente'),
(87, 31, 24, 1, 557968476, '2023-06-30 01:59:27', 'pendiente'),
(88, 24, NULL, 1, 20, '2023-07-19 14:42:17', 'pendiente'),
(89, 24, NULL, 1, 21, '2023-07-19 14:54:20', 'pendiente'),
(90, 24, 20, 1, 21, '2023-07-19 14:54:20', 'pendiente'),
(91, 35, NULL, 1, 22, '2023-07-19 15:42:27', 'pendiente'),
(92, 35, 20, 1, 22, '2023-07-19 15:42:27', 'pendiente'),
(93, 36, NULL, 1, 23, '2023-07-19 18:14:37', 'pendiente'),
(94, 36, 23, 1, 23, '2023-07-19 18:14:37', 'pendiente'),
(95, 36, NULL, 1, 24, '2023-07-19 19:07:39', 'pagado'),
(96, 36, 20, 1, 24, '2023-07-19 19:07:39', 'pagado');

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
(5, 'Cera roqvel', 5, '10', 'Belleza'),
(6, 'Cera Nishman', 5, '12', 'Belleza'),
(7, 'After Shave', 5, '10', 'Belleza'),
(8, 'Cera Polvo', 5, '10', 'Belleza'),
(9, 'Coca-Cola', 10, '1', 'Bebida'),
(10, 'Te', 5, '2', 'Bebida'),
(11, 'Redbull', 5, '4', 'Bebida'),
(12, 'Dorito', 5, '1.5', 'Snack'),
(13, 'Pepito', 5, '1.5', 'Snack'),
(14, 'Maquina', 1, '50', 'Otros'),
(15, 'Cera Rolda', 30, '2', 'Belleza');

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`);

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
  ADD PRIMARY KEY (`id_service`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tasabs`
--
ALTER TABLE `tasabs`
  MODIFY `id_tasa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tblassignedproducts`
--
ALTER TABLE `tblassignedproducts`
  MODIFY `id_assigned` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `tblassignedservice`
--
ALTER TABLE `tblassignedservice`
  MODIFY `id_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tblbarber`
--
ALTER TABLE `tblbarber`
  MODIFY `idbarber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblconfig`
--
ALTER TABLE `tblconfig`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `idproducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
