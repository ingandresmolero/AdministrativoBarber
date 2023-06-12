-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-06-2023 a las 19:54:19
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
  `usuario` int NOT NULL,
  `id_customer` int NOT NULL DEFAULT '0',
  `billing` int NOT NULL DEFAULT '0',
  `id_services` int NOT NULL DEFAULT '0',
  `id_products` int NOT NULL DEFAULT '0',
  `monto` int NOT NULL DEFAULT '0',
  `detalle` int NOT NULL DEFAULT '0',
  `estado` int NOT NULL DEFAULT '0',
  `metodo` int NOT NULL DEFAULT '0',
  `abono` int NOT NULL DEFAULT '0',
  `tasa` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `usuario`, `id_customer`, `billing`, `id_services`, `id_products`, `monto`, `detalle`, `estado`, `metodo`, `abono`, `tasa`) VALUES
(3, 1, 24, 992472958, 26, 8, 53, 0, 0, 0, 0, 0);

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
(1, '17.05.23', '27', '28');

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
(4, 'andres', 'armo', 424610413, 'ing.andresmolero@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-06-08 13:05:18', 'barber');

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
(35, 237544137, 11, 1, '');

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
  `pass` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblbarber`
--

INSERT INTO `tblbarber` (`idbarber`, `nombre`, `porcentaje`, `usuario`, `pass`) VALUES
(3, 'Fernando', '10', 'Fernando', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Jose Lopez', '10', 'JoseL', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Anthony', '10', 'Anthony', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Jose Toto', '', 'Toto', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Exon', '10', 'Exon', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'Pedro', '10', 'Pedro', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'Belkis', '10', 'Belkis', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'Jessica', '10', 'Jessica', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'Wuyll', '10', 'Wuyll', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'Mariby', '10', 'Mariby', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'William', '10', 'William', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'Michelle Perez', '10', 'Michelle', '81dc9bdb52d04dc20036dbd8313ed055');

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
  `Details` mediumtext,
  `assignedBy` varchar(45) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `assignedbarber`, `Email`, `MobileNumber`, `Gender`, `Details`, `assignedBy`, `CreationDate`, `UpdationDate`) VALUES
(24, 'andres molero', 'Anthony', NULL, NULL, 'Interno', '', '1', '2023-06-12 12:48:40', NULL),
(25, 'Testo', 'Fernando', NULL, NULL, 'Eventual', '', '1', '2023-06-12 13:59:17', NULL),
(26, 'fernando', 'Pedro', NULL, NULL, 'Cortesia', '', '1', '2023-06-12 18:44:26', NULL);

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
(74, 24, 20, 1, 992472958, '2023-06-12 12:48:47', 'procesada'),
(75, 24, 26, 1, 992472958, '2023-06-12 12:48:47', 'procesada'),
(76, 25, 24, 1, 237544137, '2023-06-12 13:59:23', 'pendiente'),
(80, 26, 28, 1, 361232179, '2023-06-12 18:44:41', 'pendiente');

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
  MODIFY `id_factura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_assigned` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
-- AUTO_INCREMENT de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
