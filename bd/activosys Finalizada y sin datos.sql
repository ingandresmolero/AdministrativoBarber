-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-05-2024 a las 15:07:02
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
CREATE DATABASE IF NOT EXISTS `activosys` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `activosys`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_diario`
--

CREATE TABLE `cierre_diario` (
  `id_cierre` int NOT NULL,
  `fecha` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `monto_final` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_fondo`
--

CREATE TABLE `consumo_fondo` (
  `id_consumo` int NOT NULL,
  `invoice` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `saldo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cliente` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `aplicado` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_interno`
--

CREATE TABLE `consumo_interno` (
  `idconsumo` int NOT NULL,
  `intern` int NOT NULL,
  `servidor` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `saldo` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `fecha_creacion` date NOT NULL,
  `fecha_act` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_cobrar`
--

CREATE TABLE `cuentas_cobrar` (
  `idcuenta` int NOT NULL,
  `invoice` int NOT NULL,
  `idmetodo` int NOT NULL,
  `monto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detalle` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_customer` int NOT NULL DEFAULT '0',
  `billing` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `id_services` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `id_products` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `barbero` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `monto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `detalle` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `estado` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `metodo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `abono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `tasa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `fecha` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos_pago`
--

CREATE TABLE `historicos_pago` (
  `idhistorico` int NOT NULL,
  `idmetodo` int NOT NULL,
  `monto` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `idservidor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `idmetodo` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `unidad` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_pago`
--

CREATE TABLE `recibos_pago` (
  `idrecibo` int NOT NULL,
  `idservidor` int NOT NULL,
  `monto` varchar(20) NOT NULL,
  `saldo` varchar(20) NOT NULL,
  `sueldo` varchar(25) NOT NULL DEFAULT '0',
  `id_metodo` varchar(20) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `fecha_Creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_adicional`
--

CREATE TABLE `servicios_adicional` (
  `idservicioadicional` int NOT NULL,
  `id_billing` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_metodo` int NOT NULL,
  `monto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detalles` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_adicional_interno`
--

CREATE TABLE `servicios_adicional_interno` (
  `idservicioadicionalintern` int NOT NULL,
  `intern` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_metodo` int NOT NULL,
  `monto` varchar(45) NOT NULL,
  `detalles` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasabs`
--

CREATE TABLE `tasabs` (
  `id_tasa` int NOT NULL,
  `fecha_creacion` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `monto_bcv` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `monto_paral` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tasabs`
--

INSERT INTO `tasabs` (`id_tasa`, `fecha_creacion`, `monto_bcv`, `monto_paral`) VALUES
(1, '21.05.24', '40', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int NOT NULL,
  `AdminName` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `UserName` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `Role`) VALUES
(1, 'Administrador', 'admin', 7898799798, 'msevillab@cweb.com', '21232f297a57a5a743894a0e4a801fc3', '2019-07-25 06:21:50', 'admin'),
(23, 'Protocolo', 'protocolo', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-05-21 15:21:50', 'manager'),
(24, 'barbero', 'barbero', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-05-21 15:23:45', 'servidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedproducts`
--

CREATE TABLE `tblassignedproducts` (
  `id_assigned` int NOT NULL,
  `invoice` int NOT NULL,
  `id_products` int NOT NULL,
  `cantidad` int NOT NULL,
  `monto` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedproducts_intern`
--

CREATE TABLE `tblassignedproducts_intern` (
  `id_assignedintern` int NOT NULL,
  `intern` int NOT NULL,
  `id_products` int NOT NULL,
  `cantidad` int NOT NULL,
  `monto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedservice`
--

CREATE TABLE `tblassignedservice` (
  `idservicioasignado` int NOT NULL,
  `invoice` int NOT NULL,
  `servicio` int NOT NULL,
  `idbarbero` int NOT NULL,
  `cantidad` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `monto` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detalle` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `propina` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblassignedservice_intern`
--

CREATE TABLE `tblassignedservice_intern` (
  `idserviciointerno` int NOT NULL,
  `intern` int NOT NULL,
  `servicio` int NOT NULL,
  `idbarbero` int NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  `monto` varchar(15) NOT NULL,
  `detalle` varchar(45) NOT NULL,
  `propina` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblbarber`
--

CREATE TABLE `tblbarber` (
  `idbarber` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `porcentaje` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pass` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Codigo` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '-',
  `Puesto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '-',
  `Telefono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblbarber`
--

INSERT INTO `tblbarber` (`idbarber`, `nombre`, `porcentaje`, `usuario`, `pass`, `Codigo`, `Puesto`, `Telefono`) VALUES
(24, 'barbero', '0', 'barbero', '81dc9bdb52d04dc20036dbd8313ed055', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfig`
--

CREATE TABLE `tblconfig` (
  `id_empresa` int NOT NULL,
  `nombre_empresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `razon_social` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `telefono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `NControl` int DEFAULT NULL,
  `NControlInterno` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tblconfig`
--

INSERT INTO `tblconfig` (`id_empresa`, `nombre_empresa`, `razon_social`, `direccion`, `telefono`, `NControl`, `NControlInterno`) VALUES
(1, 'Barberia Activo C.A', '123456', 'maracaibo', '12345678', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int NOT NULL,
  `Name` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `assignedbarber` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Gender` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cedula` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Details` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `assignedBy` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `estado` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int NOT NULL,
  `PageType` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `PageTitle` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `PageDescription` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
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
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cantidad` int NOT NULL,
  `precio` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `deposito` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int NOT NULL,
  `ServiceName` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
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
(27, 'Depilacion', 5, '2023-05-17 15:35:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `idtransac` int NOT NULL,
  `invoice` int NOT NULL,
  `monto_total` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tasa_dia` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `estatus` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `monto_cancelado` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `saldo` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales`
--

CREATE TABLE `vales` (
  `idvale` int NOT NULL,
  `idbarber` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `monto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detalle` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fecha` date NOT NULL,
  `metodo_pago` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `estado` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tblassignedproducts`
--
ALTER TABLE `tblassignedproducts`
  MODIFY `id_assigned` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `tblassignedproducts_intern`
--
ALTER TABLE `tblassignedproducts_intern`
  MODIFY `id_assignedintern` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblassignedservice`
--
ALTER TABLE `tblassignedservice`
  MODIFY `idservicioasignado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `tblassignedservice_intern`
--
ALTER TABLE `tblassignedservice_intern`
  MODIFY `idserviciointerno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblbarber`
--
ALTER TABLE `tblbarber`
  MODIFY `idbarber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tblconfig`
--
ALTER TABLE `tblconfig`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `idproducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
