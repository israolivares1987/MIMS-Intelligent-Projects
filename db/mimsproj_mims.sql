-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 02:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mimsproj_mims`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bucksheet`
--

CREATE TABLE `tbl_bucksheet` (
  `PurchaseOrderID` bigint(20) NOT NULL,
  `purchaseOrdername` varchar(500) NOT NULL,
  `NumeroLinea` int(11) NOT NULL,
  `SupplierName` varchar(100) NOT NULL,
  `ItemST` varchar(500) DEFAULT NULL,
  `SubItemST` varchar(500) DEFAULT NULL,
  `STUnidad` varchar(500) DEFAULT NULL,
  `STCantidad` int(11) DEFAULT NULL,
  `TAGNumber` varchar(500) DEFAULT NULL,
  `Stockcode` varchar(500) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `PlanoModelo` varchar(500) DEFAULT NULL,
  `Revision` varchar(500) DEFAULT NULL,
  `PaqueteConstruccionArea` varchar(500) DEFAULT NULL,
  `PesoUnitario` bigint(20) DEFAULT NULL,
  `PesoTotal` bigint(20) DEFAULT NULL,
  `FechaRAS` datetime DEFAULT NULL,
  `DiasAntesRAS` bigint(20) DEFAULT NULL,
  `FechaComienzoFabricacion` datetime DEFAULT NULL,
  `PAFCF` varchar(500) DEFAULT NULL,
  `FechaTerminoFabricacion` datetime DEFAULT NULL,
  `PAFTF` varchar(500) DEFAULT NULL,
  `FechaGranallado` datetime DEFAULT NULL,
  `PAFG` varchar(500) DEFAULT NULL,
  `FechaPintura` datetime DEFAULT NULL,
  `PAFP` varchar(500) DEFAULT NULL,
  `FechaListoInspeccion` datetime DEFAULT NULL,
  `PAFLI` varchar(500) DEFAULT NULL,
  `ActaLiberacionCalidad` varchar(500) DEFAULT NULL,
  `FechaSalidaFabrica` datetime DEFAULT NULL,
  `PAFSF` varchar(500) DEFAULT NULL,
  `FechaEmbarque` datetime DEFAULT NULL,
  `PackingList` varchar(500) DEFAULT NULL,
  `GuiaDespacho` bigint(20) DEFAULT NULL,
  `SCNNumber` varchar(500) DEFAULT NULL,
  `UnidadesSolicitadas` int(11) DEFAULT NULL,
  `UnidadesRecibidas` int(11) DEFAULT NULL,
  `MaterialReceivedReport` varchar(500) DEFAULT NULL,
  `MaterialWithdrawalReport` varchar(500) DEFAULT NULL,
  `Origen` varchar(500) DEFAULT NULL,
  `DiasViaje` int(11) DEFAULT NULL,
  `Observacion1` varchar(500) DEFAULT NULL,
  `Observacion2` varchar(500) DEFAULT NULL,
  `Observacion3` varchar(500) DEFAULT NULL,
  `Observacion4` varchar(500) DEFAULT NULL,
  `Observacion5` varchar(500) DEFAULT NULL,
  `Observacion6` varchar(500) DEFAULT NULL,
  `Observacion7` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bucksheet`
--

INSERT INTO `tbl_bucksheet` (`PurchaseOrderID`, `purchaseOrdername`, `NumeroLinea`, `SupplierName`, `ItemST`, `SubItemST`, `STUnidad`, `STCantidad`, `TAGNumber`, `Stockcode`, `Descripcion`, `PlanoModelo`, `Revision`, `PaqueteConstruccionArea`, `PesoUnitario`, `PesoTotal`, `FechaRAS`, `DiasAntesRAS`, `FechaComienzoFabricacion`, `PAFCF`, `FechaTerminoFabricacion`, `PAFTF`, `FechaGranallado`, `PAFG`, `FechaPintura`, `PAFP`, `FechaListoInspeccion`, `PAFLI`, `ActaLiberacionCalidad`, `FechaSalidaFabrica`, `PAFSF`, `FechaEmbarque`, `PackingList`, `GuiaDespacho`, `SCNNumber`, `UnidadesSolicitadas`, `UnidadesRecibidas`, `MaterialReceivedReport`, `MaterialWithdrawalReport`, `Origen`, `DiasViaje`, `Observacion1`, `Observacion2`, `Observacion3`, `Observacion4`, `Observacion5`, `Observacion6`, `Observacion7`, `created`, `modified`) VALUES
(1, '0185-SKC-VAN-GER-POA - 4501389', 1, 'SKCOMSA', '50', '', 'KG', 1, '', '50-SKC-BAR-1001', 'ESTRUCTURA AUXILIAR PRE-1', '185-SKC-VAN-ING-PLF-0001', NULL, 'A210', 67, 67, '2020-04-15 00:00:00', -100, '2019-12-02 00:00:00', 'A', '2020-01-06 00:00:00', 'A', '1970-01-01 00:00:00', '', '1970-01-01 00:00:00', '', '2020-01-11 00:00:00', 'A', '', '2020-01-13 00:00:00', 'A', '1970-01-01 00:00:00', '185-SKC-VAN-CDP-PKL-0001', 0, '', 1, 0, '', '', 'Santiago', 7, '', '', '', '', '', '', '', '2020-05-06 17:52:44', '2020-05-06 17:52:44'),
(1, '0185-SKC-VAN-GER-POA - 4501389', 2, 'SKCOMSA', '50', '', 'KG', 1, '', '50-SKC-BAR-1002', 'ESTRUCTURA AUXILIAR PRE-1', '185-SKC-VAN-ING-PLF-0001', NULL, 'A210', 61, 61, '2020-04-15 00:00:00', -100, '2019-12-02 00:00:00', 'A', '2020-01-06 00:00:00', 'A', '1970-01-01 00:00:00', '', '1970-01-01 00:00:00', '', '2020-01-11 00:00:00', 'A', '', '2020-01-13 00:00:00', 'A', '1970-01-01 00:00:00', '185-SKC-VAN-CDP-PKL-0001', 0, '', 1, 0, '', '', 'Santiago', 7, '', '', '', '', '', '', '', '2020-05-06 17:52:45', '2020-05-06 17:52:45'),
(1, '0185-SKC-VAN-GER-POA - 4501389', 3, 'SKCOMSA', '50', '', 'KG', 1, '', '50-SKC-BAR-1003', 'ESTRUCTURA AUXILIAR PRE-1', '185-SKC-VAN-ING-PLF-0001', NULL, 'A210', 63, 63, '2020-04-15 00:00:00', -100, '2019-12-02 00:00:00', 'A', '2020-01-06 00:00:00', 'A', '1970-01-01 00:00:00', '', '1970-01-01 00:00:00', '', '2020-01-11 00:00:00', 'A', '', '2020-01-13 00:00:00', 'A', '1970-01-01 00:00:00', '185-SKC-VAN-CDP-PKL-0001', 0, '', 1, 0, '', '', 'Santiago', 7, '', '', '', '', '', '', '', '2020-05-06 17:52:45', '2020-05-06 17:52:45'),
(1, '0185-SKC-VAN-GER-POA - 4501389', 4, 'SKCOMSA', '50', '', 'KG', 1, '', '50-SKC-BAR-1004', 'ESTRUCTURA AUXILIAR PRE-1', '185-SKC-VAN-ING-PLF-0001', NULL, 'A210', 61, 61, '2020-04-15 00:00:00', -100, '2019-12-02 00:00:00', 'A', '2020-01-06 00:00:00', 'A', '1970-01-01 00:00:00', '', '1970-01-01 00:00:00', '', '2020-01-11 00:00:00', 'A', '', '2020-01-13 00:00:00', 'A', '1970-01-01 00:00:00', '185-SKC-VAN-CDP-PKL-0001', 0, '', 1, 0, '', '', 'Santiago', 7, '', '', '', '', '', '', '', '2020-05-06 17:52:45', '2020-05-06 17:52:45'),
(1, '0185-SKC-VAN-GER-POA - 4501389', 5, 'SKCOMSA', '50', '', 'KG', 1, '', '50-SKC-BAR-1005', 'ESTRUCTURA AUXILIAR PRE-1', '185-SKC-VAN-ING-PLF-0001', NULL, 'A210', 61, 61, '2020-04-15 00:00:00', -100, '2019-12-02 00:00:00', 'A', '2020-01-06 00:00:00', 'A', '1970-01-01 00:00:00', '', '1970-01-01 00:00:00', '', '2020-01-11 00:00:00', 'A', '', '2020-01-13 00:00:00', 'A', '1970-01-01 00:00:00', '185-SKC-VAN-CDP-PKL-0001', 0, '', 1, 0, '', '', 'Santiago', 7, '', '', '', '', '', '', '', '2020-05-06 17:52:45', '2020-05-06 17:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `codEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(45) NOT NULL,
  `razonSocial` varchar(100) NOT NULL,
  `rutCliente` int(11) NOT NULL,
  `dvCliente` varchar(45) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`codEmpresa`, `idCliente`, `nombreCliente`, `razonSocial`, `rutCliente`, `dvCliente`, `direccion`, `contacto`, `telefono`, `correo`) VALUES
(2004, 1, 'SKCOMSA', 'CONSTRUCCIONES Y MONTAJES COM SA', 96717980, '9', 'Malaga 120, Las Condes, Santiago', 'RENER VERGARA', 0, 'RENER.VERGARA@ICSK.COM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `codEmpresa` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `JobId` int(11) DEFAULT NULL,
  `JobTitle` varchar(50) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `BusinessPhone` varchar(25) DEFAULT NULL,
  `HomePhone` varchar(25) DEFAULT NULL,
  `MobilePhone` varchar(25) DEFAULT NULL,
  `FaxNumber` varchar(25) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `StateProvince` varchar(50) DEFAULT NULL,
  `ZIPPostalCode` varchar(15) DEFAULT NULL,
  `CountryRegion` varchar(50) DEFAULT NULL,
  `WebPage` mediumtext DEFAULT NULL,
  `Notes` mediumtext DEFAULT NULL,
  `Attachments` mediumtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`codEmpresa`, `ID`, `Company`, `LastName`, `FirstName`, `JobId`, `JobTitle`, `EmailAddress`, `BusinessPhone`, `HomePhone`, `MobilePhone`, `FaxNumber`, `Address`, `City`, `StateProvince`, `ZIPPostalCode`, `CountryRegion`, `WebPage`, `Notes`, `Attachments`) VALUES
(2004, 2, '', 'Vidal', 'Diego ', 1, 'Activador Junior I', 'diego.vidal@grupovanor.cl', '', '', '', NULL, '', '', '', NULL, '', NULL, NULL, NULL),
(2004, 1, '', 'Valderas', 'Mario', 1, 'Activador Senior nivel III', 'mario.valderas@grupovanor.cl', '', '', '', NULL, '', '', '', NULL, '', NULL, NULL, 'Foto Mario Valderas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `id` int(11) NOT NULL,
  `cod_empresa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `rut_empresa` int(11) NOT NULL,
  `dv_empresa` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `icono_empresa` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`id`, `cod_empresa`, `nombre`, `razon_social`, `rut_empresa`, `dv_empresa`, `direccion`, `telefono`, `correo`, `icono_empresa`) VALUES
(1, 2004, 'VANOR SPA', 'ACCIONA INTEGRA SPA', 76665285, '9', 'AVENIDA IRARRAZAVAL 2401 OF 1216', 2147483647, 'MARIO.VALDERAS@GRUPOVANOR.CL', 'logo-mims-small.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_journal`
--

CREATE TABLE `tbl_journal` (
  `id_interaccion` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `id_orden_compra` varchar(45) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(100) NOT NULL,
  `tipo_interaccion` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_accion` datetime DEFAULT current_timestamp(),
  `numero_referencial` varchar(100) DEFAULT NULL,
  `solicitado_por` varchar(100) DEFAULT NULL,
  `aprobado_por` varchar(100) DEFAULT NULL,
  `comentarios_generales` varchar(500) DEFAULT NULL,
  `respaldos` varchar(500) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_journal`
--

INSERT INTO `tbl_journal` (`id_interaccion`, `tipo`, `id_orden_compra`, `id_cliente`, `id_proyecto`, `id_empleado`, `nombre_empleado`, `tipo_interaccion`, `fecha_ingreso`, `fecha_accion`, `numero_referencial`, `solicitado_por`, `aprobado_por`, `comentarios_generales`, `respaldos`, `estado`) VALUES
(1, '1', '633606', 1, 1, 1, 'Mario Valderas .', 8, '1987-10-05 00:00:00', '2020-04-28 20:40:08', 'asdsafsdf963', 'Israel Olivares', 'Mario ', 'comentario de Calidad', '5ea8cce821db8-1588120808.pdf', 1),
(2, '1', '12', 1, 1, 1, 'Mario Valderas .', 12, '1987-10-05 00:00:00', '2020-05-06 12:10:29', 'cvbvcbvcb', 'cvbcvb', 'cbcvb', 'cbcvbcvb', '5eb2e1754129b-1588781429.csv', 1),
(3, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 15:49:26', 'sdsd', 'sdsds', 'sdsds', 'sdsds', '5eb314c69b0fb-1588794566.pdf', 1),
(4, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 15:49:26', 'sdsd', 'sdsds', 'sdsds', 'sdsds', '5eb314c6b3d81-1588794566.pdf', 1),
(5, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 15:51:05', '1', '1', '1', '1', '5eb315297e4fd-1588794665.pdf', 1),
(6, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 15:51:05', '1', '1', '1', '1', '5eb3152995f1a-1588794665.pdf', 1),
(7, '1', '12', 1, 1, 1, 'Mario Valderas .', 13, '1970-01-01 00:00:00', '2020-05-06 15:54:43', '12121', '21212', '121212', '2121212', '5eb316030b5b7-1588794883.pdf', 1),
(8, '1', '12', 1, 1, 1, 'Mario Valderas .', 13, '1970-01-01 00:00:00', '2020-05-06 15:54:43', '12121', '21212', '121212', '2121212', '5eb3160320d89-1588794883.pdf', 1),
(9, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 16:10:56', '12121', '212121', '212121', '2121212', '5eb319d0a68e2-1588795856.pdf', 1),
(10, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 16:10:56', '12121', '212121', '212121', '2121212', '5eb319d0c1d79-1588795856.pdf', 1),
(11, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 16:17:37', '12121', '212121', '2121212', 'sdsds', '5eb31b60f3a50-1588796256.pdf', 1),
(12, '1', '12', 1, 1, 1, 'Mario Valderas .', 1, '1987-10-05 00:00:00', '2020-05-06 16:17:37', '12121', '212121', '2121212', 'sdsds', '5eb31b6115a0e-1588796257.pdf', 1),
(13, '1', '12', 1, 1, 1, 'Mario Valderas .', 4, '1987-10-05 00:00:00', '2020-05-06 16:19:36', 'sdsds', 'sdsds', 'sdsds', 'sdsdsdsdsdsdsd', '5eb31bd86b278-1588796376.pdf', 1),
(14, '1', '12', 1, 1, 1, 'Mario Valderas .', 4, '1987-10-05 00:00:00', '2020-05-06 16:19:36', 'sdsds', 'sdsds', 'sdsds', 'sdsdsdsdsdsdsd', '5eb31bd87db80-1588796376.pdf', 1),
(15, '1', '12', 1, 1, 1, 'Mario Valderas .', 11, '1987-10-05 00:00:00', '2020-05-06 16:37:46', 'sdsd', 'dsds', 'dsdsds', 'sdsds', '5eb3201a5edf9-1588797466.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordenes`
--

CREATE TABLE `tbl_ordenes` (
  `codEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `PurchaseOrderID` int(11) NOT NULL,
  `PurchaseOrderNumber` varchar(30) DEFAULT NULL,
  `PurchaseOrderDescription` varchar(255) DEFAULT NULL,
  `SupplierName` varchar(100) DEFAULT NULL,
  `Comprador` varchar(100) DEFAULT NULL,
  `ExpediterID` int(11) DEFAULT NULL,
  `Requestor` varchar(100) DEFAULT NULL,
  `Currency` int(11) DEFAULT NULL,
  `ValorNeto` int(11) DEFAULT NULL,
  `ValorTotal` int(11) DEFAULT NULL,
  `Budget` int(11) DEFAULT NULL,
  `CostCodeBudget` varchar(100) DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `DateRequired` datetime DEFAULT NULL,
  `DatePromised` datetime DEFAULT NULL,
  `ShipDate` datetime DEFAULT NULL,
  `ShippingMethodID` int(11) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `POStatus` varchar(50) DEFAULT NULL,
  `Support` mediumtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ordenes`
--

INSERT INTO `tbl_ordenes` (`codEmpresa`, `idCliente`, `idProyecto`, `PurchaseOrderID`, `PurchaseOrderNumber`, `PurchaseOrderDescription`, `SupplierName`, `Comprador`, `ExpediterID`, `Requestor`, `Currency`, `ValorNeto`, `ValorTotal`, `Budget`, `CostCodeBudget`, `OrderDate`, `DateRequired`, `DatePromised`, `ShipDate`, `ShippingMethodID`, `DateCreated`, `POStatus`, `Support`) VALUES
(2004, 1, 1, 12, '0185-SKC-VAN-GER-POA - 4501389', 'Electrical Rooms', 'SKCOMSA', 'FRANCISCO MUNOZ', 2, 'PATRICIO PEREIRA', 1, 402071256, 478464794, 500000000, '123.455', '2017-10-17 00:00:00', '2018-03-15 00:00:00', '2018-03-10 00:00:00', '2018-02-01 00:00:00', 1, '2017-10-12 11:59:45', '5', 'POA-.28.2017.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordenes_item`
--

CREATE TABLE `tbl_ordenes_item` (
  `codEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `PurchaseOrderID` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `revision` varchar(45) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `valor_neto` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Revisión	Cantidad	Unidad	Precio U	Valor neto	estado\n';

--
-- Dumping data for table `tbl_ordenes_item`
--

INSERT INTO `tbl_ordenes_item` (`codEmpresa`, `idCliente`, `idProyecto`, `PurchaseOrderID`, `id_item`, `descripcion`, `revision`, `unidad`, `cantidad`, `precio_unitario`, `valor_neto`, `estado`) VALUES
(2004, 1, 1, 12, 20, 'ESTRUCTURA AUXILIAR PPEAT1', '0', 1, 57251, 2188, 125265188, 1),
(2004, 1, 1, 12, 30, 'ESTRUCTURA AUXILIAR WINCH', '1', 1, 396, 2188, 866448, 2),
(2004, 1, 1, 12, 40, 'ESTRUCTURA AUXILIAR VC-2', '0', 1, 40984, 2188, 89672992, 1),
(2004, 1, 1, 12, 50, 'ESTRUCTURA AUXILIAR PRE-1', '0', 1, 6629, 2188, 14504252, 1),
(2004, 1, 1, 12, 60, 'ESTRUCTURA AUXILIAR PILE', '0', 1, 42609, 2188, 93228492, 1),
(2004, 1, 1, 12, 70, 'ESTRUCTURA AUXILIAR PARR2', '0', 1, 35893, 2188, 78533884, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_catalogo`
--

CREATE TABLE `tbl_products_catalogo` (
  `ProductID` int(11) DEFAULT NULL,
  `ProductName` varchar(250) DEFAULT NULL,
  `Reference_PO` varchar(255) DEFAULT NULL,
  `ProductDescription` varchar(255) DEFAULT NULL,
  `Product_Notes` mediumtext DEFAULT NULL,
  `Unit Code` varchar(255) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `SerialNumber` varchar(50) DEFAULT NULL,
  `ReorderLevel` int(11) DEFAULT NULL,
  `Discontinued` bit(1) DEFAULT NULL,
  `LeadTime` varchar(30) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products_catalogo`
--

INSERT INTO `tbl_products_catalogo` (`ProductID`, `ProductName`, `Reference_PO`, `ProductDescription`, `Product_Notes`, `Unit Code`, `CategoryID`, `SerialNumber`, `ReorderLevel`, `Discontinued`, `LeadTime`, `DateCreated`, `CreatedBy`) VALUES
(9, '514612-PU-001', NULL, 'Desalinated Water Pump - HPPS1B - 889 m3/hr @ 1,000', NULL, '1', NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:24:12', NULL),
(10, '514612-PU-001M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(11, '514612-PU-002', NULL, 'Desalinated Water Pump - HPPS1B - 889 m3/hr @ 1,000', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(12, '514612-PU-002M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(13, '514612-PU-003', NULL, 'Desalinated Water Pump - HPPS1B - 889 m3/hr @ 1,000', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(14, '514612-PU-003M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(15, '514612-PU-004', NULL, 'Desalinated Water Pump - HPPS1B - 889 m3/hr @ 1,000', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(16, '514612-PU-004M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(17, '514613-PU-005', NULL, 'Desalinated Water Pump - HPPS2 - 943 m3/hr @ 1,003', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(18, '514613-PU-005M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(19, '514613-PU-006', NULL, 'Desalinated Water Pump - HPPS2 - 943 m3/hr @ 1,003', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(20, '514613-PU-006M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(21, '514613-PU-007', NULL, 'Desalinated Water Pump - HPPS2 - 943 m3/hr @ 1,003', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(22, '514613-PU-007M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(23, '514613-PU-008', NULL, 'Desalinated Water Pump - HPPS2 - 943 m3/hr @ 1,003', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(24, '514613-PU-008M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(25, '514613-PU-009', NULL, 'Desalinated Water Pump - HPPS2 - 943 m3/hr @ 1,003', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(26, '514613-PU-009M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(27, '514613-PU-010', NULL, 'Desalinated Water Pump - HPPS2 - 943 m3/hr @ 1,003', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(28, '514613-PU-010M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(29, '514614-PU-011', NULL, 'Desalinated Water Pump - HPPS3 - 943 m3/hr @ 1,022', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(30, '514614-PU-011M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(31, '514614-PU-012', NULL, 'Desalinated Water Pump - HPPS3 - 943 m3/hr @ 1,022', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(32, '514614-PU-012M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(33, '514614-PU-013', NULL, 'Desalinated Water Pump - HPPS3 - 943 m3/hr @ 1,022', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(34, '514614-PU-013M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(35, '514614-PU-014', NULL, 'Desalinated Water Pump - HPPS3 - 943 m3/hr @ 1,022', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(36, '514614-PU-014M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(37, '514614-PU-015', NULL, 'Desalinated Water Pump - HPPS3 - 943 m3/hr @ 1,022', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(38, '514614-PU-015M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(39, '514614-PU-016', NULL, 'Desalinated Water Pump - HPPS3 - 943 m3/hr @ 1,022', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(40, '514614-PU-016M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(41, '514615-PU-017', NULL, 'Desalinated Water Pump - HPPS4 - 943 m3/hr @ 958', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(42, '514615-PU-017M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(43, '514615-PU-018', NULL, 'Desalinated Water Pump - HPPS4 - 943 m3/hr @ 958', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(44, '514615-PU-018M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(45, '514615-PU-019', NULL, 'Desalinated Water Pump - HPPS4 - 943 m3/hr @ 958', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(46, '514615-PU-019M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(47, '514615-PU-020', NULL, 'Desalinated Water Pump - HPPS4 - 943 m3/hr @ 958', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(48, '514615-PU-020M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(49, '514615-PU-021', NULL, 'Desalinated Water Pump - HPPS4 - 943 m3/hr @ 958', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(50, '514615-PU-021M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(51, '514615-PU-022', NULL, 'Desalinated Water Pump - HPPS4 - 943 m3/hr @ 958', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(52, '514615-PU-022M', NULL, 'AC NEMA Medium Voltage Motor for Water Pump', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(53, '514615-Startup', NULL, 'Startup and Commissioning Spare Parts', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(54, '514615-LiftingD', NULL, 'Lifting Devices', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-12 12:26:24', NULL),
(55, 'E-ROOM-002', '633606', 'Container type hermetically sealed prefabricated electrical room, including doors, access stairs and platforms', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:11:28', NULL),
(56, 'E-ROOM-002', '633606', 'Container type hermetically sealed prefabricated electrical room, including doors, access stairs and platforms', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:21', NULL),
(57, 'E-ROOM-003', '633606', 'Yokes for lifting with all accessories (Table 3.2.3)', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:21', NULL),
(58, 'E-ROOM-004', '633606', 'Distribution panel SSAA Electrical Room, 400-231V, 3?, 42 circuits.', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:21', NULL),
(59, 'E-ROOM-005', '633606', 'SSAA Electrical room Transformer, 60 kVA, 480 V/400-231V, 3?.', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:21', NULL),
(60, 'E-ROOM-006', '633606', 'Interior Fire protection System, integrated to Precise vision.', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:21', NULL),
(61, 'E-ROOM-007', '633606', 'Fire Protection Panel Cheetah Xi 50 (FIKE), with communications port fiber optic, 24 hour electric back-up.', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:21', NULL),
(63, 'E-ROOM-009', '633606', 'Interior Fire Extinguisher agent system .\nPortable Fire Extinguisher type in electrical Room per NFPA and ANSI/UL.', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(64, 'E-ROOM-010', '633606', 'HVAC and Pressurization System, Sizing and supply according the requirement in the prefabricated electrical room specification, equipment type and quantity by contractor', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(65, 'E-ROOM-011', '633606', 'Air conditioning compact type system with monitoring and failure alarm contacts.', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(66, 'E-ROOM-012', '633606', 'Pressurization equipment', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(67, 'E-ROOM-013', '633606', 'Ventilation exhausts ducts located near the Variable Frequency Drivers as part of the HVAC system. ', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(68, 'E-ROOM-014', '633606', 'Safety Cabinet installed at the electrical room', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(69, 'E-ROOM-015', '633606', 'Access Control System (ACS)', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(70, 'E-ROOM-016', '633606', 'Worktable for DCS cabinet room and foldable planer to wall for electrical room', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(71, 'E-ROOM-017', '633606', '4.16 kV Switchgear, 2000 A, 50 Hz, 3 phases, 40 kA, metal enclosed and arc resistant type', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(72, 'E-ROOM-018', '633606', 'Lift truck with to be used with item 1.2, 4.16 kV Switchgear.   (Table 3.2.3)', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(73, 'E-ROOM-019', '633606', 'Intelligent  type  600 V class MCC, 480 V, 50 Hz, 3 phases, 2000 A,   40 kA', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(74, 'E-ROOM-020', '633606', 'Dry LV Transformers', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(75, 'E-ROOM-021', '633606', 'Distribution Transformer 100 kVA, 480/400-231 Vac, 3?', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(76, 'E-ROOM-022', '633606', 'Lighting transformer, 60 kVA, 480 V/400-231V, 3?.', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(77, 'E-ROOM-023', '633606', 'Instrumentation Dry transformer, 30 kVA, 480/120 Vac, 2?.', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(78, 'E-ROOM-024', '633606', 'LV Distribution panel ', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(79, 'E-ROOM-025', '633606', 'Distribution Panel # 1, 400-231V, 3?, 42 circuits', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(80, 'E-ROOM-026', '633606', 'Lighting Distribution panel 400-231V, 3?.', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(81, 'E-ROOM-027', '633606', 'Lighting Contactor panel ', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(82, 'E-ROOM-028', '633606', 'UPS, 30 kVA, 120 min, 480/120 Vac, 1?.', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(83, 'E-ROOM-029', '633606', 'UPS Battery  Bank (NiCad sealed type)', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(84, 'E-ROOM-030', '633606', '125 DC Battery  Bank (NiCad sealed type)', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(85, 'E-ROOM-031', '633606', '125 VDC Battery  Charger  (sealed type) to be used with Battery Bank', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(86, 'E-ROOM-032', '633606', 'Distribution panel 125 VDC', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(87, 'E-ROOM-033', '633606', 'All Power, control, communication Cables and raceways required for all internal connections between equipment inside of the electrical room.', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(88, 'E-ROOM-034', '633606', 'Include installation, commissioning and testing, management, administration and closeout', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(89, 'E-ROOM-035', '633606', 'LV VFD 480 V, 50 Hz, 3 ?, 187 kW', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(90, 'E-ROOM-036', '633606', 'MV VFD 4.16 kV, 50 Hz, 3 ?,  855 kW', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(91, 'E-ROOM-037', '633606', 'MV VFD 4.16 kV, 50 Hz, 3 ?,  2270 kW', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(92, 'E-ROOM-038', '633606', 'Distributed control unit (DCS Panel ) Pretreatment', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(93, 'E-ROOM-039', '633606', 'Distributed control unit (DCS Panel ) Seawater', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(94, 'E-ROOM-040', '633606', 'Distributed control unit (DCS Panel ) Reverse osmosis', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(95, 'E-ROOM-041', '633606', 'Fiber Cabinet', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(96, 'E-ROOM-042', '633606', 'Process Panel', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(97, 'E-ROOM-043', '633606', 'Labor', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(98, 'E-ROOM-044', '633606', 'Materials', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(99, 'E-ROOM-045', '633606', 'Supply of distribution panel ', NULL, NULL, NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(100, 'E-ROOM-046', '633606', 'Valve distribution Panel, NEMA 4x, 480 V, 50 Hz, 3?, 3W', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(101, 'E-ROOM-047', '633606', 'Instrument distribution Panel, NEMA 4x, 120 V, 50 Hz, 1?, 2W', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(102, 'E-ROOM-048', '633606', 'Instrument distribution Panel, NEMA 4x, 120 V, 50 Hz, 1?, 2W', NULL, 'EA', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(103, 'E-ROOM-049', '633606', 'Software and licenses, for meter and relays', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:23', NULL),
(104, 'E-ROOM-001', '633606', 'Engineering', NULL, 'LT', NULL, NULL, NULL, b'0', NULL, '2017-10-17 15:15:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyectos`
--

CREATE TABLE `tbl_proyectos` (
  `codEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `NumeroProyecto` int(11) NOT NULL,
  `NombreProyecto` varchar(500) NOT NULL,
  `DescripcionProyecto` varchar(100) DEFAULT NULL,
  `Lugar` varchar(100) DEFAULT NULL,
  `estadoProyecto` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proyectos`
--

INSERT INTO `tbl_proyectos` (`codEmpresa`, `idCliente`, `NumeroProyecto`, `NombreProyecto`, `DescripcionProyecto`, `Lugar`, `estadoProyecto`) VALUES
(2004, 1, 1, '185-SKC-VAN-4501389939', 'QB2 - Obra 343', 'QUEBRADA BLANCA 2 - IQUIQUE', 1),
(2004, 1, 2, 'Prueba', 'prueba 2', 'mi casa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ref_codes`
--

CREATE TABLE `tbl_ref_codes` (
  `domain` varchar(100) NOT NULL,
  `domain_id` varchar(100) NOT NULL,
  `domain_desc` varchar(100) DEFAULT NULL,
  `domain_state` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ref_codes`
--

INSERT INTO `tbl_ref_codes` (`domain`, `domain_id`, `domain_desc`, `domain_state`) VALUES
('ACTUAL_PREVIO', 'A', 'Actual', 1),
('ACTUAL_PREVIO', 'P', 'Previo', 1),
('CURRENCY_ORDEN', '1', 'CLP', 1),
('ESTADO_ITEM_ORDEN', '1', 'ACTIVO', 1),
('ESTADO_ITEM_ORDEN', '2', 'CANCELADO', 1),
('ESTADO_PROYECTO', '1', 'ACTIVO', 1),
('ESTADO_PROYECTO', '2', 'INACTIVO', 1),
('ESTADO_PROYECTO', '3', 'SUSPENDIDO', 1),
('ESTADO_PROYECTO', '4', 'TERMINADO', 1),
('JOB_ID', '1', 'Activador', 1),
('JOB_ID', '2', 'Calidad', 1),
('PO_STATUS', '1', 'DRASF', 1),
('PO_STATUS', '2', 'CANCELADA', 1),
('PO_STATUS', '3', 'BORRADOR', 1),
('PO_STATUS', '4', 'EMITIDA', 1),
('PO_STATUS', '5', 'ADJUDICADA', 1),
('SHIPPING_METHOD', '1', 'FERRI', 1),
('SHIPPING_METHOD', '2', 'TERRESTRE', 1),
('SHIPPING_METHOD', '3', 'AEREO', 1),
('SHIPPING_METHOD', '4', 'MARITIMO', 1),
('TIPO_INTERACCION_CC', '1', 'Acta de Liberacion', 1),
('TIPO_INTERACCION_CC', '10', 'Registro de Instrumentacion ', 1),
('TIPO_INTERACCION_CC', '11', 'Informe de Ensayos', 1),
('TIPO_INTERACCION_CC', '12', 'Fichas Tecnicas', 1),
('TIPO_INTERACCION_CC', '13', 'Actas', 1),
('TIPO_INTERACCION_CC', '14', 'Otros Informes', 1),
('TIPO_INTERACCION_CC', '2', 'No Conformidades', 1),
('TIPO_INTERACCION_CC', '3', 'Informe de Avance', 1),
('TIPO_INTERACCION_CC', '4', 'Dossier de Calidad', 1),
('TIPO_INTERACCION_CC', '5', 'Certificados de Materiales', 1),
('TIPO_INTERACCION_CC', '6', 'Plan de Inspeccion y Ensayos', 1),
('TIPO_INTERACCION_CC', '7', 'Calificaciones ', 1),
('TIPO_INTERACCION_CC', '8', 'Control Dimensional', 1),
('TIPO_INTERACCION_CC', '9', 'Otros Controles', 1),
('TIPO_JOURNAL', '1', 'Control Calidad', 1),
('TIPO_JOURNAL', '2', 'Cambios en Orden', 1),
('UNIDAD_MEDIDA', '1', 'KGS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `pagina_inicio` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rol`
--

INSERT INTO `tbl_rol` (`id`, `rol_id`, `nombre`, `pagina_inicio`) VALUES
(1, 201, 'Administrador', NULL),
(2, 202, 'Activador', 'activador/index_activador'),
(3, 203, 'Bodega', NULL),
(4, 204, 'Ingenieria', 'ingenieria/index_ingenieria');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `codEmpresa` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(50) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactTitle` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `StateOrProvince` varchar(20) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(30) DEFAULT NULL,
  `FaxNumber` varchar(30) DEFAULT NULL,
  `PaymentTerms` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `Notes` mediumtext DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`codEmpresa`, `SupplierID`, `SupplierName`, `ContactName`, `ContactTitle`, `Address`, `City`, `PostalCode`, `StateOrProvince`, `Country`, `PhoneNumber`, `FaxNumber`, `PaymentTerms`, `EmailAddress`, `Notes`, `DateCreated`) VALUES
(2004, 2, 'SKCOMSA', 'RENER VERGARA', 'RENER VERGARA', 'Malaga 120', 'Santiago', NULL, NULL, 'CL', NULL, NULL, 'Net 30 days', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `cod_user` int(11) DEFAULT NULL,
  `cod_emp` int(11) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `n_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `avatar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `cod_user`, `cod_emp`, `nombres`, `rol_id`, `n_usuario`, `password`, `paterno`, `materno`, `email`, `estado`, `avatar`) VALUES
(1, 9001, 2004, 'Luis', 201, 'lmontecinos', 'e10adc3949ba59abbe56e057f20f883e', 'Montecinos', 'Andia', 'luis.montecinos@composer.cl', 1, '2.jpg'),
(2, 9002, 2004, 'Mario', 202, 'mvalderas', 'e10adc3949ba59abbe56e057f20f883e', 'Valderas', '.', 'mario.valderas@grupovanor.cl', 1, '3.jpg'),
(3, 9003, 2004, 'Diego', 203, 'dvidal', 'e10adc3949ba59abbe56e057f20f883e', 'Vidal', '.', 'diego.vidal@grupovanor.cl', 1, '4.jpg'),
(4, 9004, 2004, 'Pablo', 204, 'polavarria', 'e10adc3949ba59abbe56e057f20f883e', 'olavarria', 'Arce', 'olavarriaph@gmail.com', 1, '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bucksheet`
--
ALTER TABLE `tbl_bucksheet`
  ADD PRIMARY KEY (`PurchaseOrderID`,`purchaseOrdername`(255),`NumeroLinea`,`SupplierName`);

--
-- Indexes for table `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`codEmpresa`,`idCliente`,`nombreCliente`,`razonSocial`,`rutCliente`,`dvCliente`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`codEmpresa`,`ID`);

--
-- Indexes for table `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id`,`cod_empresa`);

--
-- Indexes for table `tbl_journal`
--
ALTER TABLE `tbl_journal`
  ADD PRIMARY KEY (`id_interaccion`,`tipo`,`id_orden_compra`,`id_cliente`,`id_proyecto`);

--
-- Indexes for table `tbl_ordenes`
--
ALTER TABLE `tbl_ordenes`
  ADD PRIMARY KEY (`codEmpresa`,`idCliente`,`idProyecto`,`PurchaseOrderID`);

--
-- Indexes for table `tbl_ordenes_item`
--
ALTER TABLE `tbl_ordenes_item`
  ADD PRIMARY KEY (`codEmpresa`,`idCliente`,`idProyecto`,`PurchaseOrderID`,`id_item`);

--
-- Indexes for table `tbl_proyectos`
--
ALTER TABLE `tbl_proyectos`
  ADD PRIMARY KEY (`codEmpresa`,`idCliente`,`NumeroProyecto`);

--
-- Indexes for table `tbl_ref_codes`
--
ALTER TABLE `tbl_ref_codes`
  ADD PRIMARY KEY (`domain`,`domain_id`);

--
-- Indexes for table `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id`,`rol_id`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`codEmpresa`,`SupplierID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_journal`
--
ALTER TABLE `tbl_journal`
  MODIFY `id_interaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_proyectos`
--
ALTER TABLE `tbl_proyectos`
  MODIFY `NumeroProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
