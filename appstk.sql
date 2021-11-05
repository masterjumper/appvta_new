-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2021 a las 23:51:52
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appstk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `cajid` int(9) NOT NULL,
  `cajfechorini` datetime NOT NULL,
  `cajtotfin` decimal(10,0) NOT NULL,
  `cajfechorfin` datetime NOT NULL,
  `cajtotini` decimal(10,0) NOT NULL,
  `cajest` int(1) NOT NULL,
  `cajtotdif` decimal(10,0) NOT NULL,
  `cajtotcom` decimal(10,0) NOT NULL,
  `cajdolhoy` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `comid` int(9) NOT NULL,
  `comfec` datetime NOT NULL,
  `comtot` decimal(10,0) NOT NULL,
  `cajid` int(9) NOT NULL,
  `perid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `conid` int(9) NOT NULL,
  `conmarper` int(1) NOT NULL,
  `conmarcom` int(1) NOT NULL,
  `conmarctrcaj` int(1) NOT NULL,
  `conmarmonext` int(1) NOT NULL,
  `conmarctrvta` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`conid`, `conmarper`, `conmarcom`, `conmarctrcaj`, `conmarmonext`, `conmarctrvta`) VALUES
(1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `gruid` int(4) NOT NULL,
  `grudsc` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `grutem` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`gruid`, `grudsc`, `grutem`) VALUES
(1, 'Administrador', 'templatesuperusuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `perid` int(4) NOT NULL,
  `pernom` char(50) NOT NULL,
  `perdir` char(50) NOT NULL,
  `percuit` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `proid` int(9) NOT NULL,
  `prodsc` char(50) NOT NULL,
  `proimp` decimal(10,2) NOT NULL,
  `procodbar` char(20) NOT NULL,
  `prostk` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ultimosnumeros`
--

CREATE TABLE `ultimosnumeros` (
  `ultnroid` int(9) NOT NULL,
  `ultnrodsc` char(50) NOT NULL,
  `ultnroval` char(150) NOT NULL,
  `ultnroval1` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ultimosnumeros`
--

INSERT INTO `ultimosnumeros` (`ultnroid`, `ultnrodsc`, `ultnroval`, `ultnroval1`) VALUES
(1, 'producto', '1', '1'),
(2, 'caja', '1', '1'),
(3, 'venta', '1', '1'),
(4, 'lineadetalle', '1', '1'),
(5, 'numeroventa', '1', '1'),
(6, 'persona', '1', '1'),
(8, 'compra', '1', '1'),
(9, 'usuario', '3', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuid` int(4) NOT NULL,
  `usuuser` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `usunom` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `usuape` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `usupass` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `gruid` int(4) NOT NULL,
  `usuest` int(11) NOT NULL,
  `usumai` varchar(45) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuid`, `usuuser`, `usunom`, `usuape`, `usupass`, `gruid`, `usuest`, `usumai`) VALUES
(1, 'smuguerza', 'Sebastian', 'Muguerza', '123456', 1, 1, ''),
(2, 'sovando', 'Silvana', 'Ovando', '123456', 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `venid` int(9) NOT NULL,
  `venfec` datetime NOT NULL,
  `perid` int(4) NOT NULL,
  `ventot` decimal(9,0) NOT NULL,
  `vennro` char(9) NOT NULL,
  `cajid` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventadetalle`
--

CREATE TABLE `ventadetalle` (
  `venid` int(9) NOT NULL,
  `venlin` int(9) NOT NULL,
  `proid` int(9) NOT NULL,
  `vencntpro` float NOT NULL,
  `venimppro` float NOT NULL,
  `venlinprostk` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`cajid`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`comid`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`conid`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`gruid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`perid`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`proid`);

--
-- Indices de la tabla `ultimosnumeros`
--
ALTER TABLE `ultimosnumeros`
  ADD PRIMARY KEY (`ultnroid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuid`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venid`);

--
-- Indices de la tabla `ventadetalle`
--
ALTER TABLE `ventadetalle`
  ADD PRIMARY KEY (`venid`,`venlin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
