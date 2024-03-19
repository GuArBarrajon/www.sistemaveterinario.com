
-- phpMyAdmin SQL Dump

-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2024 a las 20:54:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(50) NOT NULL,
  `stock_minimo` int(50) NOT NULL,
  `stock_maximo` int(50) NOT NULL,
  `costo` double NOT NULL,
  `precio` double NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `descripcion`, `imagen`, `stock`, `stock_minimo`, `stock_maximo`, `costo`, `precio`, `fecha_ingreso`, `fyh_creacion`, `fyh_actualizacion`, `id_usuario`) VALUES
(9, 'p00001', 'Pretal ', 'Arnes Alitas Regulable Con Correa Para Gatos', '2023-12-25-03-57-54pretal gato.webp', 10, 5, 20, 2500, 3860, '2023-12-05', '2023-12-25 03:57:54', NULL, 1),
(10, 'p00002', 'Shampoo Perros Gatos', ' Espuma Baño Seco + Rasqueta Masajeador', '2023-12-25-04-00-10shampu perro.webp', 12, 5, 20, 5000, 6990, '2023-12-03', '2023-12-25 04:00:10', NULL, 1),
(11, 'p00003', 'Correa De Perros', ' 5 Metros Larga Reforzada Mosquetón Grande', '2023-12-25-04-01-06correa.webp', 9, 5, 25, 6000, 8075, '2023-12-18', '2023-12-25 04:01:06', NULL, 1),
(12, 'p00004', 'Pedigree Óptima Digestión Etapa 2', 'Alimento  para perro adulto todos los tamaños sabor carne, pollo y cereales en bolsa de 21 kg', '2023-12-25-04-02-22alimneto perro.webp', 15, 10, 50, 18000, 22848, '2023-12-14', '2023-12-25 04:02:22', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_mascota` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_servicio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `color` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_usuario`, `nombre_mascota`, `tipo_servicio`, `fecha`, `hora`, `title`, `start`, `end`, `color`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(2, 14, 'Rabito', 'Vacunacion', '2024-02-21', '10.00', 'Vacunacion', '2024-02-21', '2024-02-21', '#01a2e0', '2024-02-21 05:56:30', '2024-02-21 05:56:30'),
(5, 26, 'Rabito', 'consulta', '2024-03-15', '14.00', 'consulta', '2024-03-15', '2024-03-15', '#01a2e0', '2024-03-02 19:46:00', '2024-03-02 19:46:00'),
(6, 26, 'Selva', 'Consulta', '2024-03-26', '10.00', 'Consulta', '2024-03-26', '2024-03-26', '#01a2e0', '2024-03-02 19:55:50', '2024-03-02 19:55:50'),
(7, 26, 'Selva', 'Peluqueria', '2024-03-26', '10.30', 'Peluqueria', '2024-03-26', '2024-03-26', '#01a2e0', '2024-03-02 19:56:16', '2024-03-02 19:56:16'),
(8, 13, 'Manchita', 'Peluqueria', '2024-03-06', '15.30', 'Peluqueria', '2024-03-06', '2024-03-06', '#01a2e0', '2024-03-02 19:59:11', '2024-03-02 19:59:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellido`, `email`, `password`, `token`, `cargo`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Gustavo Ariel', 'Barrajón', 'guarba@hotmail.com', '$2y$10$vqj52c62/16/FWunv8vEauouhHhFOBpyy6bUjoOWnfxnPNHT.2SnC', NULL, 'administrador', '2023-12-21 01:44:38', '2023-12-24 04:21:45'),
(5, 'Roberto', 'Flores', 'rflowers@hotmail.com', '$2y$10$ScI3p1oqLjrLDdpHT.PwMuh2i74QbfJ4dHj03.ZR4.qqJs0JcWQ7e', NULL, 'cliente', '2023-11-05 00:00:00', '2023-12-24 04:22:25'),
(9, 'Martha', 'Sanchez', 'marthasanchez@hotmail.com', '$2y$10$rDEZK/2ZllkdUFZNF1B1FOiK/s7CS3jC4SPG6RRpuwjgcY8SG./SS', NULL, 'cliente', '2023-12-23 01:20:42', NULL),
(11, 'Martha', 'Legrand', 'ml@hotmail.com', '$2y$10$/1/6kiSBqzUEozhKz/uY8.9TAfmSmtV/3GWDzQpCd24u0aABNlLli', NULL, 'cliente', '2023-12-23 01:45:36', NULL),
(13, 'Laura', 'López', 'lp@gmail.com', '$2y$10$InHN/5yXVD2aN6P0H/nQeeA4/hc82LNKK0befQ3b1s1DZnlHG9uTi', NULL, 'cliente', '2023-12-23 02:45:14', NULL),
(14, 'Luis', 'Gómez', 'lgomez@hotmail.com', '$2y$10$Swka0OFDbJvO1lhoC0HCTuSshBAG0aY2l7cBOJ8k1FWBfmTOyf0Qm', NULL, 'cliente', '2023-12-23 02:47:14', NULL),
(15, 'Roberto', 'Flores', 'flowersrobert@gmail.com', '$2y$10$SnK9QF5o3Tw65/sLfuU9Oe14EqJAvbP1EXyaZa5hwBJg3ix4Wx3Iy', NULL, 'cliente', '2023-12-23 02:48:19', NULL),
(16, 'Pedro', 'Prado', 'pp89@hotmail.com', '$2y$10$SCpfjXbV9DbFiP0lcFyBMuNfepL/p3o75BzpBa8Y666uMHwI90J6y', NULL, 'cliente', '2023-12-23 02:53:15', NULL),
(17, 'Luis', 'Martinez', 'llmm@gamil.com', '$2y$10$Z/jzNYa2KSnZt8ccHqYCD.jWFVjx2cBFims6mWP8.Tjr3GQdoaUn.', NULL, 'cliente', '2023-12-23 03:34:56', NULL),
(18, 'Valeria', 'Britos', 'valebri@hotmail.com', '$2y$10$j8n3t1nALtreJ0dabkyBw.hizFSr3oWyBmULC7efk2YrRIu33efmi', NULL, 'cliente', '2023-12-24 01:01:01', NULL),
(19, 'Marcos', 'García', 'margar@hotmail.com', '$2y$10$l.QuIHmWLHRAz7HWqts1aO2rLiM5MQu.Kw4uzc8nq6oeYxh5KUS3y', NULL, 'cliente', '2023-12-24 04:53:34', NULL),
(20, 'Pedro', 'P', 'p@p.com', '$2y$10$au0Q0fzk6lxbR/5SB.gAcOMDdZ5JoQ8im7XxS2Ij2oYfC25m/BcMa', NULL, 'cliente', '2024-03-02 15:40:09', NULL),
(21, 'Ariel', 'Alvarez', 'aa@gmail.com', '$2y$10$armI9uXFjilNs0EPsXbE3OG9R9OD5aCJ0azQH91bsVOb5D6piu1Nq', NULL, 'cliente', '2024-03-02 15:42:48', NULL),
(22, 'Luisa', 'Lane', 'luisal@hotmail.com', '$2y$10$/vQ93fpDgJFASN/PR/0Iz.ObeUj0B4xFpA8.j9BR9Uqkv9IVW8D/S', NULL, 'cliente', '2024-03-02 15:44:42', NULL),
(23, 'Gastón', 'Solari', 'gs@hotmail.com', '$2y$10$FWjAhGOkCDqPhop2rAs8J.RMQJbGpz.pbQsKR8e.IQDllLJJfCaRK', NULL, 'cliente', '2024-03-02 15:46:58', NULL),
(24, 'pedro', 'p', 'p@pedrop.com', '$2y$10$Ky7EhIZwnzWnRSeOyNd53e0wBOeZPwO66U/9gi8DKOskGfZxDfOFK', NULL, 'cliente', '2024-03-02 15:49:32', NULL),
(25, 'Diego', 'García', 'dg@dgsoluciones.com', '$2y$10$Lk1uzowz70j55sulGqVLWeLkQW.ZsVgPBzIGsa2LcXjCoXQQDuKSm', NULL, 'cliente', '2024-03-02 15:59:30', NULL),
(26, 'Ariel', 'Alvarez', 'aalvarez@gmail.com', '$2y$10$xyOwYZvMVPhQ36pZ7qGzl.eFTLkD7cUcF6//.Xz3xJnPj0OFDWSCS', NULL, 'cliente', '2024-03-02 16:09:06', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;