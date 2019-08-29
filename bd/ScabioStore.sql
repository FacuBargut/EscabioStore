-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-08-2019 a las 21:14:30
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ScabioStore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE `Categorias` (
  `IdCategoria` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Activado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marcas`
--

CREATE TABLE `Marcas` (
  `IdMarca` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedidos`
--

CREATE TABLE `Pedidos` (
  `IdPedido` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `IdProducto` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Detalle` text NOT NULL,
  `Precio` float NOT NULL,
  `Imagen` text NOT NULL,
  `Stock` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Activado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  ADD PRIMARY KEY (`IdMarca`);

--
-- Indices de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`IdPedido`),
  ADD UNIQUE KEY `IdProducto` (`IdProducto`),
  ADD UNIQUE KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD UNIQUE KEY `IdCategoria` (`IdCategoria`,`IdMarca`),
  ADD UNIQUE KEY `IdCategoria_2` (`IdCategoria`),
  ADD KEY `IdMarca` (`IdMarca`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  MODIFY `IdMarca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD CONSTRAINT `Pedidos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`),
  ADD CONSTRAINT `Pedidos_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `Productos` (`IdProducto`);

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `Productos_ibfk_2` FOREIGN KEY (`IdMarca`) REFERENCES `Marcas` (`IdMarca`),
  ADD CONSTRAINT `Productos_ibfk_3` FOREIGN KEY (`IdCategoria`) REFERENCES `Categorias` (`IdCategoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
