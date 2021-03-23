-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2021 at 11:18 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickbaluchon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `file_bill` varchar(255) DEFAULT NULL,
  `billing_addr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `company_name` varchar(100) NOT NULL,
  `cli_pwd` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `siret_nb` int(30) NOT NULL,
  `motives` text NOT NULL,
  `comf_cli` tinyint(1) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `bill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`company_name`, `cli_pwd`, `mail`, `billing_address`, `siret_nb`, `motives`, `comf_cli`, `package`, `bill`) VALUES
('TOTO', NULL, 'test@test.com', NULL, 123456789, 'Ceci est un test', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `del_email` varchar(255) NOT NULL,
  `delivery_range` float DEFAULT NULL,
  `nb_km` float DEFAULT NULL,
  `nb_pck` int(11) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `cv` varchar(255) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `vehicle_brand` varchar(50) DEFAULT NULL,
  `vehicle_capacity` int(11) DEFAULT NULL,
  `comf_del` tinyint(1) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `pay_sheet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`username`, `password`, `del_email`, `delivery_range`, `nb_km`, `nb_pck`, `iban`, `cv`, `vehicle_type`, `vehicle_brand`, `vehicle_capacity`, `comf_del`, `package`, `pay_sheet`) VALUES
('Pierre', 'Test1234', 'test@test.com', NULL, NULL, NULL, NULL, 'uploads/CVPierre.txt', NULL, NULL, NULL, NULL, NULL, NULL),
('Test', 'Test1234', 'test@test.com', NULL, NULL, NULL, NULL, 'uploads/profile1616496975.png', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `id_depot` int(11) NOT NULL,
  `address_depot` varchar(255) DEFAULT NULL,
  `depot_capacity` int(11) DEFAULT NULL,
  `package` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id_package` int(11) NOT NULL,
  `weight` float DEFAULT NULL,
  `destination` varchar(220) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `additional_info` text,
  `delivery_date` datetime DEFAULT NULL,
  `pckg_follow_up` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paysheet`
--

CREATE TABLE `paysheet` (
  `id_sheet` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `file_pay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`company_name`),
  ADD KEY `FK_Package_Client` (`package`),
  ADD KEY `FK_Bill_Client` (`bill`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_Package_Deliveryman` (`package`),
  ADD KEY `FK_Pay_Client` (`pay_sheet`);

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`id_depot`),
  ADD KEY `FK_Package_Depot` (`package`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `paysheet`
--
ALTER TABLE `paysheet`
  ADD PRIMARY KEY (`id_sheet`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Bill_Client` FOREIGN KEY (`bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `FK_Package_Client` FOREIGN KEY (`package`) REFERENCES `package` (`id_package`);

--
-- Constraints for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD CONSTRAINT `FK_Package_Deliveryman` FOREIGN KEY (`package`) REFERENCES `package` (`id_package`),
  ADD CONSTRAINT `FK_Pay_Client` FOREIGN KEY (`pay_sheet`) REFERENCES `paysheet` (`id_sheet`);

--
-- Constraints for table `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `FK_Package_Depot` FOREIGN KEY (`package`) REFERENCES `package` (`id_package`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
