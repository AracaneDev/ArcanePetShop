-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 27-10-2022 a las 22:49:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arcanepetshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idProd` int(5) NOT NULL,
  `idVenta` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT 0,
  `web_path` varchar(250) NOT NULL DEFAULT '',
  `system_path` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`) VALUES
(1, 'WhatsApp-Image-2021-09-17-at-1.40.22-PM-min-400x555-1-555x555.jpg', 22772, '/ArcanePetShop/upload/1.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/1.jpg'),
(2, 'sa.jpg', 169429, '/ArcanePetShop/upload/2.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/2.jpg'),
(3, 'sa1.jpg', 50076, '/ArcanePetShop/upload/3.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/3.jpg'),
(4, '5151251265126030001-min.jpg', 173615, '/ArcanePetShop/upload/4.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/4.jpg'),
(5, 'talco-desodorante-para-perros-canamor-100-g.jpg', 16395, '/ArcanePetShop/upload/5.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/5.jpg'),
(6, '4.jpg', 173615, '/ArcanePetShop/upload/6.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/6.jpg'),
(7, 'bolsos-cargadores-1-pet-shop.jpg', 159034, '/ArcanePetShop/upload/7.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/7.jpg'),
(8, 'WhatsApp-Image-2021-09-17-at-1.40.22-PM-min-400x555-1-555x555.jpg', 22772, '/ArcanePetShop/upload/8.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/8.jpg'),
(9, 'sa.jpg', 169429, '/ArcanePetShop/upload/9.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/9.jpg'),
(10, 'sa1.jpg', 50076, '/ArcanePetShop/upload/10.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/10.jpg'),
(11, 'WhatsApp-Image-2021-09-17-at-1.40.22-PM-min-400x555-1-555x555.jpg', 22772, '/ArcanePetShop/upload/11.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/11.jpg'),
(12, 'sa1.jpg', 50076, '/ArcanePetShop/upload/12.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/12.jpg'),
(13, 'bolsos-cargadores-1-pet-shop.jpg', 159034, '/ArcanePetShop/upload/13.jpg', 'C:/xampp/htdocs/ArcanePetShop/upload/13.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `existencia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencia`) VALUES
(4, 'Talco para perro', 17500, 4),
(5, 'asd', 123, 1),
(6, 'Bolso cargador', 71002, 3),
(7, 'BabyDoll Sombra', 70000, 14),
(8, 'Disfraz Sakura School', 72000, 5),
(9, 'Otro BabyDoll pero pirata', 12000, 2),
(10, 'Dizfras pirata', 17500, 1),
(11, 'Otro bolso', 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_files`
--

CREATE TABLE `productos_files` (
  `producto_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_files`
--

INSERT INTO `productos_files` (`producto_id`, `file_id`) VALUES
(4, 4),
(6, 7),
(7, 8),
(8, 9),
(8, 10),
(9, 11),
(10, 12),
(11, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `nombre`) VALUES
(1, 'admin@admin.com', 'admin', 'Administrador Godofredo'),
(6, 'sergio.quintero@udea.edu.co', 'sergio', 'Sergio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idCli` int(5) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdProd` (`idProd`),
  ADD KEY `fkIdVenta` (`idVenta`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdCli` (`idCli`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `idProd` FOREIGN KEY (`idProd`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idCli` FOREIGN KEY (`idCli`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
