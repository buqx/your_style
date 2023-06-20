-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 14:13:54
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_java`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cli` int(11) NOT NULL,
  `nom_cli` varchar(50) DEFAULT NULL,
  `ape_cli` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass_cli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `nom_cli`, `ape_cli`, `email`, `pass_cli`) VALUES
(18, 'Juan', 'Idarraga', 'salazar1336@gmail.com', '123456'),
(23, 'Juan Jose ', 'Orjuela Piraquive', 'juanjitoelguayaco@gmail.com', '123456'),
(24, 'marco', 'marin', 'marco@gmail.com', '123456789'),
(26, 'julian', 'largo', 'julian@gmail.com', '123456789'),
(27, 'humberto', 'marin', 'humberto@gmail.com', '456123'),
(28, 'Juan Marco', 'Orjuela Marin', 'humbertomarin45@gmail.com', '123987'),
(29, 'Juan jeison', 'vera', 'jeison@gmail.com', '123456'),
(30, 'Carlos', 'Luna', 'luna@gmail.com', '456luna'),
(31, 'juan', 'granada', 'juang@gmail.com', '12345'),
(32, 'Yeison', 'Orozco', 'yei45@gmial.com', '123'),
(35, 'Carlos', 'Alberto', 'carlos@gmail.com', '123'),
(36, 'Karla', 'Peralta', 'peralta@gmail.com', '456'),
(37, 'Karla', 'Peralta', 'peralta@gmail.com', '123'),
(38, 'Juan ', 'Largo', 'largo@gmail.com', '123'),
(39, 'Ximena', 'Valencia', 'ximena@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedidos`
--

CREATE TABLE `detalles_pedidos` (
  `id_det_ped` int(11) NOT NULL,
  `id_cli` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pro` int(11) NOT NULL,
  `nom_pro` varchar(50) DEFAULT NULL,
  `precio_pro` float DEFAULT NULL,
  `descripcion_pro` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pro`, `nom_pro`, `precio_pro`, `descripcion_pro`) VALUES
(1, 'Camiseta X', 69.9, 'Camiseta de algodón de manga corta'),
(2, 'Pantalón', 39.99, 'Pantalón vaquero de corte recto'),
(3, 'Air Force 1', 780, 'Zapatos de cuero tratado para hombre'),
(4, 'Vestido', 49.99, 'Vestido estampado de flores'),
(5, 'Chaqueta', 79.99, 'Chaqueta de cuero sintético'),
(6, 'Bolso', 29.99, 'Bolso de mano en color negro'),
(7, 'Reloj', 99.99, 'Reloj analógico con correa de acero'),
(8, 'Gafas de sol', 19.99, 'Gafas de sol estilo aviador'),
(9, 'Bufanda', 14.99, 'Bufanda de lana suave'),
(10, 'Sombrero', 24.99, 'Sombrero de paja para el verano');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`),
  ADD UNIQUE KEY `id_cli` (`id_cli`);

--
-- Indices de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id_det_ped`),
  ADD UNIQUE KEY `id_det_ped` (`id_det_ped`),
  ADD KEY `id_ped` (`id_cli`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pro`),
  ADD UNIQUE KEY `id_pro` (`id_pro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id_det_ped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD CONSTRAINT `detalles_pedidos_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `productos` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_pedidos_ibfk_2` FOREIGN KEY (`id_cli`) REFERENCES `clientes` (`id_cli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
