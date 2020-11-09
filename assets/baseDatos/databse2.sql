
-- Host: sql10.freesqldatabase.com
-- Database name: sql10365452
-- Database user: sql10365452
-- Database password: tzJS75c5ir
-- Port number: 3306

-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql10.freesqldatabase.com
-- Tiempo de generación: 14-09-2020 a las 12:30:10
-- Versión del servidor: 5.5.62-0ubuntu0.14.04.1
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: sql10365452
--

-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla TblCategoria
--

CREATE TABLE TblCategoria (
  PKid int(11) NOT NULL,
  Descripcion varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla TblEstado
--

CREATE TABLE TblEstado (
  PKid int(11) NOT NULL,
  Descripcion varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla TblEstado
--

INSERT INTO TblEstado (PKid, Descripcion) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Activo'),
(4, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla TblLogin
--

CREATE TABLE TblLogin (
  PKid int(11) NOT NULL,
  FKId_TblPersonas int(11) NOT NULL,
  FKId_TblEstado int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla TblLogin
--

INSERT INTO TblLogin (PKid, FKId_TblPersonas, FKId_TblEstado) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla TblPais
--

CREATE TABLE TblPais (
  PKid int(11) NOT NULL,
  Descripcion varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla TblPais
--

INSERT INTO TblPais (PKid, Descripcion) VALUES
(1, 'Colombia'),
(2, 'Estados unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla TblPersonas
--

CREATE TABLE TblPersonas (
  PKid int(11) NOT NULL,
  Nombre varchar(50) NOT NULL,
  Apellido varchar(70) NOT NULL,
  Correo varchar(150) NOT NULL,
  FKId_TblPais int(11) NOT NULL,
  Contraseña varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla TblPersonas
--

INSERT INTO TblPersonas (PKid, Nombre, Apellido, Correo, FKId_TblPais, Contraseña) VALUES
(1, 'Prueba', 'Numero 1', 'jeancarlosquejadatoro@gmail.com', 1, '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla TblCategoria
--
ALTER TABLE TblCategoria
  ADD PRIMARY KEY (PKid);

--
-- Indices de la tabla TblEstado
--
ALTER TABLE TblEstado
  ADD PRIMARY KEY (PKid);

--
-- Indices de la tabla TblLogin
--
ALTER TABLE TblLogin
  ADD PRIMARY KEY (PKid),
  ADD KEY FKId_TblPersonas (FKId_TblPersonas),
  ADD KEY FKId_TblEstado (FKId_TblEstado);

--
-- Indices de la tabla TblPais
--
ALTER TABLE TblPais
  ADD PRIMARY KEY (PKid);

--
-- Indices de la tabla TblPersonas
--
ALTER TABLE TblPersonas
  ADD PRIMARY KEY (PKid),
  ADD KEY FKId_TblPais (FKId_TblPais);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla TblCategoria
--
ALTER TABLE TblCategoria
  MODIFY PKid int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla TblEstado
--
ALTER TABLE TblEstado
  MODIFY PKid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla TblLogin
--
ALTER TABLE TblLogin
  MODIFY PKid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla TblPais
--
ALTER TABLE TblPais
  MODIFY PKid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla TblPersonas
--
ALTER TABLE TblPersonas
  MODIFY PKid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla TblLogin
--
ALTER TABLE TblLogin
  ADD CONSTRAINT TblLogin_ibfk_2 FOREIGN KEY (FKId_TblEstado) REFERENCES TblEstado (PKid),
  ADD CONSTRAINT TblLogin_ibfk_1 FOREIGN KEY (FKId_TblPersonas) REFERENCES TblPersonas (PKid);

--
-- Filtros para la tabla TblPersonas
--
ALTER TABLE TblPersonas
  ADD CONSTRAINT TblPersonas_ibfk_1 FOREIGN KEY (FKId_TblPais) REFERENCES TblPais (PKid);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
