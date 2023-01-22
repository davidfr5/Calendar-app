-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-06-2022 a las 17:38:29
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `cod_amigo` int(255) NOT NULL,
  `amigo1` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amigo2` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`cod_amigo`, `amigo1`, `amigo2`) VALUES
(20, 'repo', 'repo'),
(28, 'tobilla', 'tobilla'),
(32, 'repo', 'nono'),
(33, 'prueba', 'nono'),
(34, 'tobilla', 'tobilla'),
(38, 'tobilla', 'nono');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `cod_evento` int(11) NOT NULL,
  `nom_evento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_evento` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creador_evento` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fec_ev` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`cod_evento`, `nom_evento`, `desc_evento`, `creador_evento`, `fec_ev`) VALUES
(1, 'prueba', 'prueba1 desc', 'tobilla', '2022-06-04'),
(3, 'dato', 'desc 2', 'tobilla', '2022-06-02'),
(4, 'VER', 'NO', 'ASD', '2022-06-03'),
(5, 'fubol', 'no puedo tengo fubol', 'prueba', '2022-07-05'),
(6, 'baloncesto', 'cosas', 'prueba', '2022-07-05'),
(8, 'evento2', 'psoda', 'tobilla', '2022-06-08'),
(9, 'evento3', 'q', 'tobilla', '2022-06-01'),
(10, 'evenm1', 'q', 'prueba', '2022-07-08'),
(11, 'evenm2', 'q', 'prueba', '2022-07-08'),
(12, 'evento', 'q', 'prueba', '2022-07-05'),
(13, 'p2', 'm', 'prueba', '2022-07-01'),
(14, 'p3', 'd', 'prueba', '2022-07-10'),
(15, 'dinam', 'd', 'tobilla', '2022-06-26'),
(16, 'eqwesd1', 'ewq', 'tobilla', '2022-06-15'),
(17, 'probando', 'eqw', 'tobilla', '2022-06-10'),
(18, 'eq', 'eq', 'tobilla', '2022-06-10'),
(19, 'dsa', 'ds', 'tobilla', '2022-06-29'),
(20, 'pruebaConex', 'qe', 'tobilla', '2022-06-07'),
(21, 'eqe', 'pochi e un gaitas', 'tobilla', '2022-06-14'),
(23, 'dada', 'dada', 'tobilla', '2022-06-10'),
(25, 'das', 'das', 'tobilla', '2022-06-17'),
(26, 'ewq', 'ewq', 'tobilla', '2022-06-17'),
(33, 'eqwtqwtqw', 'tqwtqwtq', 'tobilla', '2022-06-22'),
(34, 'eqweqwe12312', 'qweqweqw', 'tobilla', '2022-06-24'),
(35, 'eqweqwe', 'qweqweq', 'tobilla', '2022-06-23'),
(36, 'repoprueba', 'qweqwe', 'prueba', '2022-06-15'),
(37, 'qeqweqREPO', 'qweqwe', 'tobilla', '2022-06-23'),
(38, 'prueba2', 'qweqweqwe', 'prueba', '2022-06-23'),
(40, 'eqweqweqweq', 'tqwtqwt', 'nono', '2022-06-30'),
(41, 'pasa', 'dasdasda', 'tobilla', '2022-07-08'),
(42, 'provEven', 'adsa', 'tobilla', '2022-06-28'),
(43, 'pasatio', 'qwewqeqwe', 'nono', '2022-06-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_amigo`
--

CREATE TABLE `evento_amigo` (
  `cod_evento_ami` int(11) NOT NULL,
  `usuario` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evento_amigo`
--

INSERT INTO `evento_amigo` (`cod_evento_ami`, `usuario`, `cod_evento`) VALUES
(7, 'prueba', 39),
(8, 'repo', 40),
(9, 'prueba', 40),
(12, 'repo', 43),
(13, 'prueba', 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_amistad`
--

CREATE TABLE `solicitud_amistad` (
  `cod_sol` int(255) NOT NULL,
  `pers1` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pers2` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud_amistad`
--

INSERT INTO `solicitud_amistad` (`cod_sol`, `pers1`, `pers2`) VALUES
(33, 'tobilla', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contra` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contra`) VALUES
('mario', 'e54ee7e285fbb0275279143abc4c554e5314e7b417ecac83a5984a964facbaad68866a2841c3e83ddf125a2985566261c4014f9f960ec60253aebcda9513a9b4'),
('nono', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2'),
('prueba', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2'),
('repo', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2'),
('tobilla', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`cod_amigo`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`cod_evento`);

--
-- Indices de la tabla `evento_amigo`
--
ALTER TABLE `evento_amigo`
  ADD PRIMARY KEY (`cod_evento_ami`);

--
-- Indices de la tabla `solicitud_amistad`
--
ALTER TABLE `solicitud_amistad`
  ADD PRIMARY KEY (`cod_sol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `cod_amigo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `cod_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `evento_amigo`
--
ALTER TABLE `evento_amigo`
  MODIFY `cod_evento_ami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `solicitud_amistad`
--
ALTER TABLE `solicitud_amistad`
  MODIFY `cod_sol` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
