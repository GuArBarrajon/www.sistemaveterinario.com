-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2024 a las 07:24:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `veterinaria`
--
CREATE DATABASE IF NOT EXISTS `veterinaria` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `veterinaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `comprobante` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precio_compra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_proveedor`, `id_producto`, `id_usuario`, `nro_compra`, `fecha_compra`, `comprobante`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 10, 1, 1, '2024-04-09', 'Factura', '5000', 50, '2024-04-09 09:03:02', '2024-04-09 09:03:02'),
(10, 1, 9, 1, 2, '2024-04-09', 'Factura 0023', '3500', 11, '2024-04-09 23:07:16', '0000-00-00 00:00:00'),
(11, 4, 12, 1, 3, '2024-04-09', 'Factura 2023', '23000', 15, '2024-04-09 23:14:45', '0000-00-00 00:00:00'),
(12, 4, 10, 1, 4, '2024-04-09', 'Factura 007', '6000', 5, '2024-04-09 23:20:03', '0000-00-00 00:00:00'),
(13, 1, 11, 1, 5, '2024-04-09', 'Factura 2010', '7000', 10, '2024-04-09 23:28:06', '0000-00-00 00:00:00'),
(14, 1, 11, 1, 6, '2024-04-10', 'Factura 001', '7000', 2, '2024-04-10 00:05:19', '0000-00-00 00:00:00'),
(15, 1, 9, 1, 7, '2024-04-10', 'Factura 4', '3500', 1, '2024-04-10 00:38:43', '0000-00-00 00:00:00'),
(16, 3, 12, 1, 8, '2024-04-10', 'Factura 2222', '23100', 10, '2024-04-10 01:52:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_clinicas`
--

CREATE TABLE `historias_clinicas` (
  `id_historia` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historias_clinicas`
--

INSERT INTO `historias_clinicas` (`id_historia`, `id_mascota`, `fecha_consulta`, `descripcion`, `tratamiento`) VALUES
(1, 1, '2024-04-01', 'Parece estar cojeando en su pata trasera derecha. Además, he notado que ha perdido el apetito y parece estar más letárgico de lo normal.', 'Leve lesión en su pata trasera derecha, posiblemente debido a un tirón muscular o una pequeña torcedura. Se prescribió reposo estricto, junto con medicación antiinflamatoria y analgésica para aliviar el dolor y reducir la inflamación.'),
(2, 1, '2023-12-01', 'Signos de irritación en sus oídos, sacudiendo la cabeza con frecuencia y rascándose detrás de las orejas. Además, he notado un olor desagradable proveniente de sus oídos.', 'Infección de oído bilateral. Se limpiaron cuidadosamente los oídos para eliminar cualquier acumulación de cerumen y se tomaron muestras para realizar un análisis microscópico. Se prescribió un tratamiento con gotas óticas antibióticas y antiinflamatorias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `especie` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `raza` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `id_usuario`, `nombre`, `especie`, `raza`, `fecha_nac`) VALUES
(1, 5, 'Rabito', 'perro', 'Pastor Alemán', '2024-04-01'),
(2, 5, 'Pitu', 'gato', 'siamés', '2020-04-01'),
(3, 5, 'Pedro', 'loro', 'barranquero', '2023-08-02'),
(4, 5, 'Lola', 'gato', 'callejero', '2021-11-05'),
(6, 11, 'Laila', 'perro', 'Poodle', '2019-02-01');

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
(9, 'p00001', 'Pretal ', 'Arnes Alitas Regulable Con Correa Para Gatos', '2023-12-25-03-57-54pretal gato.webp', 22, 5, 20, 3500, 4550, '2023-12-05', '2024-04-09 23:07:16', '2024-04-10 00:38:43', 1),
(10, 'p00002', 'Shampoo Perros Gatos', ' Espuma Baño Seco + Rasqueta Masajeador', '2023-12-25-04-00-10shampu perro.webp', 17, 5, 20, 6000, 7800, '2023-12-03', '2023-12-25 04:00:10', '2024-04-09 23:20:03', 1),
(11, 'p00003', 'Correa De Perros', ' 5 Metros Larga Reforzada Mosquetón Grande', '2023-12-25-04-01-06correa.webp', 21, 5, 25, 7000, 9100, '2023-12-18', '2023-12-25 04:01:06', '2024-04-10 00:05:19', 1),
(12, 'p00004', 'Pedigree Óptima Digestión Etapa 2', 'Alimento  para perro adulto todos los tamaños sabor carne, pollo y cereales en bolsa de 21 kg', '2023-12-25-04-02-22alimneto perro.webp', 40, 10, 50, 23100, 30030, '2023-12-14', '2024-04-09 23:14:45', '2024-04-10 01:52:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `telefono`, `email`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Luis Pérez', 1122334455, 'luiso@gmail.com', 'Cucha Cucha 2030, CABA.', '2024-04-09 04:52:21', '2024-04-09 04:52:21'),
(3, 'Comida Pichicho S.A.', 1112223331, 'comidapichicho@hotmail.com', 'Dr. Pedraza 5788, CABA', '2024-04-09 01:53:31', '2024-04-09 01:53:51'),
(4, 'Susana López', 1111122222, 'slopez@canes.com', 'Azcuénaga 5183, CABA', '2024-04-09 01:55:06', '2024-04-09 02:49:02'),
(5, 'Ana María Díaz', 1111122222, 'anadiaz@hotmail.com', 'Loreto 5183, Ramos Mejía', '2024-04-10 02:01:38', '0000-00-00 00:00:00');

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
(5, 26, 'Rabito', 'Consulta', '2024-03-15', '14.00', 'Consulta', '2024-03-15', '2024-03-15', '#D68910', '2024-03-02 19:46:00', '2024-03-02 19:46:00'),
(6, 26, 'Selva', 'Consulta', '2024-03-26', '10.00', 'Consulta', '2024-03-26', '2024-03-26', '#D68910', '2024-03-02 19:55:50', '2024-03-02 19:55:50'),
(7, 26, 'Selva', 'Peluqueria', '2024-03-26', '10.30', 'Peluqueria', '2024-03-26', '2024-03-26', '#5DADE2', '2024-03-02 19:56:16', '2024-03-02 19:56:16'),
(8, 13, 'Manchita', 'Peluqueria', '2024-03-06', '15.30', 'Peluqueria', '2024-03-06', '2024-03-06', '#5DADE2', '2024-03-02 19:59:11', '2024-03-02 19:59:11'),
(9, 1, 'lola', 'Peluqueria', '2024-04-11', '16.00', 'Peluqueria', '2024-04-11', '2024-04-11', '#5DADE2', '2024-04-02 19:35:25', '2024-04-02 19:35:25'),
(10, 1, 'Pipi', 'Estudios', '2024-04-25', '17.30', 'Estudios', '2024-04-25', '2024-04-25', '#76D7C4', '2024-04-02 19:35:38', '2024-04-02 19:35:38'),
(11, 13, 'Pipito', 'Peluqueria', '2024-04-17', '8.00', 'Peluqueria', '2024-04-17', '2024-04-17', '#5DADE2', '2024-04-03 00:03:24', '2024-04-03 00:03:24'),
(12, 1, 'lola', 'Consulta', '2024-04-25', '15.00', 'Consulta', '2024-04-25', '2024-04-25', '#D68910 ', '2024-04-03 00:45:37', '2024-04-03 00:45:37'),
(13, 1, 'Pipi', 'Estudios', '2024-04-25', '9.30', 'Estudios', '2024-04-25', '2024-04-25', '#76D7C4', '2024-04-03 00:45:50', '2024-04-03 00:45:50'),
(14, 1, 'Pipito', 'Vacunatorio', '2024-04-25', '12.00', 'Vacunatorio', '2024-04-25', '2024-04-25', '#9B59B6 ', '2024-04-03 00:46:15', '2024-04-03 00:46:15'),
(15, 13, 'pipi', 'Peluqueria', '2024-04-24', '12.30', 'Peluqueria', '2024-04-24', '2024-04-24', '#5DADE2', '2024-04-03 16:39:43', '2024-04-03 16:39:43'),
(16, 5, 'Chuchi', 'Peluqueria', '2024-04-24', '9.30', 'Peluqueria', '2024-04-24', '2024-04-24', '#5DADE2', '2024-04-03 16:58:15', '2024-04-03 16:58:15'),
(17, 24, 'Loli', 'Consulta', '2024-05-01', '8.00', 'Consulta', '2024-05-01', '2024-05-01', '#D68910', '2024-04-03 17:38:33', '2024-04-03 17:38:33'),
(18, 11, 'Pucho', 'Estudios', '2024-04-06', '15.00', 'Estudios', '2024-04-06', '2024-04-06', '#76D7C4', '2024-04-03 19:39:30', '2024-04-03 19:39:30'),
(19, 5, 'Rolo', 'Vacunatorio', '2024-04-20', '14.30', 'Vacunatorio', '2024-04-20', '2024-04-20', '#9B59B6 ', '2024-04-03 20:08:47', '2024-04-03 20:08:47'),
(20, 23, 'Negra', 'Consulta', '2024-04-26', '13.30', 'Consulta', '2024-04-26', '2024-04-26', '#D68910', '2024-04-04 00:23:41', '2024-04-04 00:23:41'),
(21, 5, 'Toto', 'Consulta', '2024-04-26', '15.00', 'Consulta', '2024-04-26', '2024-04-26', '#D68910', '2024-04-04 00:46:50', '2024-04-04 00:46:50'),
(22, 9, 'Lola', 'Estudios', '2024-04-27', '15.30', 'Estudios', '2024-04-27', '2024-04-27', '#76D7C4', '2024-04-04 00:55:35', '2024-04-04 00:55:35'),
(23, 13, 'Pulgas', 'Laboratorio', '2024-04-26', '9.00', 'Laboratorio', '2024-04-26', '2024-04-26', '#EDBB99', '2024-04-05 22:27:44', '2024-04-05 22:27:44'),
(24, 9, 'Pulgoso', 'Laboratorio', '2024-05-09', '8.00', 'Laboratorio', '2024-05-09', '2024-05-09', '#EDBB99', '2024-04-06 03:44:16', '2024-04-06 03:44:16'),
(25, 9, 'Pepa', 'Estudios', '2024-04-18', '8.00', 'Estudios', '2024-04-18', '2024-04-18', '#76D7C4', '2024-04-06 04:55:05', '2024-04-06 04:55:05'),
(26, 9, 'Pepa', 'Consulta', '2024-04-18', '9.00', 'Consulta', '2024-04-18', '2024-04-18', '#D68910', '2024-04-06 04:57:23', '2024-04-06 04:57:23'),
(27, 11, 'Lucho', 'Vacunatorio', '2024-04-19', '11.00', 'Vacunatorio', '2024-04-19', '2024-04-19', '#9B59B6 ', '2024-04-06 04:58:09', '2024-04-06 04:58:09'),
(28, 33, 'Loli', 'Estudios', '2024-05-10', '13.00', 'Estudios', '2024-05-10', '2024-05-10', '#76D7C4', '2024-04-06 06:37:49', '2024-04-06 06:37:49'),
(29, 33, 'Ruperto', 'Consulta', '2024-04-12', '19.30', 'Consulta', '2024-04-12', '2024-04-12', '#D68910', '2024-04-06 07:17:53', '2024-04-06 07:17:53'),
(30, 33, 'Ruperto', 'Peluqueria', '2024-05-04', '16.30', 'Peluqueria', '2024-05-04', '2024-05-04', '#5DADE2', '2024-04-06 07:19:49', '2024-04-06 07:19:49'),
(31, 33, 'Rabito', 'Peluqueria', '2024-05-11', '15.00', 'Peluqueria', '2024-05-11', '2024-05-11', '#5DADE2', '2024-04-06 08:19:08', '2024-04-06 08:19:08'),
(32, 33, 'Loli', 'Vacunatorio', '2024-05-11', '17.30', 'Vacunatorio', '2024-05-11', '2024-05-11', '#9B59B6 ', '2024-04-06 08:19:55', '2024-04-06 08:19:55'),
(33, 33, 'Loli', 'Consulta', '2024-04-23', '10.30', 'Consulta', '2024-04-23', '2024-04-23', '#D68910', '2024-04-06 09:02:36', '2024-04-06 09:02:36'),
(35, 9, 'Marita', 'Peluqueria', '2024-05-15', '9.30', 'Peluqueria', '2024-05-15', '2024-05-15', '#5DADE2', '2024-04-06 09:17:56', '2024-04-06 09:17:56'),
(36, 13, 'Negro', 'Consulta', '2024-05-03', '16.30', 'Consulta', '2024-05-03', '2024-05-03', '#D68910', '2024-04-06 21:13:02', '2024-04-06 21:13:02'),
(37, 13, 'Negro', 'Laboratorio', '2024-05-02', '8.30', 'Laboratorio', '2024-05-02', '2024-05-02', '#EDBB99', '2024-04-06 21:18:26', '2024-04-06 21:18:26'),
(38, 5, 'Negra', 'Peluqueria', '2024-05-25', '13.00', 'Peluqueria', '2024-05-25', '2024-05-25', '#5DADE2', '2024-04-06 21:48:32', '2024-04-06 21:48:32'),
(39, 5, 'Negro', 'Estudios', '2024-05-03', '10.00', 'Estudios', '2024-05-03', '2024-05-03', '#76D7C4', '2024-04-06 22:13:36', '2024-04-06 22:13:36'),
(40, 9, 'Pepa', 'Estudios', '2024-05-10', '13.30', 'Estudios', '2024-05-10', '2024-05-10', '#76D7C4', '2024-04-06 22:23:20', '2024-04-06 22:23:20'),
(41, 14, 'Axel', 'Laboratorio', '2024-06-01', '8.00', 'Laboratorio', '2024-06-01', '2024-06-01', '#EDBB99', '2024-04-06 22:39:07', '2024-04-06 22:39:07'),
(44, 5, 'Rubio', 'Peluqueria', '2024-04-26', '19.30', 'Peluqueria', '2024-04-26', '2024-04-26', '#5DADE2', '2024-04-08 17:36:32', '2024-04-08 17:36:32');

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
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `token` varchar(64) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vencimiento_token` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellido`, `email`, `password`, `cargo`, `fyh_creacion`, `fyh_actualizacion`, `token`, `vencimiento_token`) VALUES
(1, 'Gustavo Ariel', 'Barrajón ', 'guarba@hotmail.com', '$2y$10$Hi2PdQ/4euwXV2gNkS8Zn.lP0nclpA7O8KHGVuMh/WdizdjgPhiUW', 'administrador', '2023-12-21 01:44:38', '2024-04-06 23:54:51', NULL, NULL),
(5, 'Roberto Martín', 'Flores', 'rflowers@hotmail.com', '$2y$10$CoQ7cj.6pIiWJ/up.31N6u.BkMhByf..h6rEzCP3DOKO8N2COgRCm', 'cliente', '2023-11-05 00:00:00', '2024-04-07 02:39:27', NULL, NULL),
(9, 'Martha', 'Sanchez', 'marthasanchez@hotmail.com', '$2y$10$rDEZK/2ZllkdUFZNF1B1FOiK/s7CS3jC4SPG6RRpuwjgcY8SG./SS', 'cliente', '2023-12-23 01:20:42', NULL, NULL, NULL),
(11, 'Martha', 'Legrand', 'ml@hotmail.com', '$2y$10$9JK0BNOYFZzvdKEHmIQpC.Rd0INDA7kAeeAYr9aZXnSW.504HAgna', 'cliente', '2023-12-23 01:45:36', '2024-04-03 17:06:34', NULL, NULL),
(13, 'María Laura', 'López García', 'lp@gmail.com', '$2y$10$AlyrSCD3QFadU08qaE3R1.sCybrae3d1J3Mmzy5SWla8uMZSDuwEy', 'cliente', '2023-12-23 02:45:14', '2024-04-06 21:14:17', NULL, NULL),
(14, 'Luis', 'Gómez', 'lgomez@hotmail.com', '$2y$10$Swka0OFDbJvO1lhoC0HCTuSshBAG0aY2l7cBOJ8k1FWBfmTOyf0Qm', 'cliente', '2023-12-23 02:47:14', NULL, NULL, NULL),
(15, 'Roberto', 'Flores', 'flowersrobert@gmail.com', '$2y$10$SnK9QF5o3Tw65/sLfuU9Oe14EqJAvbP1EXyaZa5hwBJg3ix4Wx3Iy', 'cliente', '2023-12-23 02:48:19', NULL, NULL, NULL),
(16, 'Pedro', 'Prado', 'pp89@hotmail.com', '$2y$10$SCpfjXbV9DbFiP0lcFyBMuNfepL/p3o75BzpBa8Y666uMHwI90J6y', 'cliente', '2023-12-23 02:53:15', NULL, NULL, NULL),
(17, 'Luis', 'Martinez', 'llmm@gamil.com', '$2y$10$Z/jzNYa2KSnZt8ccHqYCD.jWFVjx2cBFims6mWP8.Tjr3GQdoaUn.', 'cliente', '2023-12-23 03:34:56', NULL, NULL, NULL),
(18, 'Valeria', 'Britos', 'valebri@hotmail.com', '$2y$10$j8n3t1nALtreJ0dabkyBw.hizFSr3oWyBmULC7efk2YrRIu33efmi', 'cliente', '2023-12-24 01:01:01', NULL, NULL, NULL),
(19, 'Marcos', 'García', 'margar@hotmail.com', '$2y$10$l.QuIHmWLHRAz7HWqts1aO2rLiM5MQu.Kw4uzc8nq6oeYxh5KUS3y', 'cliente', '2023-12-24 04:53:34', NULL, NULL, NULL),
(20, 'Pedro', 'P', 'p@p.com', '$2y$10$au0Q0fzk6lxbR/5SB.gAcOMDdZ5JoQ8im7XxS2Ij2oYfC25m/BcMa', 'cliente', '2024-03-02 15:40:09', NULL, NULL, NULL),
(21, 'Ariel', 'Alvarez', 'aa@gmail.com', '$2y$10$armI9uXFjilNs0EPsXbE3OG9R9OD5aCJ0azQH91bsVOb5D6piu1Nq', 'cliente', '2024-03-02 15:42:48', NULL, NULL, NULL),
(22, 'Luisa', 'Lane', 'luisal@hotmail.com', '$2y$10$/vQ93fpDgJFASN/PR/0Iz.ObeUj0B4xFpA8.j9BR9Uqkv9IVW8D/S', 'cliente', '2024-03-02 15:44:42', NULL, NULL, NULL),
(23, 'Gastón', 'Solari', 'gs@hotmail.com', '$2y$10$FWjAhGOkCDqPhop2rAs8J.RMQJbGpz.pbQsKR8e.IQDllLJJfCaRK', 'cliente', '2024-03-02 15:46:58', NULL, NULL, NULL),
(24, 'Pedro', 'Pérez', 'p@pedrop.com', '$2y$10$Ky7EhIZwnzWnRSeOyNd53e0wBOeZPwO66U/9gi8DKOskGfZxDfOFK', 'cliente', '2024-03-02 15:49:32', '2024-04-07 02:53:12', NULL, NULL),
(25, 'Diego', 'García', 'dg@dgsoluciones.com', '$2y$10$Lk1uzowz70j55sulGqVLWeLkQW.ZsVgPBzIGsa2LcXjCoXQQDuKSm', 'cliente', '2024-03-02 15:59:30', NULL, NULL, NULL),
(26, 'Ariel', 'Alvarez', 'aalvarez@gmail.com', '$2y$10$xyOwYZvMVPhQ36pZ7qGzl.eFTLkD7cUcF6//.Xz3xJnPj0OFDWSCS', 'cliente', '2024-03-02 16:09:06', NULL, NULL, NULL),
(33, 'Gustavo', 'Barrajón', 'gustavobarrajon@hotmail.com', '$2y$10$nThuyvitVVbwBJnupjPLqODtCXtrZbCORUmtx.YHEHlqLLNKYIyVG', 'cliente', '2024-04-06 03:12:31', NULL, NULL, NULL),
(37, 'Luis', 'Pérez', 'lperez@gmail.com', '$2y$10$3aBv5z82XmM35QZazQP8Ae4KjnVADFN2gQWRVopn.g3iqzeiLcB6G', 'cliente', '2024-04-07 04:15:16', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;
