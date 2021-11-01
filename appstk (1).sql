-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2021 a las 23:59:43
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

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`cajid`, `cajfechorini`, `cajtotfin`, `cajfechorfin`, `cajtotini`, `cajest`, `cajtotdif`, `cajtotcom`, `cajdolhoy`) VALUES
(1, '2020-01-31 20:18:24', '17750', '2020-02-19 00:30:59', '0', 1, '17750', '0', '0.00'),
(2, '2020-02-19 00:31:56', '0', '0000-00-00 00:00:00', '0', 0, '0', '0', '0.00');

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

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`perid`, `pernom`, `perdir`, `percuit`) VALUES
(2, 'benet', 'weel', ''),
(3, 'Charly', 'weel', ''),
(4, 'Ivana', 'weel', ''),
(5, 'cooperativa', 'weel', ''),
(6, 'Juan CW', 'weel', ''),
(7, 'Vale Ayala', 'hughes', ''),
(8, 'David', 'hughes', ''),
(9, 'Juan CH', 'hughes', ''),
(10, 'cristina', 'hughes', ''),
(11, 'marina', 'hughes', ''),
(12, 'murdo', 'hughes', ''),
(13, 'milka', 'hughes', ''),
(14, 'alejo puma', 'hughes', ''),
(16, 'todo dulce', 'labordeboy', ''),
(17, 'doris', 'labordeboy', ''),
(18, 'sole cooperativa', 'labordeboy', '');

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

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`proid`, `prodsc`, `proimp`, `procodbar`, `prostk`) VALUES
(1, 'doritos x 46gr', '52.00', '1', '23'),
(2, 'doritos x 95 gr', '85.00', '2', '70'),
(3, 'doritos flamin x 86gr', '85.00', '3', '28'),
(5, 'lays clasicas x 46gr', '52.00', '4', '8'),
(6, 'lays clasicas x 105gr', '85.00', '5', '37'),
(7, 'lays clasicar x150gr', '115.00', '6', '12'),
(8, 'papas pehuamar x 55gr', '48.00', '7', '22'),
(9, 'chetos x 25gr', '33.00', '8', '38'),
(10, 'chetos x 48gr', '52.00', '9', '0'),
(12, 'chetos x 105gr', '85.00', '10', '0'),
(13, '3D x 25gr', '33.00', '11', '0'),
(14, '3D x 105gr', '85.00', '12', '0'),
(15, 'barbacoa x 86gr', '85.00', '13', '14'),
(16, 'jamon serrano x 86gr', '85.00', '14', '17'),
(17, 'queso y cebolla x 86gr', '85.00', '15', '16'),
(18, 'gratinado x 86gr', '85.00', '16', '21'),
(19, 'papas flamin hot x 86gr', '85.00', '17', '28'),
(20, 'maicito pehuamar x 55', '48.00', '18', '18'),
(21, 'maicito pehuamar x 140gr', '85.00', '19', '53'),
(22, 'maicito pehuamar x 330gr', '133.00', '20', '25'),
(23, 'pep rueditas x 84gr', '52.00', '21', '13'),
(24, 'pep palitos x 84gr', '52.00', '22', '0'),
(25, 'palitos pehuamar salado  x 90gr', '46.00', '23', '20'),
(27, 'palitos pehuamar salado x 200gr', '82.00', '24', '5'),
(28, 'palitos pehuamar de queso x 90gr', '46.00', '25', '18'),
(29, 'palitos pehuamar de queso x 200gr', '82.00', '26', '9'),
(30, 'mani pelado x 90gr', '57.00', '27', '18'),
(31, 'mani con piel x 90gr', '57.00', '28', '30'),
(32, 'twistos jamon x 45gr', '47.00', '29', '30'),
(33, 'twistos jamon x 112', '85.00', '30', '31'),
(34, 'twistos de queso x 45gr', '47.00', '31', '40'),
(35, 'twistos de queso x 112gr', '85.00', '32', '2'),
(36, 'toddy x 126gr', '52.00', '33', '9'),
(37, 'toddy x 178gr', '64.00', '34', '0'),
(38, 'avena tradicional x 500gr', '108.00', '35', '7'),
(39, '3D x 48gr', '52.00', '37', '40');

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
(1, 'producto', '40', '1'),
(2, 'caja', '3', '1'),
(3, 'venta', '20', '1'),
(4, 'lineadetalle', '10', '1'),
(5, 'numeroventa', '20', '1'),
(6, 'persona', '19', '1'),
(8, 'compra', '5', '1');

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
  `gruid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuid`, `usuuser`, `usunom`, `usuape`, `usupass`, `gruid`) VALUES
(1, 'smuguerza', 'Sebastian', 'Muguerza', '123456', 1);

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

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venid`, `venfec`, `perid`, `ventot`, `vennro`, `cajid`) VALUES
(12, '2020-01-31 21:02:28', 1, '14200', '12', 1),
(13, '2020-01-31 21:04:35', 1, '1420', '13', 1),
(14, '2020-01-31 21:04:59', 1, '1420', '14', 1),
(16, '2020-01-31 21:06:31', 1, '710', '16', 1),
(19, '0000-00-00 00:00:00', 0, '0', '', 0);

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
-- Volcado de datos para la tabla `ventadetalle`
--

INSERT INTO `ventadetalle` (`venid`, `venlin`, `proid`, `vencntpro`, `venimppro`, `venlinprostk`) VALUES
(12, 5, 2, 100, 142, '0'),
(13, 6, 2, 10, 142, '0'),
(14, 7, 2, 10, 142, '0'),
(16, 8, 1, 10, 71, '0');

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
