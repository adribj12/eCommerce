-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2023 a las 23:52:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `producto` int(11) DEFAULT NULL,
  `comprador` int(11) DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `metodo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `idGenero` int(11) NOT NULL,
  `nombreGenero` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagen` int(11) NOT NULL,
  `ruta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodosdepago`
--

CREATE TABLE `metodosdepago` (
  `idMetodoDePago` int(11) NOT NULL,
  `numero_de_tarjeta` int(11) DEFAULT NULL,
  `nombre_completo` text DEFAULT NULL,
  `fecha_de_vencimiento` date DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `localidad` text DEFAULT NULL,
  `codigo_postal` text DEFAULT NULL,
  `direccion_linea_1` text DEFAULT NULL,
  `direccion_linea_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `idOferta` int(11) NOT NULL,
  `producto` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `fecha_de_inicio` date DEFAULT NULL,
  `fecha_de_finalizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `fecha_de_salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `descripcion`, `precio`, `vendedor`, `fecha_de_salida`) VALUES
(1, 'PruebaProducto', 'Producto de Prueba', 1999.99, 1, '2023-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacioncarrito`
--

CREATE TABLE `relacioncarrito` (
  `usuario` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciondeseos`
--

CREATE TABLE `relaciondeseos` (
  `usuario` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciongeneros`
--

CREATE TABLE `relaciongeneros` (
  `producto` int(11) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacionhistorial`
--

CREATE TABLE `relacionhistorial` (
  `usuario` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `fecha_de_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacionimagenes`
--

CREATE TABLE `relacionimagenes` (
  `imagen` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacionmetodosdepago`
--

CREATE TABLE `relacionmetodosdepago` (
  `metodo` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenas`
--

CREATE TABLE `resenas` (
  `idResena` int(11) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `fecha_de_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `contrasena` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `foto_de_perfil` text DEFAULT NULL,
  `rango` int(11) DEFAULT NULL,
  `fecha_de_creacion` date DEFAULT NULL,
  `tema` int(11) DEFAULT NULL,
  `color_preferido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `email`, `contrasena`, `telefono`, `pais`, `fecha_de_nacimiento`, `foto_de_perfil`, `rango`, `fecha_de_creacion`, `tema`, `color_preferido`) VALUES
(1, 'PruebaUsuario', 'pruebausuario@gmail.com', '1234', '+5491123980405', 'Argentina', '2005-06-21', 'img/perfil/foto1.png', 1, '2023-05-22', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracionresenas`
--

CREATE TABLE `valoracionresenas` (
  `resena` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `producto` (`producto`),
  ADD KEY `comprador` (`comprador`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `metodo` (`metodo`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagen`);

--
-- Indices de la tabla `metodosdepago`
--
ALTER TABLE `metodosdepago`
  ADD PRIMARY KEY (`idMetodoDePago`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`idOferta`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indices de la tabla `relacioncarrito`
--
ALTER TABLE `relacioncarrito`
  ADD KEY `usuario` (`usuario`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `relaciondeseos`
--
ALTER TABLE `relaciondeseos`
  ADD KEY `usuario` (`usuario`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `relaciongeneros`
--
ALTER TABLE `relaciongeneros`
  ADD KEY `producto` (`producto`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `relacionhistorial`
--
ALTER TABLE `relacionhistorial`
  ADD KEY `usuario` (`usuario`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `relacionimagenes`
--
ALTER TABLE `relacionimagenes`
  ADD KEY `imagen` (`imagen`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `relacionmetodosdepago`
--
ALTER TABLE `relacionmetodosdepago`
  ADD KEY `metodo` (`metodo`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `resenas`
--
ALTER TABLE `resenas`
  ADD PRIMARY KEY (`idResena`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `valoracionresenas`
--
ALTER TABLE `valoracionresenas`
  ADD KEY `resena` (`resena`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodosdepago`
--
ALTER TABLE `metodosdepago`
  MODIFY `idMetodoDePago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `resenas`
--
ALTER TABLE `resenas`
  MODIFY `idResena` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`comprador`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`vendedor`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `compras_ibfk_4` FOREIGN KEY (`metodo`) REFERENCES `metodosdepago` (`idMetodoDePago`);

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `relacioncarrito`
--
ALTER TABLE `relacioncarrito`
  ADD CONSTRAINT `relacioncarrito_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `relacioncarrito_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `relaciondeseos`
--
ALTER TABLE `relaciondeseos`
  ADD CONSTRAINT `relaciondeseos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `relaciondeseos_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `relaciongeneros`
--
ALTER TABLE `relaciongeneros`
  ADD CONSTRAINT `relaciongeneros_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `relaciongeneros_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `generos` (`idGenero`);

--
-- Filtros para la tabla `relacionhistorial`
--
ALTER TABLE `relacionhistorial`
  ADD CONSTRAINT `relacionhistorial_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `relacionhistorial_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `relacionimagenes`
--
ALTER TABLE `relacionimagenes`
  ADD CONSTRAINT `relacionimagenes_ibfk_1` FOREIGN KEY (`imagen`) REFERENCES `imagenes` (`idImagen`),
  ADD CONSTRAINT `relacionimagenes_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `relacionmetodosdepago`
--
ALTER TABLE `relacionmetodosdepago`
  ADD CONSTRAINT `relacionmetodosdepago_ibfk_1` FOREIGN KEY (`metodo`) REFERENCES `metodosdepago` (`idMetodoDePago`),
  ADD CONSTRAINT `relacionmetodosdepago_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `resenas`
--
ALTER TABLE `resenas`
  ADD CONSTRAINT `resenas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `resenas_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `valoracionresenas`
--
ALTER TABLE `valoracionresenas`
  ADD CONSTRAINT `valoracionresenas_ibfk_1` FOREIGN KEY (`resena`) REFERENCES `resenas` (`idResena`),
  ADD CONSTRAINT `valoracionresenas_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
