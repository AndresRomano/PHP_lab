-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2023 a las 07:00:06
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
-- Base de datos: `bdphpproy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigo`
--

CREATE TABLE `amigo` (
  `idAmigo` int(11) NOT NULL,
  `usuario1` int(11) NOT NULL,
  `usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor-obra`
--

CREATE TABLE `autor-obra` (
  `idAutor-Obra` int(11) NOT NULL,
  `autor` int(11) DEFAULT NULL,
  `obra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `nombre`) VALUES
(2, 'Alan Wake'),
(1, 'Brandon Sanderson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL,
  `nombreCategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `nombreCategoria`) VALUES
(1, 'libro'),
(2, 'pelicula'),
(3, 'comic'),
(4, 'manga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion`
--

CREATE TABLE `coleccion` (
  `idcoleccion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `coleccion`
--

INSERT INTO `coleccion` (`idcoleccion`, `nombre`, `categoria`) VALUES
(1, 'Chainsaw Man (manga)', 'manga'),
(2, 'El Archivo De Las Tormentas (Libro)', 'libro'),
(3, 'Battle Chasers (Cómic)', 'comic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion-usuario`
--

CREATE TABLE `coleccion-usuario` (
  `idcoleccion-usuario` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `mensaje` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `nombre`) VALUES
(3, 'Comedia'),
(1, 'Fantasía'),
(4, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero-item`
--

CREATE TABLE `genero-item` (
  `idGeneroItem` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `iditem` int(11) NOT NULL,
  `coleccion` varchar(45) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `genero` varchar(45) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `autor` varchar(45) NOT NULL,
  `año` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`iditem`, `coleccion`, `titulo`, `genero`, `descripcion`, `autor`, `año`, `puntaje`, `imagen`, `fechaIngreso`) VALUES
(1, 'El Archivo De Las Tormentas (Libro)', '1: El Camino De Los Reyes', 'Fantasía', 'El camino de los reyes es una novela de fantasía épica escrita por el autor estadounidense Brandon Sanderson y el primer libro de la saga El archivo de las Tormentas.', 'Brandon Sanderson', 1997, NULL, '1-elCamDeR.JPG', '2023-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemdeseado-usuario`
--

CREATE TABLE `itemdeseado-usuario` (
  `iditemDeseado-Usuario` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idrol`, `rol`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

CREATE TABLE `puntaje` (
  `idpuntaje` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL,
  `comentario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `mensaje` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `permisos` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `password`, `fecha`, `permisos`, `imagen`) VALUES
(3, 'Manin', 'manin@gmail', '81dc9bdb52d04dc20036dbd8313ed055', '1995-05-10', 'usuario', NULL),
(4, 'pc2', 'pc2@pc2.com', '81dc9bdb52d04dc20036dbd8313ed055', '2000-12-18', 'usuario', NULL),
(5, 'reg4', 'regu@reg', '81dc9bdb52d04dc20036dbd8313ed055', '1990-05-26', 'usuario', NULL),
(6, 'img', 'img@test', '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-19', 'usuario', 'npc.png'),
(8, 'test2', 'test3@test3', '202cb962ac59075b964b07152d234b70', '2023-06-07', 'usuario', NULL),
(9, 'eladmin', 'adm@admin', '202cb962ac59075b964b07152d234b70', '2023-06-25', 'administrador', 'admin.jpg'),
(10, 'andres', 'adfsfsd@hj', '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-09', 'administrador', 'calendario2023-cuandopasa.gif'),
(11, 'admin', 'admin@admin', '202cb962ac59075b964b07152d234b70', '2023-06-26', 'administrador', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigo`
--
ALTER TABLE `amigo`
  ADD PRIMARY KEY (`idAmigo`);

--
-- Indices de la tabla `autor-obra`
--
ALTER TABLE `autor-obra`
  ADD PRIMARY KEY (`idAutor-Obra`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategorias`,`nombreCategoria`);

--
-- Indices de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  ADD PRIMARY KEY (`idcoleccion`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `coleccion-usuario`
--
ALTER TABLE `coleccion-usuario`
  ADD PRIMARY KEY (`idcoleccion-usuario`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `genero-item`
--
ALTER TABLE `genero-item`
  ADD PRIMARY KEY (`idGeneroItem`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `coleccion_coleccion_item` (`coleccion`),
  ADD KEY `genero_genero_item` (`genero`),
  ADD KEY `autores_autor_item` (`autor`);

--
-- Indices de la tabla `itemdeseado-usuario`
--
ALTER TABLE `itemdeseado-usuario`
  ADD PRIMARY KEY (`iditemDeseado-Usuario`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idrol`,`rol`);

--
-- Indices de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD PRIMARY KEY (`idpuntaje`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idrespuesta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigo`
--
ALTER TABLE `amigo`
  MODIFY `idAmigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autor-obra`
--
ALTER TABLE `autor-obra`
  MODIFY `idAutor-Obra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  MODIFY `idcoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `coleccion-usuario`
--
ALTER TABLE `coleccion-usuario`
  MODIFY `idcoleccion-usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `genero-item`
--
ALTER TABLE `genero-item`
  MODIFY `idGeneroItem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `itemdeseado-usuario`
--
ALTER TABLE `itemdeseado-usuario`
  MODIFY `iditemDeseado-Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `autores_autor_item` FOREIGN KEY (`autor`) REFERENCES `autores` (`nombre`),
  ADD CONSTRAINT `coleccion_coleccion_item` FOREIGN KEY (`coleccion`) REFERENCES `coleccion` (`nombre`),
  ADD CONSTRAINT `genero_genero_item` FOREIGN KEY (`genero`) REFERENCES `genero` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
