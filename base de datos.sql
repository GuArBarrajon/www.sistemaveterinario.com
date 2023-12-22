-- Active: 1692511690874@@127.0.0.1@3306@veterinaria
-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 19:18:03
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
COMMIT;