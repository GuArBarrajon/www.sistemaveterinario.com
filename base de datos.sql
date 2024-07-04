-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2024 a las 11:40:34
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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_venta`, `id_producto`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(8, 8, 9, 3, '2024-04-22 08:19:18', '0000-00-00 00:00:00'),
(9, 9, 11, 1, '2024-04-22 08:21:34', '0000-00-00 00:00:00'),
(10, 9, 12, 1, '2024-04-22 08:21:48', '0000-00-00 00:00:00'),
(11, 10, 10, 1, '2024-04-22 08:24:06', '0000-00-00 00:00:00'),
(12, 11, 12, 2, '2024-04-22 08:48:37', '0000-00-00 00:00:00'),
(13, 12, 10, 1, '2024-04-22 09:57:17', '0000-00-00 00:00:00'),
(14, 12, 10, 1, '2024-04-22 09:58:07', '0000-00-00 00:00:00'),
(18, 15, 10, 1, '2024-04-28 23:48:47', '0000-00-00 00:00:00'),
(21, 16, 10, 1, '2024-04-29 00:08:39', '0000-00-00 00:00:00'),
(22, 16, 12, 1, '2024-04-29 00:08:47', '0000-00-00 00:00:00'),
(44, 20, 11, 1, '2024-06-17 19:05:23', '0000-00-00 00:00:00'),
(47, 21, 9, 2, '2024-06-17 19:44:54', '0000-00-00 00:00:00'),
(48, 22, 9, 1, '2024-06-17 19:47:38', '0000-00-00 00:00:00'),
(50, 23, 9, 1, '2024-06-17 19:54:09', '0000-00-00 00:00:00'),
(52, 24, 9, 1, '2024-06-17 20:46:25', '0000-00-00 00:00:00'),
(53, 25, 9, 1, '2024-06-17 20:47:48', '0000-00-00 00:00:00'),
(55, 26, 9, 1, '2024-06-18 02:16:31', '0000-00-00 00:00:00'),
(56, 27, 12, 1, '2024-06-18 02:17:38', '0000-00-00 00:00:00'),
(72, 28, 9, 1, '2024-06-28 00:34:54', '0000-00-00 00:00:00'),
(74, 28, 12, 2, '2024-06-28 00:35:47', '0000-00-00 00:00:00'),
(75, 29, 9, 1, '2024-06-28 00:38:01', '0000-00-00 00:00:00'),
(76, 29, 11, 1, '2024-06-28 00:38:14', '0000-00-00 00:00:00');

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
  `fyh_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_proveedor`, `id_producto`, `id_usuario`, `nro_compra`, `fecha_compra`, `comprobante`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 10, 1, 1, '2024-04-09', 'Factura', '5000', 50, '2024-04-09 09:03:02', '2024-04-22 01:48:44'),
(10, 5, 9, 1, 2, '2024-04-15', 'Factura 23', '3400', 5, '2024-04-09 23:07:16', '2024-04-13 09:32:01'),
(11, 4, 12, 1, 3, '2024-04-09', 'Factura 2023', '23000', 15, '2024-04-09 23:14:45', '0000-00-00 00:00:00'),
(13, 1, 11, 1, 5, '2024-04-09', 'Factura 2010', '7000', 10, '2024-04-09 23:28:06', '0000-00-00 00:00:00'),
(14, 1, 11, 1, 6, '2024-04-10', 'Factura 001', '7000', 2, '2024-04-10 00:05:19', '0000-00-00 00:00:00'),
(15, 1, 9, 1, 7, '2024-04-10', 'Factura 4', '3500', 1, '2024-04-10 00:38:43', '0000-00-00 00:00:00'),
(16, 3, 12, 1, 8, '2024-04-10', 'Factura 2222', '23100', 10, '2024-04-10 01:52:41', '0000-00-00 00:00:00'),
(17, 5, 10, 1, 9, '2024-04-10', 'Factura 2002', '6050', 5, '2024-04-10 02:41:22', '0000-00-00 00:00:00');

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
(9, 'p00001', 'Pretal ', 'Arnes Alitas Regulable Con Correa Para Gatos', '2023-12-25-03-57-54pretal gato.webp', 10, 5, 20, 3400, 4420, '2023-12-05', '2024-04-13 09:27:15', '2024-06-28 00:38:55', 1),
(10, 'p00002', 'Shampoo Perros Gatos', ' Espuma Baño Seco + Rasqueta Masajeador', '2023-12-25-04-00-10shampu perro.webp', 10, 5, 20, 5000, 6500, '2023-12-03', '2023-12-25 04:00:10', '2024-04-29 00:08:56', 1),
(11, 'p00003', 'Correa De Perros', ' 5 Metros Larga Reforzada Mosquetón Grande', '2023-12-25-04-01-06correa.webp', 18, 5, 25, 7000, 9100, '2023-12-18', '2023-12-25 04:01:06', '2024-06-28 00:38:55', 1),
(12, 'p00004', 'Pedigree Óptima Digestión Etapa 2', 'Alimento  para perro adulto todos los tamaños sabor carne, pollo y cereales en bolsa de 21 kg', '2023-12-25-04-02-22alimneto perro.webp', 33, 10, 50, 23100, 30030, '2023-12-14', '2024-04-09 23:14:45', '2024-06-28 00:36:25', 1);

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
  `fyh_actualizacion` datetime DEFAULT NULL
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
  `fyh_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_usuario`, `nombre_mascota`, `tipo_servicio`, `fecha`, `hora`, `title`, `start`, `end`, `color`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(5, 26, 'Rabito', 'Consulta', '2024-03-15', '14.00', 'Consulta', '2024-03-15', '2024-03-15', '#D68910', '2024-03-02 19:46:00', '2024-03-02 19:46:00'),
(6, 26, 'Selva', 'Consulta', '2024-03-26', '10.00', 'Consulta', '2024-03-26', '2024-03-26', '#D68910', '2024-03-02 19:55:50', '2024-03-02 19:55:50'),
(7, 26, 'Selva', 'Peluqueria', '2024-03-26', '10.30', 'Peluqueria', '2024-03-26', '2024-03-26', '#5DADE2', '2024-03-02 19:56:16', '2024-03-02 19:56:16'),
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
(35, 9, 'Marita', 'Peluqueria', '2024-05-15', '9.30', 'Peluqueria', '2024-05-15', '2024-05-15', '#5DADE2', '2024-04-06 09:17:56', '2024-04-06 09:17:56'),
(36, 13, 'Negro', 'Consulta', '2024-05-03', '16.30', 'Consulta', '2024-05-03', '2024-05-03', '#D68910', '2024-04-06 21:13:02', '2024-04-06 21:13:02'),
(37, 13, 'Negro', 'Laboratorio', '2024-05-02', '8.30', 'Laboratorio', '2024-05-02', '2024-05-02', '#EDBB99', '2024-04-06 21:18:26', '2024-04-06 21:18:26'),
(38, 5, 'Negra', 'Peluqueria', '2024-05-25', '13.00', 'Peluqueria', '2024-05-25', '2024-05-25', '#5DADE2', '2024-04-06 21:48:32', '2024-04-06 21:48:32'),
(39, 5, 'Negro', 'Estudios', '2024-05-03', '10.00', 'Estudios', '2024-05-03', '2024-05-03', '#76D7C4', '2024-04-06 22:13:36', '2024-04-06 22:13:36'),
(40, 9, 'Pepa', 'Estudios', '2024-05-10', '13.30', 'Estudios', '2024-05-10', '2024-05-10', '#76D7C4', '2024-04-06 22:23:20', '2024-04-06 22:23:20'),
(41, 14, 'Axel', 'Laboratorio', '2024-06-01', '8.00', 'Laboratorio', '2024-06-01', '2024-06-01', '#EDBB99', '2024-04-06 22:39:07', '2024-04-06 22:39:07'),
(44, 5, 'Rubio', 'Peluqueria', '2024-04-26', '19.30', 'Peluqueria', '2024-04-26', '2024-04-26', '#5DADE2', '2024-04-08 17:36:32', '2024-04-08 17:36:32'),
(45, 5, 'Rabito', 'Peluqueria', '2024-06-20', '11.00', 'Peluqueria', '2024-06-20', '2024-06-20', '#5DADE2', '2024-06-17 12:52:45', '2024-06-17 12:52:45'),
(46, 9, 'Rabo', 'Consulta', '2024-06-21', '14.00', 'Consulta', '2024-06-21', '2024-06-21', '#D68910', '2024-06-17 12:55:11', '2024-06-17 12:55:11'),
(47, 14, 'Petiso', 'Estudios', '2024-06-21', '15.00', 'Estudios', '2024-06-21', '2024-06-21', '#76D7C4', '2024-06-17 12:55:41', '2024-06-17 12:55:41'),
(51, 5, 'Petisa', 'Vacunatorio', '2024-07-04', '11.30', 'Vacunatorio', '2024-07-04', '2024-07-04', '#9B59B6 ', '2024-06-18 01:08:36', '2024-06-18 01:08:36'),
(52, 9, 'Felipa', 'Consulta', '2024-07-06', '15.00', 'Consulta', '2024-07-06', '2024-07-06', '#D68910', '2024-06-18 01:18:28', '2024-06-18 01:18:28'),
(53, 23, 'Lucho', 'Laboratorio', '2024-07-10', '9.00', 'Laboratorio', '2024-07-10', '2024-07-10', '#EDBB99', '2024-06-18 01:21:05', '2024-06-18 01:21:05'),
(54, 11, 'Rabo', 'Estudios', '2024-07-03', '10.00', 'Estudios', '2024-07-03', '2024-07-03', '#76D7C4', '2024-06-18 01:24:15', '2024-06-18 01:24:15'),
(55, 13, 'Marixa', 'Peluqueria', '2024-07-04', '16.30', 'Peluqueria', '2024-07-04', '2024-07-04', '#5DADE2', '2024-06-18 01:26:03', '2024-06-18 01:26:03'),
(57, 26, 'Pedro', 'Consulta', '2024-07-04', '12.00', 'Consulta', '2024-07-04', '2024-07-04', '#D68910', '2024-06-18 01:28:07', '2024-06-18 01:28:07'),
(58, 22, 'Super', 'Consulta', '2024-07-05', '12.30', 'Consulta', '2024-07-05', '2024-07-05', '#D68910', '2024-06-18 01:30:03', '2024-06-18 01:30:03'),
(59, 24, 'Colita', 'Consulta', '2024-07-05', '12.00', 'Consulta', '2024-07-05', '2024-07-05', '#D68910', '2024-06-18 01:37:30', '2024-06-18 01:37:30'),
(63, 13, 'Chacho', 'Estudios', '2024-07-23', '10.00', 'Estudios', '2024-07-23', '2024-07-23', '#76D7C4', '2024-06-18 01:56:37', '2024-06-18 01:56:37'),
(64, 22, 'Super', 'Peluqueria', '2024-07-27', '16.30', 'Peluqueria', '2024-07-27', '2024-07-27', '#5DADE2', '2024-06-18 02:01:19', '2024-06-18 02:01:19'),
(67, 13, 'Petiso', 'Vacunatorio', '2024-07-06', '13.00', 'Vacunatorio', '2024-07-06', '2024-07-06', '#9B59B6 ', '2024-06-18 02:03:45', '2024-06-18 02:03:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `celular` int(11) NOT NULL,
  `calle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `altura` int(11) NOT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
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

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellido`, `email`, `celular`, `calle`, `altura`, `localidad`, `password`, `cargo`, `fyh_creacion`, `fyh_actualizacion`, `token`, `vencimiento_token`) VALUES
(1, 'Gustavo Ariel', 'Barrajón ', 'admin@hotmail.com', 1144445555, 'Avenida Imaginaria', 333, 'González Catán', '$2y$10$Hi2PdQ/4euwXV2gNkS8Zn.lP0nclpA7O8KHGVuMh/WdizdjgPhiUW', 'administrador', '2023-12-21 01:44:38', '2024-06-17 13:58:56', NULL, NULL),
(5, 'Roberto Martín', 'Flores', 'rflowers@hotmail.com', 1144445555, 'Pasaje de los Sueños', 1230, 'González Catán', '$2y$10$CoQ7cj.6pIiWJ/up.31N6u.BkMhByf..h6rEzCP3DOKO8N2COgRCm', 'cliente', '2023-11-05 00:00:00', '2024-04-07 02:39:27', NULL, NULL),
(9, 'Martha', 'Sanchez', 'marthasanchez@hotmail.com', 1144445555, 'Calle de la Fantasía', 23, 'Laferrere', '$2y$10$rDEZK/2ZllkdUFZNF1B1FOiK/s7CS3jC4SPG6RRpuwjgcY8SG./SS', 'cliente', '2023-12-23 01:20:42', NULL, NULL, NULL),
(11, 'Martha', 'Legrand', 'ml@hotmail.com', 1144445555, 'Avenida de la Ilusión ', 896, 'González Catán', '$2y$10$9JK0BNOYFZzvdKEHmIQpC.Rd0INDA7kAeeAYr9aZXnSW.504HAgna', 'cliente', '2023-12-23 01:45:36', '2024-04-03 17:06:34', NULL, NULL),
(13, 'María Laura', 'López García', 'lp@gmail.com', 1144445555, 'Calle del Misterio', 500, 'González Catán', '$2y$10$AlyrSCD3QFadU08qaE3R1.sCybrae3d1J3Mmzy5SWla8uMZSDuwEy', 'cliente', '2023-12-23 02:45:14', '2024-04-06 21:14:17', NULL, NULL),
(14, 'Luis', 'Gómez', 'lgomez@hotmail.com', 1144445555, 'Calle del Misterio', 402, 'Laferrere', '$2y$10$Swka0OFDbJvO1lhoC0HCTuSshBAG0aY2l7cBOJ8k1FWBfmTOyf0Qm', 'cliente', '2023-12-23 02:47:14', NULL, NULL, NULL),
(15, 'Roberto', 'Flores', 'flowersrobert@gmail.com', 1144445555, 'Calle Ficticia ', 123, 'González Catán', '$2y$10$SnK9QF5o3Tw65/sLfuU9Oe14EqJAvbP1EXyaZa5hwBJg3ix4Wx3Iy', 'cliente', '2023-12-23 02:48:19', NULL, NULL, NULL),
(16, 'Pedro', 'Prado', 'pp89@hotmail.com', 1144445555, 'Pasaje del Encanto', 120, 'Laferrere', '$2y$10$SCpfjXbV9DbFiP0lcFyBMuNfepL/p3o75BzpBa8Y666uMHwI90J6y', 'cliente', '2023-12-23 02:53:15', NULL, NULL, NULL),
(17, 'Luis', 'Martinez', 'llmm@gamil.com', 1144445555, 'Avenida de la Imaginación', 230, 'González Catán', '$2y$10$Z/jzNYa2KSnZt8ccHqYCD.jWFVjx2cBFims6mWP8.Tjr3GQdoaUn.', 'cliente', '2023-12-23 03:34:56', NULL, NULL, NULL),
(18, 'Valeria', 'Britos', 'valebri@hotmail.com', 1144445555, 'Calle de la Aventura', 1023, 'González Catán', '$2y$10$j8n3t1nALtreJ0dabkyBw.hizFSr3oWyBmULC7efk2YrRIu33efmi', 'cliente', '2023-12-24 01:01:01', NULL, NULL, NULL),
(19, 'Marcos', 'García', 'margar@hotmail.com', 1144445555, 'Avenida de los Recuerdos', 5236, 'González Catán', '$2y$10$l.QuIHmWLHRAz7HWqts1aO2rLiM5MQu.Kw4uzc8nq6oeYxh5KUS3y', 'cliente', '2023-12-24 04:53:34', NULL, NULL, NULL),
(20, 'Pedro', 'P', 'p@p.com', 1144445555, 'Calle del Ensueño', 25, 'González Catán', '$2y$10$au0Q0fzk6lxbR/5SB.gAcOMDdZ5JoQ8im7XxS2Ij2oYfC25m/BcMa', 'cliente', '2024-03-02 15:40:09', NULL, NULL, NULL),
(21, 'Ariel', 'Alvarez', 'aa@gmail.com', 1144445555, 'Avenida de la Magia', 630, 'Laferrere', '$2y$10$armI9uXFjilNs0EPsXbE3OG9R9OD5aCJ0azQH91bsVOb5D6piu1Nq', 'cliente', '2024-03-02 15:42:48', NULL, NULL, NULL),
(22, 'Luisa', 'Lane', 'luisal@hotmail.com', 1144445555, 'Pasaje del Misterio', 789, 'Laferrere', '$2y$10$/vQ93fpDgJFASN/PR/0Iz.ObeUj0B4xFpA8.j9BR9Uqkv9IVW8D/S', 'cliente', '2024-03-02 15:44:42', NULL, NULL, NULL),
(23, 'Gastón', 'Solari', 'gs@hotmail.com', 1144445555, 'Avenida de la Esperanza', 2057, 'González Catán', '$2y$10$FWjAhGOkCDqPhop2rAs8J.RMQJbGpz.pbQsKR8e.IQDllLJJfCaRK', 'cliente', '2024-03-02 15:46:58', NULL, NULL, NULL),
(24, 'Pedro', 'Pérez', 'p@pedrop.com', 1144445555, 'Calle del Pasado', 147, 'González Catán', '$2y$10$Ky7EhIZwnzWnRSeOyNd53e0wBOeZPwO66U/9gi8DKOskGfZxDfOFK', 'cliente', '2024-03-02 15:49:32', '2024-04-07 02:53:12', NULL, NULL),
(25, 'Diego', 'García', 'dg@dgsoluciones.com', 1144445555, 'Avenida del Futuro', 159, 'Laferrere', '$2y$10$Lk1uzowz70j55sulGqVLWeLkQW.ZsVgPBzIGsa2LcXjCoXQQDuKSm', 'cliente', '2024-03-02 15:59:30', NULL, NULL, NULL),
(26, 'Ariel', 'Alvarez', 'aalvarez@gmail.com', 1144445555, 'Calle de la Amistad', 1236, 'González Catán', '$2y$10$xyOwYZvMVPhQ36pZ7qGzl.eFTLkD7cUcF6//.Xz3xJnPj0OFDWSCS', 'cliente', '2024-03-02 16:09:06', NULL, NULL, NULL),
(37, 'Luis', 'Pérez', 'lperez@gmail.com', 1144445555, 'Calle de los Secretos', 122, 'Laferrere', '$2y$10$3aBv5z82XmM35QZazQP8Ae4KjnVADFN2gQWRVopn.g3iqzeiLcB6G', 'cliente', '2024-04-07 04:15:16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` float NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `total`, `fyh_creacion`, `fyh_actualizacion`, `fecha`) VALUES
(8, 5, 13260, '2024-04-22 08:19:54', '0000-00-00 00:00:00', '2024-04-22'),
(9, 11, 39130, '2024-04-22 08:22:01', '0000-00-00 00:00:00', '2024-04-22'),
(10, 9, 6500, '2024-04-22 08:24:15', '0000-00-00 00:00:00', '2024-04-22'),
(11, 25, 60060, '2024-04-22 08:49:07', '0000-00-00 00:00:00', '2024-04-22'),
(12, 13, 13000, '2024-04-22 09:58:17', '0000-00-00 00:00:00', '2024-04-22'),
(15, 13, 6500, '2024-04-28 23:48:55', '0000-00-00 00:00:00', '2024-04-28'),
(16, 14, 36530, '2024-04-29 00:08:56', '0000-00-00 00:00:00', '2024-04-29'),
(20, 33, 9100, '2024-06-17 19:05:37', '0000-00-00 00:00:00', '2024-06-17'),
(21, 33, 8840, '2024-06-17 19:45:45', '0000-00-00 00:00:00', '2024-06-17'),
(22, 33, 4420, '2024-06-17 19:48:15', '0000-00-00 00:00:00', '2024-06-17'),
(23, 11, 4420, '2024-06-17 19:54:15', '0000-00-00 00:00:00', '2024-06-17'),
(24, 9, 4420, '2024-06-17 20:46:38', '0000-00-00 00:00:00', '2024-06-17'),
(25, 33, 4420, '2024-06-17 20:47:53', '0000-00-00 00:00:00', '2024-06-17'),
(26, 23, 4420, '2024-06-18 02:16:46', '0000-00-00 00:00:00', '2024-06-18'),
(27, 44, 30030, '2024-06-18 02:17:46', '0000-00-00 00:00:00', '2024-06-18'),
(28, 5, 64480, '2024-06-28 00:36:25', '0000-00-00 00:00:00', '2024-06-28'),
(29, 11, 13520, '2024-06-28 00:38:55', '0000-00-00 00:00:00', '2024-06-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;