-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2022 a las 19:49:27
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `webjima`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE IF NOT EXISTS `credito` (
`idCredito` int(11) NOT NULL,
  `cNombre` varchar(30) NOT NULL,
  `cApePat` varchar(30) NOT NULL,
  `cApeMat` varchar(30) NOT NULL,
  `cCurp` varchar(18) NOT NULL,
  `cNImss` int(20) DEFAULT NULL,
  `cCodCre1` int(2) DEFAULT NULL,
  `cTel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `credito`
--

INSERT INTO `credito` (`idCredito`, `cNombre`, `cApePat`, `cApeMat`, `cCurp`, `cNImss`, `cCodCre1`, `cTel`) VALUES
(2, 'JONNATHAN', 'SANTIAGO', 'LOPEZ', 'SANTI123', 612341, 1, '2721234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
`idFormulario` int(11) NOT NULL,
  `fNombre` varchar(30) NOT NULL,
  `fApePat` varchar(30) NOT NULL,
  `fApeMat` varchar(30) NOT NULL,
  `fEmail` varchar(40) NOT NULL,
  `fComentario` varchar(200) NOT NULL,
  `fIdProyecto1` int(2) DEFAULT NULL,
  `fTel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`idFormulario`, `fNombre`, `fApePat`, `fApeMat`, `fEmail`, `fComentario`, `fIdProyecto1`, `fTel`) VALUES
(2, 'JENNIFER', 'CORTES', 'BALBUENA', 'COBA@GMAIL.COM', 'NECESITO INFORMACION EXTRA', 1, '2712111140');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonosc`
--

CREATE TABLE IF NOT EXISTS `telefonosc` (
  `cTel1` varchar(10) NOT NULL,
  `cTel2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonosc`
--

INSERT INTO `telefonosc` (`cTel1`, `cTel2`) VALUES
('2721234567', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonosf`
--

CREATE TABLE IF NOT EXISTS `telefonosf` (
  `fTel1` varchar(10) NOT NULL,
  `fTel2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonosf`
--

INSERT INTO `telefonosf` (`fTel1`, `fTel2`) VALUES
('2712111140', '2712111140');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoc`
--

CREATE TABLE IF NOT EXISTS `tipoc` (
  `cCodCre` int(2) NOT NULL,
  `cTipCred` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoc`
--

INSERT INTO `tipoc` (`cCodCre`, `cTipCred`) VALUES
(1, 'FOVISSTE'),
(2, 'COFINAVIT'),
(3, 'BANCA HIPOTECARIA'),
(4, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipop`
--

CREATE TABLE IF NOT EXISTS `tipop` (
  `fIdProyecto` int(2) NOT NULL,
  `fTipoProyecto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipop`
--

INSERT INTO `tipop` (`fIdProyecto`, `fTipoProyecto`) VALUES
(1, 'DEPARTAMENTO'),
(2, 'RESIDENCIA'),
(3, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipov`
--

CREATE TABLE IF NOT EXISTS `tipov` (
  `vIdProt` int(2) NOT NULL,
  `vTipoViv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipov`
--

INSERT INTO `tipov` (`vIdProt`, `vTipoViv`) VALUES
(1, 'CASA'),
(2, 'CONDOMINIO'),
(3, 'DEPARTAMENTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacionv`
--

CREATE TABLE IF NOT EXISTS `ubicacionv` (
  `vIdZona` int(3) NOT NULL,
  `vUbicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacionv`
--

INSERT INTO `ubicacionv` (`vIdZona`, `vUbicacion`) VALUES
(1, 'VALLE ALEGRE'),
(2, 'GEO LOS PINOS'),
(3, 'CORDOBA 2000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`uCve` smallint(6) NOT NULL,
  `uContra` varchar(16) NOT NULL,
  `uIdPersonal` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`uCve`, `uContra`, `uIdPersonal`) VALUES
(1, 'webjima123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE IF NOT EXISTS `vivienda` (
`idVivienda` int(11) NOT NULL,
  `vNHabi` varchar(30) NOT NULL,
  `vNPisos` varchar(30) NOT NULL,
  `vMedidas` varchar(30) NOT NULL,
  `vPrecio` int(9) NOT NULL,
  `vIdZona1` int(3) DEFAULT NULL,
  `vIdProt1` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vivienda`
--

INSERT INTO `vivienda` (`idVivienda`, `vNHabi`, `vNPisos`, `vMedidas`, `vPrecio`, `vIdZona1`, `vIdProt1`) VALUES
(1, '2 HABITACIONES', '1 PISO', '6x14m2', 250000000, 1, 1),
(2, '3 HABITACIONES', '2 PISOS', '45x15m2', 300000000, 2, 2),
(3, '3 HABITACIONES', '2 PISOS', '45x20m2', 280000000, 3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
 ADD PRIMARY KEY (`idCredito`), ADD KEY `cCodCre1` (`cCodCre1`), ADD KEY `cTel` (`cTel`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
 ADD PRIMARY KEY (`idFormulario`), ADD KEY `fIdProyecto1` (`fIdProyecto1`), ADD KEY `fTel` (`fTel`);

--
-- Indices de la tabla `telefonosc`
--
ALTER TABLE `telefonosc`
 ADD PRIMARY KEY (`cTel1`);

--
-- Indices de la tabla `telefonosf`
--
ALTER TABLE `telefonosf`
 ADD PRIMARY KEY (`fTel1`);

--
-- Indices de la tabla `tipoc`
--
ALTER TABLE `tipoc`
 ADD PRIMARY KEY (`cCodCre`);

--
-- Indices de la tabla `tipop`
--
ALTER TABLE `tipop`
 ADD PRIMARY KEY (`fIdProyecto`);

--
-- Indices de la tabla `tipov`
--
ALTER TABLE `tipov`
 ADD PRIMARY KEY (`vIdProt`);

--
-- Indices de la tabla `ubicacionv`
--
ALTER TABLE `ubicacionv`
 ADD PRIMARY KEY (`vIdZona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`uCve`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
 ADD PRIMARY KEY (`idVivienda`), ADD KEY `vIdZona1` (`vIdZona1`), ADD KEY `vIdProt1` (`vIdProt1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
MODIFY `idCredito` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
MODIFY `idFormulario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `uCve` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
MODIFY `idVivienda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`cCodCre1`) REFERENCES `tipoc` (`cCodCre`),
ADD CONSTRAINT `credito_ibfk_2` FOREIGN KEY (`cTel`) REFERENCES `telefonosc` (`cTel1`);

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`fIdProyecto1`) REFERENCES `tipop` (`fIdProyecto`),
ADD CONSTRAINT `formulario_ibfk_2` FOREIGN KEY (`fTel`) REFERENCES `telefonosf` (`fTel1`);

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
ADD CONSTRAINT `vivienda_ibfk_1` FOREIGN KEY (`vIdZona1`) REFERENCES `ubicacionv` (`vIdZona`),
ADD CONSTRAINT `vivienda_ibfk_2` FOREIGN KEY (`vIdProt1`) REFERENCES `tipov` (`vIdProt`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
