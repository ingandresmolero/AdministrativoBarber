-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-04-2023 a las 17:13:04
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
-- Base de datos: `gestionsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departament` int NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `rif` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` int NOT NULL,
  `n_control` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `rif`, `direccion`, `telefono`, `n_control`) VALUES
(1, 'Andres mercantil', '123456', 'test', 123456, 5001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` int NOT NULL,
  `id_producto` int NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `cantidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_product` int NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `ult_costo` varchar(20) NOT NULL,
  `costo_alto` varchar(20) NOT NULL,
  `costo_prom` varchar(20) NOT NULL,
  `costo_bajo` varchar(20) NOT NULL,
  `existencia` int NOT NULL,
  `iva_compra` varchar(10) NOT NULL,
  `iva_venta` varchar(10) NOT NULL,
  `precio_1` varchar(10) NOT NULL,
  `precio_2` varchar(10) NOT NULL,
  `precio_3` varchar(10) NOT NULL,
  `unidad_compra` varchar(15) NOT NULL,
  `unidad_venta` varchar(15) NOT NULL,
  `factor_conv` varchar(15) NOT NULL,
  `id_lotes` int NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `fecha_creacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `egreso` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `ingreso` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `usuario` varchar(45) NOT NULL,
  `fecha_creacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `codigo`, `egreso`, `ingreso`, `usuario`, `fecha_creacion`) VALUES
(1, '001', '0', '33', 'admin', '20230421'),
(2, '001', '33', '0', 'admin', '20230421');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `existencia` varchar(20) NOT NULL,
  `lote` varchar(45) NOT NULL,
  `costo` varchar(20) NOT NULL,
  `precio_1` varchar(20) NOT NULL,
  `precio_2` varchar(20) NOT NULL,
  `precio_3` varchar(20) NOT NULL,
  `tasa` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tasa_variable` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `iva` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `voltaje` varchar(20) NOT NULL,
  `medida` varchar(20) NOT NULL,
  `calibre` varchar(20) NOT NULL,
  `N_hilos` varchar(20) NOT NULL,
  `unidades` varchar(20) NOT NULL,
  `serials` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `largo` varchar(20) NOT NULL,
  `peso_bruto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `peso_kg_cobre` varchar(20) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_stock`, `codigo`, `nombre`, `descripcion`, `existencia`, `lote`, `costo`, `precio_1`, `precio_2`, `precio_3`, `tasa`, `tasa_variable`, `iva`, `color`, `voltaje`, `medida`, `calibre`, `N_hilos`, `unidades`, `serials`, `largo`, `peso_bruto`, `peso_kg_cobre`, `usuario`, `fecha_creacion`) VALUES
(1, '001', 'test', 'test', '100', '20A', '145', '30', '33', '20', '24', '25', '12', 'azul', '12v', '500', '12', '7', 'kg', '123456', '500', '30', '20', 'admin', '2023-04-17');

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
(1, '20230418', '24.82', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `passw` varchar(45) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `user`, `passw`, `rol`) VALUES
(1, 'admin', 'admin', 'admin', 'master'),
(2, 'andres', 'andres', '1234', 'dev'),
(3, 'euro', 'euro', '1234', 'dev'),
(4, 'german', 'german', '1234', 'master');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departament`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indices de la tabla `tasabs`
--
ALTER TABLE `tasabs`
  ADD PRIMARY KEY (`id_tasa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departament` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id_lote` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tasabs`
--
ALTER TABLE `tasabs`
  MODIFY `id_tasa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
