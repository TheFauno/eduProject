-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2017 a las 21:36:44
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eduproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(3, 'EntretenciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cate_post`
--

CREATE TABLE `cate_post` (
  `fk_categorias` bigint(20) UNSIGNED NOT NULL,
  `fk_posts` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cate_post`
--

INSERT INTO `cate_post` (`fk_categorias`, `fk_posts`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 4),
(1, 4),
(1, 4),
(1, 5),
(3, 1),
(3, 2),
(3, 4),
(3, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` bigint(20) UNSIGNED NOT NULL,
  `posts_fk` bigint(20) UNSIGNED NOT NULL,
  `formato_contenido` varchar(5) NOT NULL,
  `mensaje_contenido` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `posts_fk`, `formato_contenido`, `mensaje_contenido`) VALUES
(4, 4, 'texto', 'dasdsadsada1'),
(5, 4, 'texto', 'asdasdsadadwqewqe2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id_post` bigint(20) UNSIGNED NOT NULL,
  `usuarios_fk` varchar(100) NOT NULL,
  `fecha_pub_post` datetime NOT NULL,
  `fecha_elim_post` datetime NOT NULL,
  `titulo_post` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id_post`, `usuarios_fk`, `fecha_pub_post`, `fecha_elim_post`, `titulo_post`) VALUES
(4, 'daza.camilos@gmail.com', '2017-06-16 00:00:00', '0000-00-00 00:00:00', 'asdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email_usuario` varchar(100) NOT NULL,
  `nombre_p_usuario` varchar(20) NOT NULL,
  `apaterno_p_usuario` varchar(20) NOT NULL,
  `amaterno_p_usuario` varchar(20) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `contrasena_usuario` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email_usuario`, `nombre_p_usuario`, `apaterno_p_usuario`, `amaterno_p_usuario`, `nombre_usuario`, `contrasena_usuario`) VALUES
('daza.camilos@gmail.com', 'camilo2', 'daza1', 'lavÃ­n', 'cdazal', '1234'),
('jdaza@gmail.com', 'joaquin', 'daza', 'lavÃ­n', 'jdaza', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `cate_post`
--
ALTER TABLE `cate_post`
  ADD KEY `fk_categorias` (`fk_categorias`,`fk_posts`),
  ADD KEY `fk_posts` (`fk_posts`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`),
  ADD UNIQUE KEY `id_contenido` (`id_contenido`),
  ADD KEY `posts_fk` (`posts_fk`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD UNIQUE KEY `id_post` (`id_post`),
  ADD KEY `email_usuario` (`usuarios_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email_usuario`),
  ADD KEY `email_usuario` (`email_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`posts_fk`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
