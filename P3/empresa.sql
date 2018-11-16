-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2018 a las 16:12:30
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `nombre` varchar(256) CHARACTER SET utf8 NOT NULL,
  `apellidos` varchar(256) CHARACTER SET utf8 NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `Departamento` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `Antiguedad` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `Sueldo` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `Sexo` set('Hombre','Mujer','Otro') DEFAULT NULL,
  `URL` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`nombre`, `apellidos`, `telefono`, `direccion`, `id`, `Departamento`, `Antiguedad`, `Sueldo`, `Sexo`, `URL`) VALUES
('Antonio', 'Reyes Romero', 123123, 'Glorieta media vida', 1, 'Recursos Humanos', '2 meses', '7000', 'Hombre', 'b1-8.png'),
('Julio', 'Alvarez Dominguez', 657493496, 'Calle sin fin', 2, 'Finanzas', '12 meses', '7000', 'Hombre', 'julio.jpg'),
('Luis', 'Jimenez Perez', 694837843, 'Calle falsa ', 3, 'Asistencia Tecnica', '13 meses', '7000', 'Hombre', 'luis.jpg'),
('Susana', 'Rodriguez Dovao', 634329443, 'Calle falsa', 4, 'Manufactura', '24 meses', '12000', 'Mujer', 'susana.jpg'),
('Patricia', 'Roldan Velasco', 11111, 'Calle falsa', 5, 'Asistencia Tecnica', '1 mes', '4000', 'Hombre', 'patricia.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
