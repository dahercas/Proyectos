-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2023 a las 17:44:21
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
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `Identificador` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`Identificador`, `nombre`, `tipo`) VALUES
(1, 'LuzCoCina', 'Luces'),
(2, 'LuzSalon', 'Luces'),
(3, 'LuzCocina2', 'Luces'),
(4, 'LuzSalon2', 'Luces'),
(5, 'LuzSalon3', 'Luces'),
(7, 'LuzSalon4', 'Luces');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usomensual`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usomensual` (
`Nombre` varchar(255)
,`Apellidos` varchar(255)
,`Dispositivo` varchar(255)
,`Tiempo` decimal(65,0)
,`Mes` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usos`
--

CREATE TABLE `usos` (
  `Identificador` int(255) NOT NULL,
  `idusuario` varchar(255) NOT NULL,
  `iddispositivo` varchar(255) NOT NULL,
  `tiempo` int(255) NOT NULL,
  `mes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usos`
--

INSERT INTO `usos` (`Identificador`, `idusuario`, `iddispositivo`, `tiempo`, `mes`) VALUES
(1, '1', '1', 30, 'Mayo'),
(2, '1', '1', 0, 'Mayo'),
(3, '1', '3', 0, 'Mayo'),
(4, '1', '1', 0, 'Mayo'),
(5, '1', '1', 5, 'Mayo'),
(6, '1', '1', 7, 'Mayo'),
(7, '1', '1', 9, 'Mayo'),
(8, '1', '1', 4, 'Mayo'),
(9, '1', '1', 10, 'Mayo'),
(10, '1', '2', 10, 'Mayo'),
(11, '1', '5', 10, 'Mayo'),
(12, '1', '1', 3, 'Mayo'),
(13, '1', '1', 10, 'Mayo'),
(14, '1', '3', 5, 'Mayo'),
(15, '1', '3', 5, 'Mayo'),
(16, '1', '2', 0, 'Mayo'),
(17, '1', '2', 0, 'Mayo'),
(18, '1', '2', 1, 'Mayo'),
(19, '1', '2', 1, 'Mayo'),
(20, '1', '2', 0, 'Mayo'),
(21, '1', '2', 0, 'Mayo'),
(22, '1', '2', 1, 'Mayo'),
(23, '1', '2', 1, 'Mayo'),
(24, '1', '1', 7, 'Mayo'),
(25, '1', '3', 7, 'Mayo'),
(26, '1', '4', 6, 'Mayo'),
(27, '2', '4', 9, 'Mayo'),
(28, '6', '4', 4, 'Mayo'),
(29, '1', '1', 10, 'Mayo'),
(30, '1', '1', 10, 'Mayo'),
(31, '1', '3', 2, 'Mayo'),
(32, '1', '1', 10, 'Mayo'),
(33, '1', '1', 4, 'Mayo'),
(34, '1', '1', 4, 'Mayo'),
(35, '1', '4', 4, 'Mayo'),
(36, '1', '3', 3, 'Mayo'),
(37, '1', '1', 5, 'Agosto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Identificador` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Identificador`, `usuario`, `contrasena`, `nombre`, `apellidos`, `email`, `telefono`) VALUES
(1, 'danher', 'danher', 'Daniel', 'Hernandez', 'dani@mail.com', '00000'),
(2, 'lumar', 'lumar', 'Lucas', 'Martin', 'lucas@mail.com', '6547654'),
(6, 'abc', 'abc', 'Alvaro', 'Hernandez', 'alvaro@mail.com', '456789'),
(7, 'aaaa', 'aaaaa', 'aaaaa', 'aaaaa', 'aaaa@aaa.com', '111111'),
(8, 'bbbb', 'bbbb', 'bbbb', 'bbbb', 'bbbb@bbb.bbbb', '234567890'),
(9, 'cccc', 'cccc', 'cccc', 'cccc', 'cccc2@ccc.ccc', '33333'),
(10, '1111', '1111', '1111', '1111', '1111', '1111'),
(11, '2222', '2222', '222', '2222', '2222', '2222'),
(12, 'mario', 'mario', 'mario', 'mario', 'mario@correo.com', '5555');

-- --------------------------------------------------------

--
-- Estructura para la vista `usomensual`
--
DROP TABLE IF EXISTS `usomensual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usomensual`  AS SELECT `usuarios`.`nombre` AS `Nombre`, `usuarios`.`apellidos` AS `Apellidos`, `dispositivos`.`nombre` AS `Dispositivo`, sum(`usos`.`tiempo`) AS `Tiempo`, `usos`.`mes` AS `Mes` FROM ((`usos` left join `dispositivos` on(`dispositivos`.`Identificador` = `usos`.`iddispositivo`)) left join `usuarios` on(`usuarios`.`Identificador` = `usos`.`idusuario`)) GROUP BY `usuarios`.`nombre`, `usuarios`.`apellidos`, `dispositivos`.`nombre`, `usos`.`mes` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `usos`
--
ALTER TABLE `usos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usos`
--
ALTER TABLE `usos`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
