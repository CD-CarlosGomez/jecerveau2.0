-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2016 a las 23:56:19
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ibrain2`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=``@`localhost` FUNCTION `currentUser` () RETURNS INT(11) NO SQL
    DETERMINISTIC
return @u1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bank`
--

CREATE TABLE `bank` (
  `pkBank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branchoffice`
--

CREATE TABLE `branchoffice` (
  `pkBranchOffice` int(11) NOT NULL,
  `subcompany_pkSubCompany` int(11) NOT NULL,
  `BOName` varchar(100) DEFAULT NULL,
  `BOStreet` varchar(100) DEFAULT NULL,
  `BOExtNumber` varchar(45) DEFAULT NULL,
  `BOIntNumber` varchar(45) DEFAULT NULL,
  `BORegion` varchar(45) DEFAULT NULL,
  `BOZone` varchar(45) DEFAULT NULL,
  `BOProvince` varchar(45) DEFAULT NULL,
  `BOZipCode` varchar(45) DEFAULT NULL,
  `ServiceAddress` varchar(45) DEFAULT NULL,
  `ServiceManager` varchar(45) DEFAULT NULL,
  `ServiceEmail` varchar(45) DEFAULT NULL,
  `LogoFile` varchar(45) DEFAULT NULL,
  `officeHour` varchar(45) DEFAULT NULL COMMENT 'Horario de atención',
  `ServicePhone` varchar(45) DEFAULT NULL,
  `Active` varchar(2) DEFAULT NULL COMMENT '{0="Inactivo",1="Activo",01="Suspendido",11="Activo y Factura"}',
  `Created` date DEFAULT NULL,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `Modified` date DEFAULT NULL,
  `ModifiedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `branchoffice`
--

INSERT INTO `branchoffice` (`pkBranchOffice`, `subcompany_pkSubCompany`, `BOName`, `BOStreet`, `BOExtNumber`, `BOIntNumber`, `BORegion`, `BOZone`, `BOProvince`, `BOZipCode`, `ServiceAddress`, `ServiceManager`, `ServiceEmail`, `LogoFile`, `officeHour`, `ServicePhone`, `Active`, `Created`, `CreatedBy`, `Modified`, `ModifiedBy`) VALUES
(0, 0, 'Consultoria Dual', 'Av. Palenque', '109', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(1, 1, 'Sucursal de prueba para iShop Colombia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(2, 2, 'Sucursal de prueba para iShop Perú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(3, 3, 'Sucursal de prueba para iShop Costa Rica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(4, 4, 'Sucursal de prueba para iShop Nicaragua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(5, 5, 'Sucursal de prueba para iShop El Salvador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(6, 1, 'iShop Colombia (AVENIDA CHILE)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(7, 1, 'iShop Colombia (CC CENTRO CHIA)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(8, 1, 'iShop Colombia (CC CENTRO MAYOR)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(9, 1, 'iShop Colombia (CHIPICHAPE)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(10, 0, 'Plaza galerías', 'Conocido', '23', '1', 'norte', 'militar', 'Aloha', '1100', 'este es un dato diferente', 'Octavio Garrido', 'ogarrido@ishop.com', 'null', '9:00-7:00 pm', '889-008766', '1', '0000-00-00', '0', '0000-00-00', 'null'),
(11, 0, 'Plaza galerías', 'Conocido', '23', '1', 'norte', 'militar', 'Aloha', '1100', 'este es un dato diferente', 'Octavio Garrido', 'ogarrido@ishop.com', 'null', '9:00-7:00 pm', '889-008766', '1', '0000-00-00', '0', '0000-00-00', 'null'),
(12, 0, 'Matriz', 'AV carlos castillo peraza', 'mz 41', 'lt 2-01', 'Mexico', 'Mexico', 'Quintna Roo', '77500', '', 'Romina Lleonart', 'info@manzantadelcaribe.com.mx', 'null', '9:00 a 14:30 y 15:30 a 20:00', '9982527105', '1', '0000-00-00', '0', '0000-00-00', 'null'),
(13, 6, 'Plaza galerías', 'Conocido', '23', '1', 'norte', 'militar', 'Aloha', '1100', 'este es un dato diferente', 'Octavio Garrido', 'ogarrido@ishop.com', 'null', '9:00-7:00 pm', '889-008766', '1', '0000-00-00', '0', '0000-00-00', 'null'),
(14, 6, 'Plaza galerías 3', 'Conocido', '23', '1', 'norte', 'militar', 'Aloha', '1100', 'este es un dato diferente', 'Octavio Garrido', 'ogarrido@ishop.com', 'null', '9:00-7:00 pm', '889-008766', '1', '2016-04-16', '0', '0000-00-00', 'null'),
(15, 8, 'BO Enterprise 1', 'Conocido', '109', '1', 'Norte', 'Dálet', 'Quintana Roo', '77500', 'unknown', 'Lázaro', 'llazaro@consultariadula.com', 'null', '9:00-7:00 pm', '889-008766', '1', '2016-04-16', '0', '0000-00-00', 'null'),
(16, 9, 'BO Enterprise 1', 'Conocido', '109', '1', 'Norte', 'Dálet', 'Quintana Roo', '77500', 'unknown', 'Lázaro', 'llazaro@consultariadula.com', 'null', '9:00-7:00 pm', '889-008766', '1', '2016-04-16', '0', '0000-00-00', 'null'),
(17, 10, 'Matriz', 'Av las torres', 'mz 41 lt 2-01', 'local 7', 'LATAM', 'Caribe', 'Quintana Roo', '77500', 'Av las torres', 'mz 41 lt 2-01', 'local 7', 'null', '10 a 14:30 hrs y de 15:30 hrs a 20 hrs', '2527105', '1', '2016-05-04', '0', '0000-00-00', 'null'),
(18, 12, 'Maxtor Lomas Verdes', 'Fracc. Residencial Boulevares', 'Local 111', '11', '.', '.', '.', '.', 'Fracc. Residencial Boulevares', 'Gerente', 'info@compudabo.com', 'null', '.', '019982140357', '1', '2016-05-17', '0', '0000-00-00', 'null'),
(19, 13, 'cancun', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', 'null', '.', '.', '1', '2016-05-17', '0', '0000-00-00', 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branchofficesetting`
--

CREATE TABLE `branchofficesetting` (
  `pkBranchOfficeSetting` int(11) NOT NULL,
  `BranchOffice_pkBranchOffice` int(11) NOT NULL,
  `Currency_pkCurrency` int(11) NOT NULL,
  `fkTimeZone` int(11) DEFAULT NULL,
  `fkLanguage` int(11) DEFAULT NULL,
  `fkCountry` varchar(45) DEFAULT NULL,
  `fkAASPType` int(11) DEFAULT NULL,
  `shipTo` varchar(45) DEFAULT NULL,
  `SoldTo` varchar(45) DEFAULT NULL,
  `folioStart` int(11) DEFAULT NULL,
  `folioSerie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `branchofficesetting`
--

INSERT INTO `branchofficesetting` (`pkBranchOfficeSetting`, `BranchOffice_pkBranchOffice`, `Currency_pkCurrency`, `fkTimeZone`, `fkLanguage`, `fkCountry`, `fkAASPType`, `shipTo`, `SoldTo`, `folioStart`, `folioSerie`) VALUES
(0, 0, 0, NULL, NULL, 'MX', NULL, NULL, NULL, 500, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branchoffice_has_ibuserprofile`
--

CREATE TABLE `branchoffice_has_ibuserprofile` (
  `ibuser_pkiBUser` int(11) NOT NULL,
  `branchoffice_pkBranchOffice` int(11) NOT NULL,
  `ibuserprofile_pkiBUserProfile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `branchoffice_has_ibuserprofile`
--

INSERT INTO `branchoffice_has_ibuserprofile` (`ibuser_pkiBUser`, `branchoffice_pkBranchOffice`, `ibuserprofile_pkiBUserProfile`) VALUES
(3, 1, 2),
(4, 1, 2),
(6, 6, 2),
(7, 6, 2),
(9, 6, 2),
(10, 6, 2),
(11, 6, 2),
(5, 3, 2),
(8, 3, 2),
(12, 3, 2),
(0, 0, 0),
(2, 0, 2),
(0, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collectmethod`
--

CREATE TABLE `collectmethod` (
  `pkCollectMethod` int(11) NOT NULL,
  `collectMethodName` varchar(45) DEFAULT NULL,
  `Created` date DEFAULT NULL,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `Modified` date DEFAULT NULL,
  `ModifiedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `collectmethod`
--

INSERT INTO `collectmethod` (`pkCollectMethod`, `collectMethodName`, `Created`, `CreatedBy`, `Modified`, `ModifiedBy`) VALUES
(0, 'Mostrador', '2016-04-18', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `pkCompany` int(11) NOT NULL,
  `legalName` varchar(100) DEFAULT NULL,
  `commercialName` varchar(100) DEFAULT NULL,
  `Active` varchar(2) DEFAULT NULL COMMENT '{0="Inactivo", 1="Activo",01="Suspendido",11="Activo y Factura"}',
  `Created` date DEFAULT NULL,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `Modified` date DEFAULT NULL,
  `ModifiedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`pkCompany`, `legalName`, `commercialName`, `Active`, `Created`, `CreatedBy`, `Modified`, `ModifiedBy`) VALUES
(0, 'Consultoria Dual', 'Consultoria Dual', '1', NULL, NULL, NULL, NULL),
(1, 'GRUPO MOTTA INTERNACIONAL SA', 'GRUPO MOTTA INTERNACIONAL', '1', '2016-04-05', '0', NULL, NULL),
(2, 'Grupo Motta Miami', 'iShop miami internacional', '1', '2016-04-11', '0', '0000-00-00', 'null'),
(3, 'Manzanita del Caribe', 'Manzanita del Caribe', '1', '2016-04-11', '0', '0000-00-00', 'null'),
(4, 'Test', 'Test', '1', '2016-04-11', '0', '0000-00-00', 'null'),
(5, 'Grupo Motta México', 'iShop MÉXICO internacional', '1', '2016-04-15', '0', '0000-00-00', 'null'),
(6, 'Grupo Motta Miami', 'iShop MÉXICO internacional', '1', '2016-04-15', '0', '0000-00-00', 'null'),
(7, 'Enterprise legal group 1', 'Enterprise Commercial 1', '1', '2016-04-16', '0', '0000-00-00', 'null'),
(8, 'Enterprise legal group 1', 'Enterprise Commercial 1', '1', '2016-04-16', '0', '0000-00-00', 'null'),
(9, 'Allbyte SA de CV', 'All Byte', '1', '2016-05-04', '0', '0000-00-00', 'null'),
(10, 'All Byte', 'All Byte', '1', '2016-05-04', '0', '0000-00-00', 'null'),
(11, 'Sistemas empresariales Dabo SA de CV', 'Compu dabo', '1', '2016-05-17', '0', '0000-00-00', 'null'),
(12, 'Sistemas empresariales Dabo SA de CV', 'Compu dabo', '1', '2016-05-17', '0', '0000-00-00', 'null'),
(13, 'compu ponchito', 'ponchito', '1', '2016-05-17', '0', '0000-00-00', 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency`
--

CREATE TABLE `currency` (
  `pkCurrency` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Active` varchar(45) DEFAULT NULL,
  `Created` date DEFAULT NULL,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `Modified` date DEFAULT NULL,
  `ModifiedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `currency`
--

INSERT INTO `currency` (`pkCurrency`, `Name`, `Active`, `Created`, `CreatedBy`, `Modified`, `ModifiedBy`) VALUES
(0, 'Nuevos Pesos', '1', '2016-04-20', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `pkCustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customercontact`
--

CREATE TABLE `customercontact` (
  `pkCustomerContact` int(11) NOT NULL,
  `contactName` varchar(100) DEFAULT NULL,
  `contactEmail` varchar(100) DEFAULT NULL,
  `contactPhone` varchar(45) DEFAULT NULL,
  `contactMovil` varchar(45) DEFAULT NULL,
  `contactAddress` varchar(100) DEFAULT NULL,
  `contactLocation` varchar(45) DEFAULT NULL,
  `contactCounty` varchar(45) DEFAULT NULL,
  `contactProvince` varchar(45) DEFAULT NULL,
  `contactZipCode` varchar(45) DEFAULT NULL,
  `contactObs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customercontact`
--

INSERT INTO `customercontact` (`pkCustomerContact`, `contactName`, `contactEmail`, `contactPhone`, `contactMovil`, `contactAddress`, `contactLocation`, `contactCounty`, `contactProvince`, `contactZipCode`, `contactObs`) VALUES
(0, 'Test', 'cgomez@consultoriadual.com', '8811900', '99835555', 'Calle del puente 222 Ejisdos de Huipulco', NULL, NULL, 'Distrito Federal', '14380', NULL),
(1, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(2, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(3, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(4, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(5, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(6, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(7, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(8, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(9, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(10, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(11, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(12, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(13, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(14, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(15, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(16, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(17, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(18, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(19, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(20, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(21, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(22, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(23, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(24, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(25, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(26, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(27, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(28, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(29, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(30, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(31, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(32, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(33, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(34, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(35, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(36, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(37, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(38, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(39, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(40, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(41, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(42, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(43, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(44, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(45, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(46, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(47, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(48, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(49, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(50, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(51, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(52, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(53, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(54, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(55, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(56, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(57, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(58, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(59, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(60, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(61, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(62, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(63, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(64, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(65, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(66, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(67, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(68, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(69, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(70, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(71, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(72, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(73, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(74, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(75, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(76, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(77, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(78, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'cdsc', 'cdsc', 'csdc', 'cdsdc', 'cdsc', 'cs ', ' sd', ' csd', ' sd', ' sd sd'),
(81, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'contaminación'),
(82, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'contaminación'),
(83, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'contaminación'),
(84, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'contaminación'),
(85, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'sdfsd'),
(86, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(87, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', 'sd', 'no notes'),
(88, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', '....'),
(89, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'test'),
(90, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'test'),
(91, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'sdvsd'),
(92, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'sdvsd'),
(93, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'sdvsd'),
(94, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'sdvsd'),
(95, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'xcsdcds'),
(96, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'sdfsd'),
(97, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'notes'),
(98, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'terminado'),
(99, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'test'),
(100, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'il est mon problemm'),
(101, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'il est mon problemm'),
(102, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(103, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(104, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(105, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(106, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'cdsc', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(107, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(108, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(109, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(110, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(111, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(112, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(113, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'ok'),
(114, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(115, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(116, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(117, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(118, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(119, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(120, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(121, 'Carlos M Gomez', 'cdsc', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcsd'),
(122, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'verdader'),
(123, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'todos'),
(124, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdacdsc'),
(125, ' zxc ', ' zxc ', ' zx zxc', ' zxc zc', ' zxc ', ' zcx ', ' czx ', ' zxc ', ' zxc ', ' zxc c'),
(126, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'efdwede'),
(127, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'efdwede'),
(128, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcs'),
(129, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcs'),
(130, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'csdcs'),
(131, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '78886567', '968754', 'Conocida', 'zcx', 'Tulum', 'Quintana Roo', '77500', 'csdcds'),
(132, 'csdc', 'cds', 'csdcs', 'csdc', 'csdcd', 'csdc', 'cdsc', 'cds', 'csdc', 'cdsds'),
(133, 'csdc', 'cds', 'csdcs', 'csdc', 'csdcd', 'csdc', 'cdsc', 'cds', 'csdc', 'cdsds'),
(134, 'csdc', 'cds', 'csdcs', 'csdc', 'csdcd', 'csdc', 'cdsc', 'cds', 'csdc', 'cdsds'),
(135, 'asdasd', 'asd', 'asdasdasdasd', 'asdasdasdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd'),
(136, 'as', 'asdasdasdasdasdasda', 'asdasdasdasd', 'asdasd', 'asdasdasdas', 'dasdasdasdasd', 'dasd', 'asdasdasd', 'asdasdasdasdasd', 'asdasdasd'),
(137, 'asdasd', 'asdasd', '2344243', 'asdasdasdasd', 'asdasdad', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd'),
(138, '', '', '', '', '', '', '', '', '', ''),
(139, '', '', '', '', '', '', '', '', '', ''),
(140, '', '', 'cdsdscs', '', '', '', '', '', '', ''),
(141, 'cdsc', 'cdscs', 'csdfcdscds', 'cdscsd', '', '', '', '', '', ''),
(142, '', '', 'dfsfsdfsd', '', '', '', '', '', '', ''),
(143, '', '', 'SDFSDFSD', '', '', '', '', '', '', ''),
(144, '', '', '9868758', '', '', '', '', '', '', ''),
(145, '', 'cgomez@consultoriadual.com', 'dfgdfg', '', '', '', '', '', '', ''),
(146, '', '', 'fvdfvfdvfdvf', '', '', '', '', '', '', ''),
(147, '', '', 'sdgfsdgsdgsd', '', '', '', '', '', '', ''),
(148, '', '', '', '', '', '', '', '', '', ''),
(149, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(150, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(151, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(152, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(153, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '1234567890', 'Conocida', 'Villas', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(154, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(155, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(156, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(157, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(158, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(159, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(160, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(161, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(162, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Villas', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(163, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Villas', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(164, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(165, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Tulum', 'Quintana Roo', '77500', ''),
(166, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(167, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Tulum', 'Quintana Roo', '77500', ''),
(168, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Villas', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(169, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(170, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(171, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(172, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(173, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(174, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(175, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(176, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(177, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(178, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(179, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocido', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(180, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(181, 'CARLOS BASTIDA', 'bastida117@gmail.com', '9982620877', '9981276991', 'av las torres opcional', 'opcional', 'opcional', 'opcional', '77500', 'notas de la orden de servicio '),
(182, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(183, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(184, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '1234567890', '9983106481', 'Conocida', 'Conocido', 'Benito Juárez', 'Quintana Roo', '77500', ''),
(185, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(186, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(187, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(188, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(189, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(190, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(191, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(192, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(193, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(194, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'CARLOS martinez', 'bastida117@gmail.com', '9981111111', '9981111111', 'av las torres opcional', 'la unica', 'opcional', 'provincia con cambio', '77500', 'va'),
(197, 'CARLOS martinez', 'bastida117@gmail.com', '9981111111', '9981111111', 'av las torres opcional', 'la unica', 'opcional', 'provincia con cambio', '77500', 'va'),
(198, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', 'sdfsd'),
(199, 'CARLOS martinez', 'bastida117@gmail.com', '9981111111', '9981111111', 'av las torres opcional', 'la unica', 'opcional', 'provincia con cambio', '77500', 'va'),
(200, 'CARLOS martinez', 'bastida117@gmail.com', '9981111111', '9981111111', 'av las torres opcional', 'la unica', 'opcional', 'provincia con cambio', '77500', 'va'),
(201, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(202, 'Carlos Bastida', 'bastida117@gmail.com', '9982620877', '9982620877', 'NO OBLIGATORIO', 'NO OBLIGATORIO', 'NO OBLIGATORIO', 'OBLIGATORIO', '77500', 'recordar que estos campos pueden ir vacios'),
(203, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(204, 'Carlos M Gomez', 'cgomez@consultoriadual.com', '9983064813', '9983106481', 'Conocida', 'Villas', 'Tulum', 'Quintana Roo', '77500', ''),
(205, 'CARLOS BASTIDA', 'bastida117@gmail.com', '9982620877', '9981276991', 'av las torres opcional', 'opcional', '', '"quintana roo"', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `device`
--

CREATE TABLE `device` (
  `pkDevice` int(11) NOT NULL,
  `sorder_pkSorder` int(11) NOT NULL,
  `deviceDec` text,
  `deviceBrand` varchar(45) DEFAULT NULL,
  `deviceModel` varchar(45) DEFAULT NULL,
  `deviceSerialNumber` varchar(45) DEFAULT NULL,
  `devicePartNumber` varchar(45) DEFAULT NULL,
  `deviceFeatures` varchar(45) DEFAULT NULL COMMENT '(o_config) En el formulario de ibrain1.0 se llama Configuración:',
  `deviceSNReplacement` varchar(45) DEFAULT NULL COMMENT 'En dado caso que se haya reemplazado el dispositivo por otro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `pkEmployee` int(11) NOT NULL,
  `phoneNumberEmp` varchar(45) DEFAULT NULL,
  `pkManager` int(11) DEFAULT NULL,
  `fkiBUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ibfunction`
--

CREATE TABLE `ibfunction` (
  `pkiBFunction` int(11) NOT NULL,
  `fkiBFunctionGroup` int(11) NOT NULL,
  `ibfunctionName` varchar(45) DEFAULT NULL,
  `ibfunctionLink` varchar(45) DEFAULT NULL,
  `ibfunctionDesc` varchar(150) DEFAULT NULL COMMENT 'Muestra la ayuda al usuario final',
  `Active` varchar(2) NOT NULL COMMENT '{0=inactivo,1=Activo,10=Activo pero no visible}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ibfunction`
--

INSERT INTO `ibfunction` (`pkiBFunction`, `fkiBFunctionGroup`, `ibfunctionName`, `ibfunctionLink`, `ibfunctionDesc`, `Active`) VALUES
(0, 0, 'Inicio', '#', NULL, '10'),
(1, 4, 'Idioma', '#', NULL, '1'),
(2, 4, 'Huso horario', '#', NULL, '1'),
(3, 3, 'Ordenes de servicio', 'private/ServiceOrder/showSO', NULL, '1'),
(4, 1, 'Cuentas maestras', 'private/EnterpriseGroup/showCompany', NULL, '1'),
(5, 2, 'Usuarios', 'private/User/showUser', NULL, '1'),
(6, 2, 'Perfiles', 'private/User/showProfile', NULL, '1'),
(7, 1, 'AASP', 'private/EnterpriseGroup/showBranchOffice', NULL, '1'),
(8, 1, 'Subcuentas', 'private/EnterpriseGroup/showSubcompany', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ibfunctiondetail`
--

CREATE TABLE `ibfunctiondetail` (
  `pkibFunctionDetail` int(11) NOT NULL,
  `fkiBFunction` int(11) NOT NULL,
  `ibfunctionDetailName` varchar(45) DEFAULT NULL,
  `ibfunctiondetailLink` varchar(45) DEFAULT NULL,
  `ibfunctiondetailDesc` varchar(150) DEFAULT NULL,
  `Active` varchar(2) NOT NULL COMMENT '{0=inactivo,1=Activo,10=Activo pero no visible}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ibfunctiondetail`
--

INSERT INTO `ibfunctiondetail` (`pkibFunctionDetail`, `fkiBFunction`, `ibfunctionDetailName`, `ibfunctiondetailLink`, `ibfunctiondetailDesc`, `Active`) VALUES
(0, 0, 'Inicio', '/Home', NULL, '10'),
(1, 1, 'Idioma', '#', '', '1'),
(2, 2, 'Huso horario', '#', '', '1'),
(3, 3, 'Nueva Orden de servicio', 'ServiceOrder/addSO', '', '1'),
(4, 4, 'Nueva cuenta maestra', 'EnterpriseGroup/addCompany', '', '10'),
(5, 5, 'Nuevo usuario', '/User/addUser', '', '1'),
(6, 6, 'Nuevo perfil', '/User/addProfile', '', '1'),
(7, 7, 'Nuevo AASP', '/EnterpriseGroup/addBranchOffice', '', '1'),
(8, 8, 'Subcuentas', 'EnterpriseGroup/showSubcompany', NULL, '10'),
(9, 8, 'Nueva subcuenta', 'EnterpriseGroup/AddSubcompany', NULL, '1'),
(10, 4, 'Nueva cuenta maestra', 'EnterpriseGroup/AddEnterpriseGroup', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ibfunctiongroup`
--

CREATE TABLE `ibfunctiongroup` (
  `pkiBFunctionGroup` int(11) NOT NULL,
  `ibfunctiongroupName` varchar(45) DEFAULT NULL,
  `ibfunctiongroupLink` varchar(45) DEFAULT NULL,
  `ibfunctiongroupDesc` varchar(150) DEFAULT NULL,
  `Active` varchar(2) NOT NULL COMMENT '{0=inactivo,1=Activo,10=Activo pero no visible}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ibfunctiongroup`
--

INSERT INTO `ibfunctiongroup` (`pkiBFunctionGroup`, `ibfunctiongroupName`, `ibfunctiongroupLink`, `ibfunctiongroupDesc`, `Active`) VALUES
(0, 'Inicio', '#', NULL, '10'),
(1, 'Cuentas maestras', '#', NULL, '1'),
(2, 'Usuarios', '#', NULL, '1'),
(3, 'Órdenes', '#', NULL, '1'),
(4, 'Configuración', '#', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ibuser`
--

CREATE TABLE `ibuser` (
  `pkiBUser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `pwd` char(128) DEFAULT NULL,
  `pwdtmp` varchar(45) DEFAULT NULL,
  `realname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `ibfunctiondetail_pkibFunctionDetail` int(11) NOT NULL,
  `Active` varchar(45) DEFAULT NULL COMMENT '{0="Inactivo",01="Supendido, cambio de contraseña", 1="Activo", 11="Login la primera vez"}',
  `Created` date DEFAULT NULL,
  `CretaedBy` varchar(45) DEFAULT NULL,
  `Modified` date DEFAULT NULL,
  `ModifiedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ibuser`
--

INSERT INTO `ibuser` (`pkiBUser`, `username`, `pwd`, `pwdtmp`, `realname`, `email`, `ibfunctiondetail_pkibFunctionDetail`, `Active`, `Created`, `CretaedBy`, `Modified`, `ModifiedBy`) VALUES
(0, 'su@consultoriadual.com', '123', NULL, 'Super usuario', 'cgomez@consultoriadual.com', 0, '1', NULL, NULL, NULL, NULL),
(1, 'admin@consultoriadual.com', '123', NULL, 'Administrador iBrain', 'andres@consultoriadual.com', 0, '1', NULL, NULL, NULL, NULL),
(2, 'malarconac@compudabo.com', '123', NULL, 'mauricio alarcón', 'malarconac@compudabo.com', 0, '1', NULL, NULL, NULL, NULL),
(3, 'calfaro@ishop.com.co', '123', NULL, 'Manuel Alarcón', 'calfaro@ishop.com.co', 0, '1', NULL, NULL, NULL, NULL),
(4, 'walvaradoac@ishop.com.co', '123', NULL, 'Waldemar Alvarado', 'walvaradoac@ishop.com.co', 0, '1', NULL, NULL, NULL, NULL),
(5, 'ialvarezac@ishop.cr', '123', NULL, 'Ilse Alvarez', 'ialvarezac@ishop.cr', 0, '1', NULL, NULL, NULL, NULL),
(6, 'eanguloac@ishop.com.co', '123', NULL, 'Eugenio Angulo', 'eanguloac@ishop.com.co', 0, '1', NULL, NULL, NULL, NULL),
(7, 'jarandaac@ishop.com.co', '123', NULL, 'Juán Aranda', 'jarandaac@ishop.com.co', 0, '1', NULL, NULL, NULL, NULL),
(8, 'ybrenesac@ishop.cr', '123', NULL, 'Yaneli Brenes', 'ybrenesac@ishop.cr', 0, '1', NULL, NULL, NULL, NULL),
(9, 'jcondeac@ishop.com.co', '123', NULL, 'José Conde', 'jcondeac@ishop.com.co', 0, '1', NULL, NULL, NULL, NULL),
(10, 'jcedielac@ishop.com.co', '123', NULL, 'Jesús Cediel', 'jcedielac@ishop.com.co', 0, '1', NULL, NULL, NULL, NULL),
(11, 'odebia@ishop.com.co', '123', NULL, 'Orlando Debia', 'odebia@ishop.com.co', 0, '1', NULL, NULL, NULL, NULL),
(12, 'cespinozaac@ishop.cr', '123', NULL, 'Cesia Espinoza', 'cespinozaac@ishop.cr', 0, '1', NULL, NULL, NULL, NULL),
(13, 'acruz@consultoriadual.com', '123', '123', 'Ana Peña Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(14, 'acruz@consultoriadual.com', '123', '123', 'Arlette Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(15, 'acruz@consultoriadual.com', '123', '123', 'Angel Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(16, 'acruz@consultoriadual.com', '123', '123', 'Angelina Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(17, 'acruz@consultoriadual.com', '123', '123', 'Argelia Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(18, 'acruz@consultoriadual.com', '123', '123', 'Angie Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(19, 'acruz@consultoriadual.com', '123', '123', 'Armenia Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(20, 'acruz@consultoriadual.com', '123', '123', 'Alvaro Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(21, 'acruz@consultoriadual.com', '123', '123', 'Antoine Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(22, 'acruz@consultoriadual.com', '123', '123', 'Anthony Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(23, 'acruz@consultoriadual.com', '123', '123', 'Analía Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(24, 'acruz@consultoriadual.com', '123', '123', 'Antonio Cedillo', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(25, 'acruz@consultoriadual.com', '123', '123', 'Anette Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(26, 'acruz@consultoriadual.com', '123', '123', 'Angelica Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(27, 'acruz@consultoriadual.com', '123', '123', 'Alma Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(28, 'acruz@consultoriadual.com', '123', '123', 'Augusto Cruz', 'acruz@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(29, 'acruz@consultoriadual.com', '123', '123', 'America Cruz', 'ccardenas@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(30, 'andres@consultoriadual.com', '123', '123', 'Andres Sánchez', 'andres@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(31, 'hcardona@techassist.mx', '123', '123', 'Hector Cardona', 'hcardona@techassist.mx', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(32, 'cmartin@ejemplo1.com', '123', '123', 'Carlos Martín', 'cmartin@ejemplo1.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null'),
(33, 'vdanchev@consultoriadual.com', 'QWERTY1234', 'QWERTY1234', 'Valentino Danchev', 'cgomez@consultoriadual.com', 2, 'null', '0000-00-00', 'null', '0000-00-00', 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ibuserprofile`
--

CREATE TABLE `ibuserprofile` (
  `pkiBUserProfile` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ibuserprofile`
--

INSERT INTO `ibuserprofile` (`pkiBUserProfile`, `Name`) VALUES
(0, 'Super usuario'),
(1, 'Administrador'),
(2, 'Ejecutivo de cuenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ibuserprofile_has_ibfunctiondetail`
--

CREATE TABLE `ibuserprofile_has_ibfunctiondetail` (
  `iBUserProfile_pkiBUserProfile` int(11) NOT NULL,
  `ibFunctionDetail_pkibFunctionDetail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ibuserprofile_has_ibfunctiondetail`
--

INSERT INTO `ibuserprofile_has_ibfunctiondetail` (`iBUserProfile_pkiBUserProfile`, `ibFunctionDetail_pkibFunctionDetail`) VALUES
(0, 0),
(0, 3),
(0, 4),
(0, 5),
(0, 6),
(0, 7),
(0, 8),
(0, 9),
(0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `osworkflow`
--

CREATE TABLE `osworkflow` (
  `pkOSworkflow` int(11) NOT NULL,
  `RE` varchar(45) DEFAULT NULL,
  `AS` varchar(45) DEFAULT NULL,
  `PD` varchar(45) DEFAULT NULL,
  `AD` varchar(45) DEFAULT NULL,
  `PN` varchar(45) DEFAULT NULL,
  `PA` varchar(45) DEFAULT NULL,
  `PR` varchar(45) DEFAULT NULL,
  `TE` varchar(45) DEFAULT NULL,
  `PS` varchar(45) DEFAULT NULL,
  `EC` varchar(45) DEFAULT NULL,
  `OK` varchar(45) DEFAULT NULL,
  `CA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `osworkflow`
--

INSERT INTO `osworkflow` (`pkOSworkflow`, `RE`, `AS`, `PD`, `AD`, `PN`, `PA`, `PR`, `TE`, `PS`, `EC`, `OK`, `CA`) VALUES
(0, ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>'),
(1, ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" checked  name=""/>', ' <input type="checkbox" name=""/>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `osworkflow_has_ibuserprofile`
--

CREATE TABLE `osworkflow_has_ibuserprofile` (
  `OSworkflow_pkOSworkflow` int(11) NOT NULL,
  `iBUserProfile_pkiBUserProfile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `osworkflow_has_ibuserprofile`
--

INSERT INTO `osworkflow_has_ibuserprofile` (`OSworkflow_pkOSworkflow`, `iBUserProfile_pkiBUserProfile`) VALUES
(0, 0),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `po`
--

CREATE TABLE `po` (
  `pkPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podetail`
--

CREATE TABLE `podetail` (
  `pkPODetail` int(11) NOT NULL,
  `PO_pkPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `pkProduct` int(11) NOT NULL,
  `ProductCategory_pkProductCategory` int(11) NOT NULL,
  `ProductType_pkProductType` int(11) NOT NULL,
  `PODetail_pkPODetail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productcategory`
--

CREATE TABLE `productcategory` (
  `pkProductCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productdocument`
--

CREATE TABLE `productdocument` (
  `pkProductDocument` int(11) NOT NULL,
  `Warehouse_pkWarehouse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productdocumentdetail`
--

CREATE TABLE `productdocumentdetail` (
  `pkProductDocumentDetail` int(11) NOT NULL,
  `ProductDocument_pkProductDocument` int(11) NOT NULL,
  `Product_pkProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producttype`
--

CREATE TABLE `producttype` (
  `pkProductType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recdocument`
--

CREATE TABLE `recdocument` (
  `pkRecDocument` int(11) NOT NULL,
  `SalesDoc_pkSalesDoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salesdoc`
--

CREATE TABLE `salesdoc` (
  `pkSalesDoc` int(11) NOT NULL,
  `Customer_pkCustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salesdocdetail`
--

CREATE TABLE `salesdocdetail` (
  `pkSalesDocDetail` int(11) NOT NULL,
  `SalesDoc_pkSalesDoc` int(11) NOT NULL,
  `Product_pkProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soaccessory`
--

CREATE TABLE `soaccessory` (
  `pkSOAccessories` int(11) NOT NULL,
  `sorder_pkSorder` int(11) NOT NULL,
  `SOAccessoryDesc` text,
  `SOAccessoryBrand` varchar(45) DEFAULT NULL,
  `SOAccessoryModel` varchar(45) DEFAULT NULL,
  `SOAccessoryPartNumber` varchar(45) DEFAULT NULL,
  `SOAccessorySerialNumber` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `soaccessory`
--

INSERT INTO `soaccessory` (`pkSOAccessories`, `sorder_pkSorder`, `SOAccessoryDesc`, `SOAccessoryBrand`, `SOAccessoryModel`, `SOAccessoryPartNumber`, `SOAccessorySerialNumber`) VALUES
(1, 1, 'Cargador para laptop', 'apple', 'vsdfew', 'swfwef', 'fsdfsef'),
(2, 1, 'Funda morada de plástico', '', '', '', ''),
(3, 1, 'Cargador para laptop blanco', 'apple', 'un nuevo modelo', '', ''),
(4, 1, 'Funda morada de plástico', 'sm', 'sm', 'sn', 'sn'),
(5, 1, 'Reveille', 'sm', '', '', ''),
(6, 1, 'Primero los accessorios', '', '', '', ''),
(7, 1, 'no hay accesorios', '', '', '', ''),
(8, 1, 'lugar alto', '', '', '', ''),
(9, 1, 'Abordar el tema de los accessorios', '', '', '', ''),
(10, 1, 'Obediencia en los accessorios', '', '', '', ''),
(11, 1, 'uno', '', '', '', ''),
(12, 1, 'dos', '', '', '', ''),
(13, 1, 'abandonado', '', '', '', ''),
(14, 1, 'Egipto', '', '', '', ''),
(15, 1, 'Funda morada de plástico', '', '', '', ''),
(16, 1, 'Cargador para laptop', '', '', '', ''),
(17, 64, 'no desc', NULL, NULL, NULL, NULL),
(18, 1, 'Accessorio 1', '', '', '', ''),
(19, 1, 'Accesorio 2', '', '', '', ''),
(20, 1, 'casa', '', '', '', ''),
(21, 1, 'inmigrantes ilegales', '', '', '', ''),
(22, 1, 'Accessorio 1', '', '', '', ''),
(23, 1, 'Accessorio 2', '', '', '', ''),
(24, 1, 'vamos a probarlo', '', '', '', ''),
(25, 1, 'diferente', '', '', '', ''),
(26, 1, 'Accesorio 2', '', '', '', ''),
(27, 1, 'Accessorio 1', '', '', '', ''),
(28, 70, 'Abordar el tema de los accessorios', '', '', '', ''),
(29, 70, 'de un lugar a otro', '', '', '', ''),
(30, 72, NULL, NULL, NULL, NULL, NULL),
(31, 77, 'Primero los accessorios', '', '', '', ''),
(32, 77, 'dos', '', '', '', ''),
(33, 78, 'Funda morada de plástico', 'SM', '', '', ''),
(34, 78, 'Cargador negro', 'Apple', '', '', ''),
(35, 83, 'Accessorio agregado oficina 1', '', '', '', ''),
(36, 83, 'Accesorio 2 agregado en oficina', '', '', '', ''),
(37, 84, 'ok Dios soy tuyo', '', '', '', ''),
(38, 84, 'Otro acesorio', 'SM', '', '', ''),
(39, 86, 'Funda morada de plástico', 'Apple', '', '', ''),
(40, 86, 'Cargador para laptop', 'Apple', '', '', ''),
(41, 87, 'Funda morada de plástico', 'Apple', '', '', ''),
(42, 87, 'Cargador para laptop', 'Apple', '', '', ''),
(43, 88, 'Accessorio 1', 'SM', '', '', ''),
(44, 88, 'Accesorio 2 agregado en oficina', '', '', '', ''),
(45, 99, 'asd', 'asd', 'asd', 'asd', 'asd'),
(46, 104, 'estantería 1', '', '', '', ''),
(47, 105, 'Cargador', 'Apple', '85w', '661-0055', 'lasdkljsdakjasdkl'),
(48, 107, 'funda negra piel', '', '', '', ''),
(49, 108, 'teclado', 'apple', 'unico', '687623482734672', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sodetail`
--

CREATE TABLE `sodetail` (
  `pkSODetail` int(11) NOT NULL,
  `fkSorder` int(11) NOT NULL,
  `fkOSstatus` int(11) NOT NULL,
  `SODetailDesc` text,
  `SODetailObs` text,
  `fkiBUser` int(11) DEFAULT NULL COMMENT 'El que tiene asignado el ticket actualmente.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sodetail`
--

INSERT INTO `sodetail` (`pkSODetail`, `fkSorder`, `fkOSstatus`, `SODetailDesc`, `SODetailObs`, `fkiBUser`) VALUES
(0, 90, 0, 'Órden creada', NULL, 0),
(1, 96, 0, 'Órden creada', NULL, 0),
(2, 97, 0, 'Órden creada', NULL, 0),
(3, 98, 0, 'Órden creada', NULL, 0),
(4, 98, 2, 'Órden asignada', NULL, 30),
(5, 97, 2, 'Órden asignada', NULL, 2),
(6, 97, 2, 'Órden asignada', NULL, 30),
(7, 98, 2, 'Órden asignada', NULL, 1),
(8, 91, 2, 'Órden asignada', NULL, 1),
(9, 99, 0, 'Órden creada', NULL, 0),
(10, 100, 0, 'Órden creada', NULL, 0),
(11, 101, 0, 'Órden creada', NULL, 0),
(12, 102, 0, 'Órden creada', NULL, 0),
(13, 103, 0, 'Órden creada', NULL, 0),
(14, 103, 2, 'Órden asignada', NULL, 2),
(15, 104, 0, 'Órden creada', NULL, 0),
(16, 104, 2, 'Órden asignada', NULL, 30),
(17, 104, 2, 'Órden asignada', NULL, 1),
(18, 105, 0, 'Órden creada', NULL, 0),
(19, 105, 2, 'Órden asignada', NULL, 30),
(20, 105, 3, 'test diagnose', '', 0),
(21, 105, 3, 'tester...', '', 0),
(22, 105, 3, 'tester...', '', 0),
(23, 105, 3, 'tester...', '', 0),
(24, 105, 3, 'tester...', '', 0),
(25, 105, 3, 'tester...', '', 0),
(26, 105, 3, 'temporal', '', 0),
(27, 105, 3, 'emocionante', '', 0),
(28, 105, 3, 'modificaciones...', '', 0),
(29, 105, 3, 'no tenía sentido', '', 0),
(30, 105, 3, 'observaciones de la orden...', '', 0),
(31, 105, 3, 'observaciones de la orden...', '', 0),
(32, 105, 3, 'observaciones de la orden...', '', 0),
(33, 105, 3, 'observaciones de la orden...', '', 0),
(34, 105, 3, 'observaciones de la orden...', '', 0),
(35, 105, 3, 'observaciones de la orden...', '', 0),
(36, 105, 3, 'observaciones de la orden...', '', 0),
(37, 105, 3, 'observaciones de la orden...', '', 0),
(38, 104, 3, 'Descripción.', 'Daño incidental.', 0),
(39, 104, 3, 'test', '', 0),
(40, 104, 3, 'test', '', 0),
(41, 104, 3, 'test', '', 0),
(42, 104, 3, 'test', '', 0),
(43, 104, 3, 'testing...', 'daño incidental', 0),
(44, 104, 3, '', '', 0),
(45, 104, 3, 'test', '', 0),
(46, 105, 2, 'Órden asignada', NULL, 1),
(47, 105, 3, 'Este es el primer diagnóstico con adjunto.', '', 0),
(48, 105, 3, '																											Este es el primer diagnóstico con adjunto.																										', 'Un daño incidental.', 0),
(49, 106, 0, 'Orden creada', '', NULL),
(50, 107, 0, 'Orden creada', '', NULL),
(51, 108, 0, 'Orden creada', '', NULL),
(52, 108, 3, 'asswasdasdasdaddasdasd', '', 0),
(53, 108, 2, 'Órden asignada', NULL, 1),
(54, 108, 3, 'asswasdasdasdaddasdasdkajsdkajsdhkajsdhakjsdhja', '.ksdjlakjsdlaksdjlaksdjalksdjadskaj'''' """ ', 0),
(55, 1, 0, 'Creado', NULL, NULL),
(56, 2, 0, 'Creado', NULL, NULL),
(57, 3, 0, 'Creado', NULL, NULL),
(58, 4, 0, 'Creado', NULL, NULL),
(59, 5, 0, 'Creado', NULL, NULL),
(60, 6, 0, 'Creado', NULL, NULL),
(61, 7, 0, 'Creado', NULL, NULL),
(62, 8, 0, 'Creado', NULL, NULL),
(63, 9, 0, 'Creado', NULL, NULL),
(64, 10, 0, 'Creado', NULL, NULL),
(65, 11, 0, 'Creado', NULL, NULL),
(66, 12, 0, 'Creado', NULL, NULL),
(67, 13, 0, 'Creado', NULL, NULL),
(68, 14, 0, 'Creado', NULL, NULL),
(69, 15, 0, 'Creado', NULL, NULL),
(70, 16, 0, 'Creado', NULL, NULL),
(71, 17, 0, 'Creado', NULL, NULL),
(72, 18, 0, 'Creado', NULL, NULL),
(73, 19, 0, 'Creado', NULL, NULL),
(74, 20, 0, 'Creado', NULL, NULL),
(75, 21, 0, 'Creado', NULL, NULL),
(76, 22, 0, 'Creado', NULL, NULL),
(77, 23, 0, 'Creado', NULL, NULL),
(78, 24, 0, 'Creado', NULL, NULL),
(79, 25, 0, 'Creado', NULL, NULL),
(80, 26, 0, 'Creado', NULL, NULL),
(81, 27, 0, 'Creado', NULL, NULL),
(82, 28, 0, 'Creado', NULL, NULL),
(83, 29, 0, 'Creado', NULL, NULL),
(84, 30, 0, 'Creado', NULL, NULL),
(85, 31, 0, 'Creado', NULL, NULL),
(86, 32, 0, 'Creado', NULL, NULL),
(87, 33, 0, 'Creado', NULL, NULL),
(88, 34, 0, 'Creado', NULL, NULL),
(89, 35, 0, 'Creado', NULL, NULL),
(90, 36, 0, 'Creado', NULL, NULL),
(91, 37, 0, 'Creado', NULL, NULL),
(92, 38, 0, 'Creado', NULL, NULL),
(93, 39, 0, 'Creado', NULL, NULL),
(94, 40, 0, 'Creado', NULL, NULL),
(95, 41, 0, 'Creado', NULL, NULL),
(96, 42, 0, 'Creado', NULL, NULL),
(97, 43, 0, 'Creado', NULL, NULL),
(98, 44, 0, 'Creado', NULL, NULL),
(99, 45, 0, 'Creado', NULL, NULL),
(100, 46, 0, 'Creado', NULL, NULL),
(101, 47, 0, 'Creado', NULL, NULL),
(102, 48, 0, 'Creado', NULL, NULL),
(103, 49, 0, 'Creado', NULL, NULL),
(104, 50, 0, 'Creado', NULL, NULL),
(105, 51, 0, 'Creado', NULL, NULL),
(106, 52, 0, 'Creado', NULL, NULL),
(107, 53, 0, 'Creado', NULL, NULL),
(108, 54, 0, 'Creado', NULL, NULL),
(109, 55, 0, 'Creado', NULL, NULL),
(110, 56, 0, 'Creado', NULL, NULL),
(111, 57, 0, 'Creado', NULL, NULL),
(112, 58, 0, 'Creado', NULL, NULL),
(113, 59, 0, 'Creado', NULL, NULL),
(114, 60, 0, 'Creado', NULL, NULL),
(115, 61, 0, 'Creado', NULL, NULL),
(116, 62, 0, 'Creado', NULL, NULL),
(117, 63, 0, 'Creado', NULL, NULL),
(118, 64, 0, 'Creado', NULL, NULL),
(119, 65, 0, 'Creado', NULL, NULL),
(120, 66, 0, 'Creado', NULL, NULL),
(121, 67, 0, 'Creado', NULL, NULL),
(122, 68, 0, 'Creado', NULL, NULL),
(123, 69, 0, 'Creado', NULL, NULL),
(124, 70, 0, 'Creado', NULL, NULL),
(125, 71, 0, 'Creado', NULL, NULL),
(126, 72, 0, 'Creado', NULL, NULL),
(127, 73, 0, 'Creado', NULL, NULL),
(128, 74, 0, 'Creado', NULL, NULL),
(129, 75, 0, 'Creado', NULL, NULL),
(130, 76, 0, 'Creado', NULL, NULL),
(131, 77, 0, 'Creado', NULL, NULL),
(132, 78, 0, 'Creado', NULL, NULL),
(133, 79, 0, 'Creado', NULL, NULL),
(134, 80, 0, 'Creado', NULL, NULL),
(135, 81, 0, 'Creado', NULL, NULL),
(136, 82, 0, 'Creado', NULL, NULL),
(137, 83, 0, 'Creado', NULL, NULL),
(138, 84, 0, 'Creado', NULL, NULL),
(139, 85, 0, 'Creado', NULL, NULL),
(140, 86, 0, 'Creado', NULL, NULL),
(141, 87, 0, 'Creado', NULL, NULL),
(142, 88, 0, 'Creado', NULL, NULL),
(143, 89, 0, 'Creado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solog`
--

CREATE TABLE `solog` (
  `pkSOlog` int(11) NOT NULL,
  `SOrderDetail_pkSOrderDetail` int(11) NOT NULL,
  `SOlogDate` timestamp NULL DEFAULT NULL,
  `ibuser_pkiBUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solog`
--

INSERT INTO `solog` (`pkSOlog`, `SOrderDetail_pkSOrderDetail`, `SOlogDate`, `ibuser_pkiBUser`) VALUES
(1, 2, '2016-05-07 01:05:54', 0),
(2, 3, '2016-05-07 02:05:27', 0),
(3, 4, '2016-05-07 02:05:14', 0),
(4, 5, '2016-05-07 02:05:20', 0),
(5, 6, '2016-05-07 04:05:25', 0),
(6, 7, '2016-05-07 06:05:48', 0),
(7, 8, '2016-05-07 22:05:45', 0),
(8, 9, '2016-05-09 23:05:18', 0),
(9, 10, '2016-05-09 23:05:38', 0),
(10, 11, '2016-05-09 23:05:34', 0),
(11, 12, '2016-05-09 23:05:02', 0),
(12, 13, '2016-05-09 23:05:07', 0),
(13, 14, '2016-05-09 23:05:22', 0),
(14, 15, '2016-05-10 01:05:49', 0),
(15, 16, '2016-05-10 04:05:23', 0),
(16, 17, '2016-05-12 04:05:37', 0),
(17, 18, '2016-05-12 04:05:28', 0),
(18, 19, '2016-05-12 04:05:48', 0),
(19, 20, '2016-05-13 04:05:39', 0),
(20, 21, '2016-05-13 05:05:15', 0),
(21, 22, '2016-05-13 05:05:13', 0),
(22, 23, '2016-05-13 05:05:24', 0),
(23, 24, '2016-05-13 05:05:17', 0),
(24, 25, '2016-05-13 05:05:53', 0),
(25, 26, '2016-05-13 05:05:38', 0),
(26, 27, '2016-05-13 05:05:43', 0),
(27, 28, '2016-05-13 05:05:14', 0),
(28, 29, '2016-05-13 05:05:36', 0),
(29, 30, '2016-05-13 05:05:30', 0),
(30, 31, '2016-05-13 06:05:17', 0),
(31, 32, '2016-05-13 06:05:02', 0),
(32, 33, '2016-05-13 06:05:50', 0),
(33, 34, '2016-05-13 06:05:42', 0),
(34, 35, '2016-05-13 06:05:05', 0),
(35, 36, '2016-05-13 06:05:47', 0),
(36, 37, '2016-05-13 06:05:09', 0),
(37, 38, '2016-05-13 06:05:26', 0),
(38, 39, '2016-05-13 06:05:37', 0),
(39, 40, '2016-05-13 06:05:10', 0),
(40, 41, '2016-05-13 06:05:19', 0),
(41, 42, '2016-05-13 06:05:46', 0),
(42, 43, '2016-05-13 06:05:51', 0),
(43, 44, '2016-05-13 06:05:32', 0),
(44, 45, '2016-05-13 07:05:18', 0),
(45, 46, '2016-05-16 23:05:19', 0),
(46, 47, '2016-05-16 23:05:15', 0),
(47, 48, '2016-05-17 00:05:36', 0),
(48, 49, '2016-05-17 01:05:37', 0),
(49, 50, '2016-05-17 01:05:20', 0),
(50, 51, '2016-05-17 06:05:37', 0),
(51, 52, '2016-05-17 06:05:03', 0),
(52, 53, '2016-05-17 06:05:13', 0),
(53, 54, '2016-05-17 06:05:22', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sorder`
--

CREATE TABLE `sorder` (
  `pkSorder` int(11) NOT NULL,
  `SONumber` varchar(150) NOT NULL,
  `BranchOffice_pkBranchOffice` int(11) NOT NULL,
  `SODate` datetime NOT NULL,
  `CustomerContact_pkCustomerContact` int(11) NOT NULL,
  `CollectMethod_pkCollectMethod` int(11) NOT NULL,
  `SOrderType_pkSOrderType` int(11) NOT NULL,
  `SODeviceCondition` text,
  `SOTechDetail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sorder`
--

INSERT INTO `sorder` (`pkSorder`, `SONumber`, `BranchOffice_pkBranchOffice`, `SODate`, `CustomerContact_pkCustomerContact`, `CollectMethod_pkCollectMethod`, `SOrderType_pkSOrderType`, `SODeviceCondition`, `SOTechDetail`) VALUES
(0, '0', 0, '2016-04-18 00:00:00', 0, 0, 1, 'La estetica del equipo se revisa en cuanto ingrese al laboratorio', 'La falla es que el equipo se traba   y de repente manda uno cuadros en la pantalla, anexo fotos para que vean la falla.'),
(1, '1', 0, '0000-00-00 00:00:00', 0, 0, 2, 'La estetica del equipo se revisa en cuanto ingrese al laboratorio', 'La falla es que el equipo se traba   y de repente manda uno cuadros en la pantalla, anexo fotos para que vean la falla'),
(2, '2', 0, '2016-04-19 00:00:00', 0, 0, 2, 'La estetica del equipo se revisa en cuanto ingrese al laboratorio', 'La falla es que el equipo se traba   y de repente manda uno cuadros en la pantalla, anexo fotos para que vean la falla'),
(3, '3', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Este es un Test', 'Este es otro Test'),
(4, '4', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Simple test 2', 'Simple test técmico 3'),
(5, '5-MX-iShop-BoName', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(6, '0', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(7, '0', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(8, '0', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(9, '0', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(10, '0', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(11, '11', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(12, '12', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(13, '13', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(14, '14-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Test 3 para el folio', 'Detalle 3 para el folio'),
(15, '516-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Vamos a hacer un folio con 500', 'Este es el inicial, creo que no va a ser tan simple'),
(16, '15-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Vamos a hacer un folio con 500', 'Este es el inicial, creo que no va a ser tan simple'),
(17, '1016', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Vamos a hacer un folio con 500', 'Este es el inicial, creo que no va a ser tan simple'),
(18, '1017-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Vamos a hacer un folio con 500', 'Este es el inicial, creo que no va a ser tan simple'),
(19, '500-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Vamos a hacer un folio con 500', 'Este es el inicial, creo que no va a ser tan simple'),
(20, '520-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'Vamos a hacer un folio con 500', 'Este es el inicial, creo que no va a ser tan simple'),
(21, '1041', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(22, '522 + 1041-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(23, '1045-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(24, '1569-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(25, '2069-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(26, '2569-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(27, '1-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(28, '28-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(29, '529-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-20 00:00:00', 0, 0, 2, 'test test', 'testing'),
(30, '1030-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-21 02:04:22', 18, 0, 2, 'C''est la vie', 'Say it'),
(31, '1531-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-22 23:04:55', 80, 0, 2, 'csdvcsd', 'cascsadc'),
(32, '2032-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 17:04:02', 102, 0, 2, 'fdsa', 'csdac'),
(33, '2533-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 17:04:51', 103, 0, 2, 'fdsa', 'csdac'),
(34, '3034-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 17:04:38', 104, 0, 2, 'fdsa', 'csdac'),
(35, '3535-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 17:04:16', 105, 0, 2, 'fdsa', 'csdac'),
(36, '4036-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 17:04:14', 106, 0, 2, 'fdsa', 'csdac'),
(37, '4537-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 19:04:56', 111, 0, 2, 'ok', 'ok'),
(38, '5038-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 19:04:02', 112, 0, 2, 'ok', 'ok'),
(39, '5539-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 19:04:42', 113, 0, 2, 'old', 'test'),
(40, '6040-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 20:04:56', 116, 0, 2, 'ok', 'csdcsd'),
(41, '6541-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 21:04:30', 117, 0, 2, 'ok', 'csdcsd'),
(42, '7042-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 21:04:57', 118, 0, 2, 'ok', 'csdcsd'),
(43, '7543-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 21:04:28', 119, 0, 2, 'ok', 'csdcsd'),
(44, '8044-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 21:04:15', 120, 0, 2, 'ok', 'csdcsd'),
(45, '8545-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-28 21:04:28', 121, 0, 2, 'ok', 'csdcsd'),
(46, '9046-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 00:04:03', 132, 0, 2, 'docs', 'fdsjvsdo'),
(47, '9547-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 00:04:52', 133, 0, 2, 'docs', 'fdsjvsdo'),
(48, '10048-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 00:04:36', 134, 0, 2, 'docs', 'fdsjvsdo'),
(49, '10549-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 01:04:11', 135, 0, 2, 'asdasdasd', 'asdasdads'),
(50, '11050-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 01:04:20', 136, 0, 2, 'asdasdasd', 'asdasdasd'),
(51, '11551-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 17:04:46', 140, 0, 2, 'cdsc', 'cdcsdc'),
(52, '12052-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 18:04:58', 148, 0, 2, 'sdfsd', ''),
(53, '12553-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-04-30 20:04:16', 149, 0, 2, 'csdvcsdcsd', 'csdcsdcsd'),
(54, '13054-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 18:05:57', 150, 0, 2, 'El equipo se encuentra con una raspadura en la parte superior izquierda.', 'El usuario reporta que el equipo tiene una falla al descargar videos.'),
(55, '13555-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 18:05:28', 151, 0, 2, 'Ahora son dos accessorios', 'debe de insertar bien'),
(56, '56-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 18:05:50', 152, 0, 2, 'Estos validadores deben de quedar.', 'Este es otra prueba.'),
(57, '557-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 18:05:10', 153, 0, 2, 'Debe de haber otra manera.', 'una noche más.'),
(58, '558-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 18:05:37', 154, 0, 2, 'no desc', 'sin título'),
(59, '559-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 19:05:36', 155, 0, 2, 'esto es molesto', 'cvsdfsfsd'),
(60, '560-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 19:05:22', 156, 0, 2, 'No description', 'csdfsdf'),
(61, '561-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 19:05:33', 157, 0, 2, 'luego, luego', 'pasaje'),
(62, '562-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 19:05:59', 158, 0, 2, 'Refresh', 'cerrar'),
(63, '563-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 19:05:37', 159, 0, 2, '63', '63'),
(64, '564-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 19:05:57', 160, 0, 2, '64', '64'),
(65, '565-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 20:05:33', 161, 0, 2, 'Regresar', 'Accesorios 2'),
(66, '566-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 20:05:10', 162, 0, 2, 'meses', 'Palacio'),
(67, '567-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 20:05:20', 163, 0, 2, 'Olvidamos la verdad', 'Por qué os afanais'),
(68, '568-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 20:05:25', 164, 0, 2, 'Refreshh', 'Difetrente'),
(69, '569-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 20:05:04', 165, 0, 2, 'no puede ser', 'no especs'),
(70, '570-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 21:05:18', 166, 0, 2, 'Ven en este lugar', 'No fear!'),
(71, '571-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 21:05:41', 167, 0, 2, 'pase por un valle', 'of shadow a dead'),
(72, '572-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 21:05:55', 168, 0, 2, 'Vamos 72', 'debe de insertar ahora si'),
(73, '573-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 21:05:58', 169, 0, 2, 'Vamos funciona', 'El objeto se creaba 2 veces'),
(74, '574-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 21:05:14', 170, 0, 2, 'Así dice el Señor', 'Permanecer'),
(75, '575-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 21:05:32', 171, 0, 2, 'Liberté', 'je suis la programmateur'),
(76, '576-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 21:05:08', 172, 0, 2, 'NPs', 'vfdgsfd'),
(77, '577-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-03 23:05:10', 173, 0, 2, 'Funka', 'si funka'),
(78, '578-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 16:05:38', 174, 0, 2, 'apple', 'apple'),
(79, '579-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 16:05:19', 175, 0, 2, 'Este no lleva accesorios', 'sin accesorios'),
(80, '580-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 16:05:47', 176, 0, 2, 'sin accesorios', 'session nueva'),
(81, '581-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 16:05:05', 177, 0, 2, 'Otro sin accessorios', 'para que  pueda mostrarlo'),
(82, '582-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 16:05:51', 178, 0, 2, 'la tercera prueba', 'sin accesorios'),
(83, '583-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 17:05:31', 179, 0, 2, 'No se cómo hacerle para que el valor se conserve.', 'Nada más hacer post con ajax'),
(84, '584-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 19:05:20', 180, 0, 2, 'no puede ser', 'Dos accesorios'),
(85, '585-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 19:05:43', 181, 0, 2, 'EL equipo se encuentra en buen estado', 'LA ORDEN NO GUARDA LOS ACCESORIOS'),
(86, '586-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 22:05:23', 182, 0, 2, 'El equipo se encuentra despellejado del lado superior derecho.', 'Se actualiza sólo una parte.'),
(87, '587-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-04 22:05:38', 183, 0, 2, 'Este es la segunda prueba', 'El buscador debe...'),
(88, '588-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-05 16:05:59', 184, 0, 2, 'El equipo muestra algunas cositas!', 'Este debe del día'),
(89, '589-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:21', 185, 0, 2, 'La primera orden que estrena la tabla detail', 'Es necesario que el log se guarde de esa manera.'),
(90, '590-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:26', 186, 0, 2, 'La 90 es la buena', 'Estaba mal el nombre de la tabla.'),
(91, '591-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:50', 187, 0, 2, 'En la 91 se registran los logs!', 'Sin accesorios.'),
(92, '592-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:00', 188, 0, 2, 'Va tomando forma.', 'El auto complete es una maravilla!'),
(93, '593-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:33', 189, 0, 2, 'Algo pasó con el los details', 'Debería de guardarlo.'),
(94, '594-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:49', 190, 0, 2, 'No inserta el detail.', 'Hoy se hace las asignaciones.'),
(95, '595-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:16', 191, 0, 2, 'Error de campo en la clase.', 'Pero ya está corregido.'),
(96, '596-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:24', 192, 0, 2, '5 órdenes más.', 'Error en el método.'),
(97, '597-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 20:05:53', 193, 0, 2, 'El 97 debe ser el bueno.', 'Para los logs.'),
(98, '598-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-06 21:05:27', 194, 0, 2, 'Dos más para el 100.', 'Ya hace el log!'),
(99, '599-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-09 18:05:17', 196, 0, 2, 'asdasdasd', 'asdasdasd'),
(100, '600-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-09 18:05:38', 197, 0, 2, 'asdasdasd', 'asdasdasd'),
(101, '601-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-09 18:05:34', 198, 0, 2, 'rgfdsd', 'vsdvsd'),
(102, '602-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-09 18:05:02', 199, 0, 2, 'asdasdasd', 'asdasdasd'),
(103, '603-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-09 18:05:07', 200, 0, 2, 'asdasdasd', 'asdasdasd'),
(104, '604-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-09 20:05:48', 201, 0, 2, 'Sabes del equipo.', 'Exclusivo'),
(105, '605-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-11 23:05:27', 202, 0, 2, 'buenas condiciones', 'El equipo no enciende'),
(106, '606-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-16 20:05:37', 203, 0, 2, '106', 'sin accesorios'),
(107, '607-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-16 20:05:20', 204, 0, 2, '107 sin asignar', 'sin detalles'),
(108, '608-MX-Ibrain Proyect-Consultoria Dual', 0, '2016-05-17 01:05:36', 205, 0, 2, 'test', 'no enciende');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sorderattachment`
--

CREATE TABLE `sorderattachment` (
  `pkSOrderAttachment` int(11) NOT NULL,
  `Sorder_pkSorder` int(11) NOT NULL,
  `SOAttachLink` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sorderattachment`
--

INSERT INTO `sorderattachment` (`pkSOrderAttachment`, `Sorder_pkSorder`, `SOAttachLink`) VALUES
(1, 105, 'mht_igw922_aptana_studio_ide.pdf'),
(2, 105, 'tzolkin.gif'),
(3, 108, 'invitacion.png'),
(4, 108, '108-Archivo_1(1).png'),
(5, 108, 'Captura de pantalla 2015-11-26 a las 12.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sostatus`
--

CREATE TABLE `sostatus` (
  `pkOSstatus` int(11) NOT NULL,
  `SOstatusName` varchar(45) DEFAULT NULL,
  `Created` date DEFAULT NULL,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `Modified` date DEFAULT NULL,
  `ModifiedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sostatus`
--

INSERT INTO `sostatus` (`pkOSstatus`, `SOstatusName`, `Created`, `CreatedBy`, `Modified`, `ModifiedBy`) VALUES
(0, 'Creado', '2016-04-18', '0', NULL, NULL),
(1, 'Recolectado', '2016-05-06', '0', NULL, NULL),
(2, 'Asignado', '2016-05-06', '0', NULL, NULL),
(3, 'Diagnosticado', '2016-05-12', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sotype`
--

CREATE TABLE `sotype` (
  `pkSOrderType` int(11) NOT NULL,
  `SOtypeName` varchar(45) DEFAULT NULL,
  `Created` date DEFAULT NULL,
  `CreatedBy` varchar(45) DEFAULT NULL,
  `Modified` date DEFAULT NULL,
  `ModifiedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sotype`
--

INSERT INTO `sotype` (`pkSOrderType`, `SOtypeName`, `Created`, `CreatedBy`, `Modified`, `ModifiedBy`) VALUES
(1, 'Contrato', NULL, NULL, NULL, NULL),
(2, 'Servicio', NULL, NULL, NULL, NULL),
(3, 'Venta', NULL, NULL, NULL, NULL),
(4, 'Garantía', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcompany`
--

CREATE TABLE `subcompany` (
  `pkSubCompany` int(11) NOT NULL,
  `company_pkCompany` int(11) NOT NULL,
  `subCompanyName` varchar(100) DEFAULT NULL,
  `active` varchar(2) DEFAULT NULL COMMENT '{0="Inactivo",1="Activo",01="Suspendido",11="Activo y Factura"}',
  `created` date DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcompany`
--

INSERT INTO `subcompany` (`pkSubCompany`, `company_pkCompany`, `subCompanyName`, `active`, `created`, `createdby`, `modified`, `modifiedby`) VALUES
(0, 0, 'Ibrain Proyect', '1', NULL, NULL, NULL, NULL),
(1, 1, 'iShop Colombia', '1', NULL, NULL, NULL, NULL),
(2, 1, 'iShop Perú', '1', NULL, NULL, NULL, NULL),
(3, 1, 'iShop Costa Rica', '1', NULL, NULL, NULL, NULL),
(4, 1, 'iShop Nicaragua', '1', NULL, NULL, NULL, NULL),
(5, 1, 'iShop El salvador', '1', NULL, NULL, NULL, NULL),
(6, 0, 'Test', '1', '2016-04-15', '0', '0000-00-00', 'null'),
(7, 0, 'Ishop México', '1', '2016-04-15', '0', '0000-00-00', 'null'),
(8, 7, 'Sub Enterprise 1', '1', '2016-04-16', '0', '0000-00-00', 'null'),
(9, 8, 'Sub Enterprise 1', '1', '2016-04-16', '0', '0000-00-00', 'null'),
(10, 10, 'Allbyte Cancun', '1', '2016-05-04', '0', '0000-00-00', 'null'),
(11, 10, 'ABC', '1', '2016-05-04', '0', '0000-00-00', 'null'),
(12, 12, 'Maxtor', '1', '2016-05-17', '0', '0000-00-00', 'null'),
(13, 13, '''order by name''', '1', '2016-05-17', '0', '0000-00-00', 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE `supplier` (
  `pkSupplier` int(11) NOT NULL,
  `PO_pkPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_2c0branchoffice`
--
CREATE TABLE `v_2c0branchoffice` (
`pkCompany` int(11)
,`totalBO` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_2c0subcompany`
--
CREATE TABLE `v_2c0subcompany` (
`pkCompany` int(11)
,`totalSubCompany` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_7c0ibuser`
--
CREATE TABLE `v_7c0ibuser` (
`pkCompany` int(11)
,`totalUsers` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_kanbanbo`
--
CREATE TABLE `v_kanbanbo` (
`pkCompany` int(11)
,`pkSubCompany` int(11)
,`pkBranchOffice` int(11)
,`BOName` varchar(100)
,`BOStreet` varchar(100)
,`totalUsers` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_kanbancompany`
--
CREATE TABLE `v_kanbancompany` (
`pkCompany` int(11)
,`legalName` varchar(100)
,`commercialName` varchar(100)
,`totalSubCompany` bigint(21)
,`totalBO` bigint(21)
,`totalUsers` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_kanbancountbotosubcompany`
--
CREATE TABLE `v_kanbancountbotosubcompany` (
`pkSubCompany` int(11)
,`totalBO` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_kanbancountusertosubcompany`
--
CREATE TABLE `v_kanbancountusertosubcompany` (
`pkSubCompany` int(11)
,`totalUsers` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_kanbansubcompany`
--
CREATE TABLE `v_kanbansubcompany` (
`pkcompany` int(11)
,`pkSubCompany` int(11)
,`subCompanyName` varchar(100)
,`totalBO` bigint(21)
,`totalUsers` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_kanbanuser`
--
CREATE TABLE `v_kanbanuser` (
`pkCompany` int(11)
,`pkSubCompany` int(11)
,`pkBranchOffice` int(11)
,`pkiBUser` int(11)
,`username` varchar(45)
,`realname` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouse`
--

CREATE TABLE `warehouse` (
  `pkWarehouse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouse_has_product`
--

CREATE TABLE `warehouse_has_product` (
  `Warehouse_pkWarehouse` int(11) NOT NULL,
  `Product_pkProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_2c0branchoffice`
--
DROP TABLE IF EXISTS `v_2c0branchoffice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_2c0branchoffice`  AS  select `c`.`pkCompany` AS `pkCompany`,count(`bo`.`BOName`) AS `totalBO` from ((`company` `c` left join `subcompany` `sc` on((`c`.`pkCompany` = `sc`.`company_pkCompany`))) left join `branchoffice` `bo` on((`sc`.`pkSubCompany` = `bo`.`subcompany_pkSubCompany`))) group by `c`.`pkCompany` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_2c0subcompany`
--
DROP TABLE IF EXISTS `v_2c0subcompany`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_2c0subcompany`  AS  select `c`.`pkCompany` AS `pkCompany`,count(`sc`.`subCompanyName`) AS `totalSubCompany` from (`company` `c` left join `subcompany` `sc` on((`c`.`pkCompany` = `sc`.`company_pkCompany`))) group by `c`.`pkCompany` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_7c0ibuser`
--
DROP TABLE IF EXISTS `v_7c0ibuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_7c0ibuser`  AS  select `c`.`pkCompany` AS `pkCompany`,count(`u`.`username`) AS `totalUsers` from ((((`company` `c` left join `subcompany` `sc` on((`c`.`pkCompany` = `sc`.`company_pkCompany`))) left join `branchoffice` `bo` on((`sc`.`pkSubCompany` = `bo`.`subcompany_pkSubCompany`))) left join `branchoffice_has_ibuserprofile` `bohup` on((`bo`.`pkBranchOffice` = `bohup`.`branchoffice_pkBranchOffice`))) left join `ibuser` `u` on((`bohup`.`ibuser_pkiBUser` = `u`.`pkiBUser`))) group by `c`.`pkCompany` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_kanbanbo`
--
DROP TABLE IF EXISTS `v_kanbanbo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kanbanbo`  AS  select `c`.`pkCompany` AS `pkCompany`,`sc`.`pkSubCompany` AS `pkSubCompany`,`bo`.`pkBranchOffice` AS `pkBranchOffice`,`bo`.`BOName` AS `BOName`,`bo`.`BOStreet` AS `BOStreet`,count(`u`.`pkiBUser`) AS `totalUsers` from ((((`branchoffice` `bo` left join `branchoffice_has_ibuserprofile` `bohup` on((`bo`.`pkBranchOffice` = `bohup`.`branchoffice_pkBranchOffice`))) left join `ibuser` `u` on((`bohup`.`ibuser_pkiBUser` = `u`.`pkiBUser`))) join `subcompany` `sc` on((`bo`.`subcompany_pkSubCompany` = `sc`.`pkSubCompany`))) join `company` `c` on((`sc`.`company_pkCompany` = `c`.`pkCompany`))) group by `bo`.`pkBranchOffice` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_kanbancompany`
--
DROP TABLE IF EXISTS `v_kanbancompany`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kanbancompany`  AS  select `c`.`pkCompany` AS `pkCompany`,`c`.`legalName` AS `legalName`,`c`.`commercialName` AS `commercialName`,`vsc`.`totalSubCompany` AS `totalSubCompany`,`vbo`.`totalBO` AS `totalBO`,`vu`.`totalUsers` AS `totalUsers` from (((`company` `c` join `v_2c0subcompany` `vsc` on((`c`.`pkCompany` = `vsc`.`pkCompany`))) join `v_2c0branchoffice` `vbo` on((`c`.`pkCompany` = `vbo`.`pkCompany`))) join `v_7c0ibuser` `vu` on((`c`.`pkCompany` = `vu`.`pkCompany`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_kanbancountbotosubcompany`
--
DROP TABLE IF EXISTS `v_kanbancountbotosubcompany`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kanbancountbotosubcompany`  AS  select `sc`.`pkSubCompany` AS `pkSubCompany`,count(`bo`.`BOName`) AS `totalBO` from (`subcompany` `sc` left join `branchoffice` `bo` on((`sc`.`pkSubCompany` = `bo`.`subcompany_pkSubCompany`))) group by `sc`.`pkSubCompany` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_kanbancountusertosubcompany`
--
DROP TABLE IF EXISTS `v_kanbancountusertosubcompany`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kanbancountusertosubcompany`  AS  select `sc`.`pkSubCompany` AS `pkSubCompany`,count(`u`.`username`) AS `totalUsers` from (((`subcompany` `sc` left join `branchoffice` `bo` on((`sc`.`pkSubCompany` = `bo`.`subcompany_pkSubCompany`))) left join `branchoffice_has_ibuserprofile` `bohup` on((`bo`.`pkBranchOffice` = `bohup`.`branchoffice_pkBranchOffice`))) left join `ibuser` `u` on((`bohup`.`ibuser_pkiBUser` = `u`.`pkiBUser`))) group by `sc`.`pkSubCompany` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_kanbansubcompany`
--
DROP TABLE IF EXISTS `v_kanbansubcompany`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kanbansubcompany`  AS  select `c`.`pkCompany` AS `pkcompany`,`sc`.`pkSubCompany` AS `pkSubCompany`,`sc`.`subCompanyName` AS `subCompanyName`,`k1`.`totalBO` AS `totalBO`,`k2`.`totalUsers` AS `totalUsers` from (((`company` `c` join `subcompany` `sc` on((`c`.`pkCompany` = `sc`.`company_pkCompany`))) join `v_kanbancountbotosubcompany` `k1` on((`sc`.`pkSubCompany` = `k1`.`pkSubCompany`))) join `v_kanbancountusertosubcompany` `k2` on((`sc`.`pkSubCompany` = `k2`.`pkSubCompany`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_kanbanuser`
--
DROP TABLE IF EXISTS `v_kanbanuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kanbanuser`  AS  select `c`.`pkCompany` AS `pkCompany`,`sc`.`pkSubCompany` AS `pkSubCompany`,`bo`.`pkBranchOffice` AS `pkBranchOffice`,`u`.`pkiBUser` AS `pkiBUser`,`u`.`username` AS `username`,`u`.`realname` AS `realname` from ((((`branchoffice` `bo` left join `branchoffice_has_ibuserprofile` `bohup` on((`bo`.`pkBranchOffice` = `bohup`.`branchoffice_pkBranchOffice`))) left join `ibuser` `u` on((`bohup`.`ibuser_pkiBUser` = `u`.`pkiBUser`))) join `subcompany` `sc` on((`bo`.`subcompany_pkSubCompany` = `sc`.`pkSubCompany`))) join `company` `c` on((`sc`.`company_pkCompany` = `c`.`pkCompany`))) group by `u`.`pkiBUser` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`pkBank`);

--
-- Indices de la tabla `branchoffice`
--
ALTER TABLE `branchoffice`
  ADD PRIMARY KEY (`pkBranchOffice`),
  ADD KEY `fk_branchoffice_subcompany1_idx` (`subcompany_pkSubCompany`);

--
-- Indices de la tabla `branchofficesetting`
--
ALTER TABLE `branchofficesetting`
  ADD PRIMARY KEY (`pkBranchOfficeSetting`,`Currency_pkCurrency`),
  ADD KEY `fk_BranchOfficeSettings_BranchOffice1_idx` (`BranchOffice_pkBranchOffice`),
  ADD KEY `fk_BranchOfficeSettings_Currency1_idx` (`Currency_pkCurrency`);

--
-- Indices de la tabla `branchoffice_has_ibuserprofile`
--
ALTER TABLE `branchoffice_has_ibuserprofile`
  ADD KEY `fk_branchoffice_has_ibuserprofile_ibuserprofile1_idx` (`ibuserprofile_pkiBUserProfile`),
  ADD KEY `fk_branchoffice_has_ibuserprofile_branchoffice1_idx` (`branchoffice_pkBranchOffice`),
  ADD KEY `fk_branchoffice_has_ibuserprofile_ibuser1_idx` (`ibuser_pkiBUser`);

--
-- Indices de la tabla `collectmethod`
--
ALTER TABLE `collectmethod`
  ADD PRIMARY KEY (`pkCollectMethod`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`pkCompany`);

--
-- Indices de la tabla `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`pkCurrency`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`pkCustomer`);

--
-- Indices de la tabla `customercontact`
--
ALTER TABLE `customercontact`
  ADD PRIMARY KEY (`pkCustomerContact`);

--
-- Indices de la tabla `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`pkDevice`),
  ADD KEY `fk_device_sorder1_idx` (`sorder_pkSorder`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`pkEmployee`,`fkiBUser`),
  ADD KEY `fk_Employee_Employee1_idx` (`pkManager`),
  ADD KEY `fk_Employee_ibuser1_idx` (`fkiBUser`);

--
-- Indices de la tabla `ibfunction`
--
ALTER TABLE `ibfunction`
  ADD PRIMARY KEY (`pkiBFunction`),
  ADD KEY `fk_iBFunction_iBFunctionGroup1_idx` (`fkiBFunctionGroup`);

--
-- Indices de la tabla `ibfunctiondetail`
--
ALTER TABLE `ibfunctiondetail`
  ADD PRIMARY KEY (`pkibFunctionDetail`),
  ADD KEY `fk_ibFunctionDetail_iBFunction1_idx` (`fkiBFunction`);

--
-- Indices de la tabla `ibfunctiongroup`
--
ALTER TABLE `ibfunctiongroup`
  ADD PRIMARY KEY (`pkiBFunctionGroup`);

--
-- Indices de la tabla `ibuser`
--
ALTER TABLE `ibuser`
  ADD PRIMARY KEY (`pkiBUser`),
  ADD KEY `fk_ibuser_ibfunctiondetail1_idx` (`ibfunctiondetail_pkibFunctionDetail`);

--
-- Indices de la tabla `ibuserprofile`
--
ALTER TABLE `ibuserprofile`
  ADD PRIMARY KEY (`pkiBUserProfile`);

--
-- Indices de la tabla `ibuserprofile_has_ibfunctiondetail`
--
ALTER TABLE `ibuserprofile_has_ibfunctiondetail`
  ADD PRIMARY KEY (`iBUserProfile_pkiBUserProfile`,`ibFunctionDetail_pkibFunctionDetail`),
  ADD KEY `fk_iBUserProfile_has_ibFunctionDetail_ibFunctionDetail1_idx` (`ibFunctionDetail_pkibFunctionDetail`),
  ADD KEY `fk_iBUserProfile_has_ibFunctionDetail_iBUserProfile1_idx` (`iBUserProfile_pkiBUserProfile`);

--
-- Indices de la tabla `osworkflow`
--
ALTER TABLE `osworkflow`
  ADD PRIMARY KEY (`pkOSworkflow`);

--
-- Indices de la tabla `osworkflow_has_ibuserprofile`
--
ALTER TABLE `osworkflow_has_ibuserprofile`
  ADD PRIMARY KEY (`OSworkflow_pkOSworkflow`,`iBUserProfile_pkiBUserProfile`),
  ADD KEY `fk_OSworkflow_has_iBUserProfile_iBUserProfile1_idx` (`iBUserProfile_pkiBUserProfile`),
  ADD KEY `fk_OSworkflow_has_iBUserProfile_OSworkflow1_idx` (`OSworkflow_pkOSworkflow`);

--
-- Indices de la tabla `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`pkPO`);

--
-- Indices de la tabla `podetail`
--
ALTER TABLE `podetail`
  ADD PRIMARY KEY (`pkPODetail`),
  ADD KEY `fk_PODetail_PO1_idx` (`PO_pkPO`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pkProduct`),
  ADD KEY `fk_Product_ProductCategory1_idx` (`ProductCategory_pkProductCategory`),
  ADD KEY `fk_Product_ProductType1_idx` (`ProductType_pkProductType`),
  ADD KEY `fk_Product_PODetail1_idx` (`PODetail_pkPODetail`);

--
-- Indices de la tabla `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`pkProductCategory`);

--
-- Indices de la tabla `productdocument`
--
ALTER TABLE `productdocument`
  ADD PRIMARY KEY (`pkProductDocument`),
  ADD KEY `fk_ProductDocument_Warehouse1_idx` (`Warehouse_pkWarehouse`);

--
-- Indices de la tabla `productdocumentdetail`
--
ALTER TABLE `productdocumentdetail`
  ADD PRIMARY KEY (`pkProductDocumentDetail`),
  ADD KEY `fk_ProductDocumentDetail_ProductDocument1_idx` (`ProductDocument_pkProductDocument`),
  ADD KEY `fk_ProductDocumentDetail_Product1_idx` (`Product_pkProduct`);

--
-- Indices de la tabla `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`pkProductType`);

--
-- Indices de la tabla `recdocument`
--
ALTER TABLE `recdocument`
  ADD PRIMARY KEY (`pkRecDocument`),
  ADD KEY `fk_RecDocument_SalesDoc1_idx` (`SalesDoc_pkSalesDoc`);

--
-- Indices de la tabla `salesdoc`
--
ALTER TABLE `salesdoc`
  ADD PRIMARY KEY (`pkSalesDoc`),
  ADD KEY `fk_SalesDoc_Customer1_idx` (`Customer_pkCustomer`);

--
-- Indices de la tabla `salesdocdetail`
--
ALTER TABLE `salesdocdetail`
  ADD PRIMARY KEY (`pkSalesDocDetail`),
  ADD KEY `fk_SalesDocDetail_SalesDoc1_idx` (`SalesDoc_pkSalesDoc`),
  ADD KEY `fk_SalesDocDetail_Product1_idx` (`Product_pkProduct`);

--
-- Indices de la tabla `soaccessory`
--
ALTER TABLE `soaccessory`
  ADD PRIMARY KEY (`pkSOAccessories`),
  ADD KEY `fk_SorderAccessories_sorder1_idx` (`sorder_pkSorder`);

--
-- Indices de la tabla `sodetail`
--
ALTER TABLE `sodetail`
  ADD PRIMARY KEY (`pkSODetail`),
  ADD KEY `fk_SOrderDetail_Sorder1_idx` (`fkSorder`),
  ADD KEY `fk_SOrderDetail_SOstatus1_idx` (`fkOSstatus`),
  ADD KEY `fk_sodetail_ibuser1_idx` (`fkiBUser`);

--
-- Indices de la tabla `solog`
--
ALTER TABLE `solog`
  ADD PRIMARY KEY (`pkSOlog`),
  ADD KEY `fk_SOlog_SOrderDetail1_idx` (`SOrderDetail_pkSOrderDetail`),
  ADD KEY `fk_solog_ibuser1_idx` (`ibuser_pkiBUser`);

--
-- Indices de la tabla `sorder`
--
ALTER TABLE `sorder`
  ADD PRIMARY KEY (`pkSorder`),
  ADD KEY `fk_Sorder_CustomerContact1_idx` (`CustomerContact_pkCustomerContact`),
  ADD KEY `fk_Sorder_SOrderType1_idx` (`SOrderType_pkSOrderType`),
  ADD KEY `fk_Sorder_CollectMethod1_idx` (`CollectMethod_pkCollectMethod`),
  ADD KEY `fk_Sorder_BranchOffice1_idx` (`BranchOffice_pkBranchOffice`);

--
-- Indices de la tabla `sorderattachment`
--
ALTER TABLE `sorderattachment`
  ADD PRIMARY KEY (`pkSOrderAttachment`),
  ADD KEY `fk_SOrderAttachment_Sorder1_idx` (`Sorder_pkSorder`);

--
-- Indices de la tabla `sostatus`
--
ALTER TABLE `sostatus`
  ADD PRIMARY KEY (`pkOSstatus`);

--
-- Indices de la tabla `sotype`
--
ALTER TABLE `sotype`
  ADD PRIMARY KEY (`pkSOrderType`);

--
-- Indices de la tabla `subcompany`
--
ALTER TABLE `subcompany`
  ADD PRIMARY KEY (`pkSubCompany`),
  ADD KEY `fk_subcompany_company1_idx` (`company_pkCompany`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`pkSupplier`),
  ADD KEY `fk_Supplier_PO1_idx` (`PO_pkPO`);

--
-- Indices de la tabla `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`pkWarehouse`);

--
-- Indices de la tabla `warehouse_has_product`
--
ALTER TABLE `warehouse_has_product`
  ADD PRIMARY KEY (`Warehouse_pkWarehouse`,`Product_pkProduct`),
  ADD KEY `fk_Warehouse_has_Product_Product1_idx` (`Product_pkProduct`),
  ADD KEY `fk_Warehouse_has_Product_Warehouse1_idx` (`Warehouse_pkWarehouse`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `branchoffice`
--
ALTER TABLE `branchoffice`
  ADD CONSTRAINT `fk_branchoffice_subcompany1` FOREIGN KEY (`subcompany_pkSubCompany`) REFERENCES `subcompany` (`pkSubCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `branchofficesetting`
--
ALTER TABLE `branchofficesetting`
  ADD CONSTRAINT `fk_BranchOfficeSettings_BranchOffice1` FOREIGN KEY (`BranchOffice_pkBranchOffice`) REFERENCES `branchoffice` (`pkBranchOffice`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_BranchOfficeSettings_Currency1` FOREIGN KEY (`Currency_pkCurrency`) REFERENCES `currency` (`pkCurrency`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `branchoffice_has_ibuserprofile`
--
ALTER TABLE `branchoffice_has_ibuserprofile`
  ADD CONSTRAINT `fk_branchoffice_has_ibuserprofile_branchoffice1` FOREIGN KEY (`branchoffice_pkBranchOffice`) REFERENCES `branchoffice` (`pkBranchOffice`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_branchoffice_has_ibuserprofile_ibuser1` FOREIGN KEY (`ibuser_pkiBUser`) REFERENCES `ibuser` (`pkiBUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_branchoffice_has_ibuserprofile_ibuserprofile1` FOREIGN KEY (`ibuserprofile_pkiBUserProfile`) REFERENCES `ibuserprofile` (`pkiBUserProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `fk_device_sorder1` FOREIGN KEY (`sorder_pkSorder`) REFERENCES `sorder` (`pkSorder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_Employee_Employee1` FOREIGN KEY (`pkManager`) REFERENCES `employee` (`pkEmployee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Employee_ibuser1` FOREIGN KEY (`fkiBUser`) REFERENCES `ibuser` (`pkiBUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ibfunction`
--
ALTER TABLE `ibfunction`
  ADD CONSTRAINT `fk_iBFunction_iBFunctionGroup1` FOREIGN KEY (`fkiBFunctionGroup`) REFERENCES `ibfunctiongroup` (`pkiBFunctionGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ibfunctiondetail`
--
ALTER TABLE `ibfunctiondetail`
  ADD CONSTRAINT `fk_ibFunctionDetail_iBFunction1` FOREIGN KEY (`fkiBFunction`) REFERENCES `ibfunction` (`pkiBFunction`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ibuser`
--
ALTER TABLE `ibuser`
  ADD CONSTRAINT `fk_ibuser_ibfunctiondetail1` FOREIGN KEY (`ibfunctiondetail_pkibFunctionDetail`) REFERENCES `ibfunctiondetail` (`pkibFunctionDetail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ibuserprofile_has_ibfunctiondetail`
--
ALTER TABLE `ibuserprofile_has_ibfunctiondetail`
  ADD CONSTRAINT `fk_iBUserProfile_has_ibFunctionDetail_iBUserProfile1` FOREIGN KEY (`iBUserProfile_pkiBUserProfile`) REFERENCES `ibuserprofile` (`pkiBUserProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_iBUserProfile_has_ibFunctionDetail_ibFunctionDetail1` FOREIGN KEY (`ibFunctionDetail_pkibFunctionDetail`) REFERENCES `ibfunctiondetail` (`pkibFunctionDetail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `osworkflow_has_ibuserprofile`
--
ALTER TABLE `osworkflow_has_ibuserprofile`
  ADD CONSTRAINT `fk_OSworkflow_has_iBUserProfile_OSworkflow1` FOREIGN KEY (`OSworkflow_pkOSworkflow`) REFERENCES `osworkflow` (`pkOSworkflow`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OSworkflow_has_iBUserProfile_iBUserProfile1` FOREIGN KEY (`iBUserProfile_pkiBUserProfile`) REFERENCES `ibuserprofile` (`pkiBUserProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `podetail`
--
ALTER TABLE `podetail`
  ADD CONSTRAINT `fk_PODetail_PO1` FOREIGN KEY (`PO_pkPO`) REFERENCES `po` (`pkPO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_PODetail1` FOREIGN KEY (`PODetail_pkPODetail`) REFERENCES `podetail` (`pkPODetail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_ProductCategory1` FOREIGN KEY (`ProductCategory_pkProductCategory`) REFERENCES `productcategory` (`pkProductCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_ProductType1` FOREIGN KEY (`ProductType_pkProductType`) REFERENCES `producttype` (`pkProductType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productdocument`
--
ALTER TABLE `productdocument`
  ADD CONSTRAINT `fk_ProductDocument_Warehouse1` FOREIGN KEY (`Warehouse_pkWarehouse`) REFERENCES `warehouse` (`pkWarehouse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productdocumentdetail`
--
ALTER TABLE `productdocumentdetail`
  ADD CONSTRAINT `fk_ProductDocumentDetail_Product1` FOREIGN KEY (`Product_pkProduct`) REFERENCES `product` (`pkProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ProductDocumentDetail_ProductDocument1` FOREIGN KEY (`ProductDocument_pkProductDocument`) REFERENCES `productdocument` (`pkProductDocument`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recdocument`
--
ALTER TABLE `recdocument`
  ADD CONSTRAINT `fk_RecDocument_SalesDoc1` FOREIGN KEY (`SalesDoc_pkSalesDoc`) REFERENCES `salesdoc` (`pkSalesDoc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salesdoc`
--
ALTER TABLE `salesdoc`
  ADD CONSTRAINT `fk_SalesDoc_Customer1` FOREIGN KEY (`Customer_pkCustomer`) REFERENCES `customer` (`pkCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salesdocdetail`
--
ALTER TABLE `salesdocdetail`
  ADD CONSTRAINT `fk_SalesDocDetail_Product1` FOREIGN KEY (`Product_pkProduct`) REFERENCES `product` (`pkProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SalesDocDetail_SalesDoc1` FOREIGN KEY (`SalesDoc_pkSalesDoc`) REFERENCES `salesdoc` (`pkSalesDoc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `soaccessory`
--
ALTER TABLE `soaccessory`
  ADD CONSTRAINT `fk_SorderAccessories_sorder1` FOREIGN KEY (`sorder_pkSorder`) REFERENCES `sorder` (`pkSorder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sodetail`
--
ALTER TABLE `sodetail`
  ADD CONSTRAINT `fk_SOrderDetail_SOstatus1` FOREIGN KEY (`fkOSstatus`) REFERENCES `sostatus` (`pkOSstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SOrderDetail_Sorder1` FOREIGN KEY (`fkSorder`) REFERENCES `sorder` (`pkSorder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sodetail_ibuser1` FOREIGN KEY (`fkiBUser`) REFERENCES `ibuser` (`pkiBUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solog`
--
ALTER TABLE `solog`
  ADD CONSTRAINT `fk_SOlog_SOrderDetail1` FOREIGN KEY (`SOrderDetail_pkSOrderDetail`) REFERENCES `sodetail` (`pkSODetail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solog_ibuser1` FOREIGN KEY (`ibuser_pkiBUser`) REFERENCES `ibuser` (`pkiBUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sorder`
--
ALTER TABLE `sorder`
  ADD CONSTRAINT `fk_Sorder_BranchOffice1` FOREIGN KEY (`BranchOffice_pkBranchOffice`) REFERENCES `branchoffice` (`pkBranchOffice`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sorder_CollectMethod1` FOREIGN KEY (`CollectMethod_pkCollectMethod`) REFERENCES `collectmethod` (`pkCollectMethod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sorder_CustomerContact1` FOREIGN KEY (`CustomerContact_pkCustomerContact`) REFERENCES `customercontact` (`pkCustomerContact`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sorder_SOrderType1` FOREIGN KEY (`SOrderType_pkSOrderType`) REFERENCES `sotype` (`pkSOrderType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sorderattachment`
--
ALTER TABLE `sorderattachment`
  ADD CONSTRAINT `fk_SOrderAttachment_Sorder1` FOREIGN KEY (`Sorder_pkSorder`) REFERENCES `sorder` (`pkSorder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcompany`
--
ALTER TABLE `subcompany`
  ADD CONSTRAINT `fk_subcompany_company1` FOREIGN KEY (`company_pkCompany`) REFERENCES `company` (`pkCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fk_Supplier_PO1` FOREIGN KEY (`PO_pkPO`) REFERENCES `po` (`pkPO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `warehouse_has_product`
--
ALTER TABLE `warehouse_has_product`
  ADD CONSTRAINT `fk_Warehouse_has_Product_Product1` FOREIGN KEY (`Product_pkProduct`) REFERENCES `product` (`pkProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Warehouse_has_Product_Warehouse1` FOREIGN KEY (`Warehouse_pkWarehouse`) REFERENCES `warehouse` (`pkWarehouse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
