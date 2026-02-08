-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2026 a las 07:45:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clubconnect`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario_id`, `contenido`, `fecha`) VALUES
(1, 4, 'Buenas', '2026-02-06 17:20:16'),
(2, 1, 'holaa', '2026-02-06 17:21:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos`
--

CREATE TABLE `entrenamientos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenamientos`
--

INSERT INTO `entrenamientos` (`id`, `titulo`, `descripcion`, `fecha`, `hora`, `creado_en`) VALUES
(1, 'Entrenamiento sub17', 'dia de futbol', '2026-02-07', '07:00:00', '2026-02-06 16:20:29'),
(2, 'Entrenamiento sub17', 'futbol', '2026-02-07', '07:00:00', '2026-02-06 16:23:02'),
(3, 'Entrenamiento sub17', 'futbol', '2026-02-07', '07:00:00', '2026-02-06 16:24:49'),
(4, 'sub20', 'ffss', '2026-02-05', '07:00:00', '2026-02-06 16:44:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre`, `edad`, `posicion`, `creado_en`, `categoria`, `foto`) VALUES
(4, 'carlitos', 17, 'medio', '2026-02-06 17:34:08', 'Sub17', NULL),
(5, 'nene', 12, 'delantero', '2026-02-06 17:34:31', 'Sub15', NULL),
(6, 'otro', 17, 'medio', '2026-02-06 17:34:48', 'Sub17', NULL),
(7, 'martin', 30, 'portero', '2026-02-06 17:54:57', 'Primera', '1770400497_foto cv.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `contenido`, `fecha`) VALUES
(1, 'Victoria del fin de semana', 'El club ganó 3-1 y sigue primero en la tabla.', '2026-02-05 03:29:10'),
(2, 'Notica prueba', 'a ver', '2026-02-05 03:44:44'),
(3, '2da noti de prueba', 'contenido', '2026-02-05 03:59:59'),
(4, '4ta noticia', 'bla bla bla', '2026-02-06 00:55:44'),
(5, 'noticia como usuario', 'www', '2026-02-06 16:28:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `comentario_id`, `usuario_id`, `contenido`, `fecha`) VALUES
(1, 1, 1, 'hola vale', '2026-02-06 17:20:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` varchar(20) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`, `rol`) VALUES
(1, 'carlitos', 'm@gmail.com', '$2y$10$t8XkRxKUGlGUw/oRerpUves7.dDInkQX.3Uc7yfeJfcy8O8h9Kitq', '2026-02-05 03:08:36', 'admin'),
(2, 'tito', 't@gmail.com', '$2y$10$6EzMCItJD/Sji7kFWhsXMunibTbDC28DoMGFb0mWKFISHit7TR.ym', '2026-02-05 04:01:05', 'usuario'),
(3, 'martin', 'd@gmail.com', '$2y$10$J/OF4zvlL10uXAsr0VQrUOLCz5csbmzEu1r4LrpXRjBfud.oQnHHq', '2026-02-06 00:54:19', 'usuario'),
(4, 'vale', 'v@gmail.com', '$2y$10$Bh454L0DrzIw8X35pfPXr.pIVs5fsXh5hLPpuIMTn38bv.UgHKwF.', '2026-02-06 16:42:27', 'usuario'),
(5, 'registro', 'q@gmail.com', '$2y$10$CfvpM5UAg6KRvEko26OJiOw0AJxI5rVHLO/LYTIBuqqykGxjU29ZC', '2026-02-06 18:17:18', 'usuario'),
(8, 'registro1', 'qq@gmail.com', '$2y$10$wI53uIZoUB3wri0NxSk3mObNFzQVgVwfduUNDsp1AqXXKFPl5WtS2', '2026-02-06 18:18:27', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_id` (`comentario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
